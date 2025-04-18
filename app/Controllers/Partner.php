<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\PartnerModel;
use Hermawan\DataTables\DataTable;
use CodeIgniter\API\ResponseTrait;

class Partner extends Backend
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        $this->model = new PartnerModel();
    }

    // Load listing view
    public function index()
    {
        $headerInfo['plugin'] = ['dataTables'];
        $this->loadViews('partners/index', $headerInfo);
    }

    // Load create view
    public function create()
    {
        $this->loadViews('partners/create');
    }

    // Fetch all partners in datatable
    public function fetchPartners()
    {
        $this->model->select('partnerId, name, logo, created_at');
        return DataTable::of($this->model)->toJson();
    }

    // Store new partner
    public function store()
    {
        $request = service('request');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|max_length[255]',
            'logo' => 'permit_empty|uploaded[logo]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $image = $this->uploadImage('logo');

        $data = [
            'name'   => $request->getPost('name'),
            'status' => 'active',
            'logo'   => $image,
        ];

        $this->model->insert($data);

        return redirect()->to('/partners')->with('success', 'Partner added successfully!');
    }

    // Load edit view
    public function edit($id)
    {
        $partner = $this->model->find($id);

        if (!$partner) {
            return redirect()->to('/partners')->with('error', 'Partner not found');
        }

        $this->loadViews('partners/edit', ['page' => $partner]);
    }

    // Update existing partner
    public function update($id)
    {
        $partner = $this->model->find($id);

        if (!$partner) {
            return redirect()->to('/partners')->with('error', 'Partner not found');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[255]',
            'logo' => 'permit_empty|uploaded[logo]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $logoPath = $partner['logo'];
        $newLogo = $this->request->getFile('logo');

        if ($newLogo && $newLogo->isValid() && !$newLogo->hasMoved()) {
            $logoPath = $this->uploadImage('logo', $partner['logo']);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'logo' => $logoPath,
        ];

        $this->model->update($id, $data);

        return redirect()->to('/partners')->with('success', 'Partner updated successfully');
    }

    // Handle image upload
    private function uploadImage($field, $existingPath = null)
    {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/partners/', $newName);

            // Delete old image if it exists
            if ($existingPath && file_exists(ROOTPATH . 'public/' . $existingPath)) {
                unlink(ROOTPATH . 'public/' . $existingPath);
            }

            return base_url('public/uploads/partners/' . $newName); // Store relative path
        }
        return $existingPath; // Keep existing image if no new upload
    }
}
