<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\ServiceModel;
use App\Models\SeoMetaModel;
use Hermawan\DataTables\DataTable;
use CodeIgniter\API\ResponseTrait;

class HomeBanner extends Backend
{
    use ResponseTrait;
    
    protected $model;
    /**
     * This is default constructor of the class
     */
    public function __construct(){
    }

    /**
     * Loads user listing page
     */
    public function index()
    {   
        $headerInfo['plugin'] = ['dataTables'];
        $this->loadViews('homeBanner/index', $headerInfo);
    }

    /**
     * This method is used to fetch users in datatables
     */

    public function create()
    {   
        $this->loadViews('homeBanner/create');
    }

    /**
     * This method is used to fetch users in datatables
     */
    public function fetchBanners()
    {
        $serviceModel = new ServiceModel(); // Use correct model
        $serviceModel->select('serviceId, name, short_description, icon, created_at')
                     ->where('type', HOMEBANNER); // Use whereIn for array

        return DataTable::of($serviceModel)->toJson();
    }
    
    public function store()
    {


        $request = service('request');


        // **Validation**
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'      => 'required|max_length[255]',
            'short_description' => 'required',
            'description'       => 'required',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->with('error', $validation->getErrors());
        }

        $serviceModel = new ServiceModel();

        $image = $this->uploadImage('image');


        $serviceData = [
            'name'              => $request->getPost('name'),
            'short_description' => $request->getPost('short_description'),
            'details'            => $request->getPost('description'),
            'status'              => 'active',
            'type'              => HOMEBANNER,
            'icon'              => $image,
        ];

        $serviceId = $serviceModel->insert($serviceData);

        return redirect()->to('/homeBanner')->with('success', 'Home banner added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $pageModel = new ServiceModel();
        $page = $pageModel->find($id);

        if (!$page) {
            return redirect()->to('/homeBanner')->with('error', 'Home banner not found');
        }

        $this->loadViews('homeBanner/edit', ['page' => $page]);
    }

    // Update Service
    public function update($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/homeBanner')->with('error', 'Home banner not found');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[255]',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Handle Image Upload (if a new image is provided)
        $metaImagePath = $service['icon']; // Keep existing image
        $metaImage = $this->request->getFile('image');

        if ($metaImage && $metaImage->isValid() && !$metaImage->hasMoved()) {
            $metaImagePath = $this->uploadImage('image', $service['icon']);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'short_description' => $this->request->getPost('short_description'),
            'details' => $this->request->getPost('description'),
            'type'    => HOMEBANNER,
            'icon'    => $metaImagePath,

        ];

        $serviceModel->update($id, $data);

        return redirect()->to('/homeBanner')->with('success', 'Home banner updated successfully');
    }

    private function uploadImage($field, $existingPath = null)
    {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/homeBanner/', $newName);

            // Delete old image if it exists
            if ($existingPath && file_exists(ROOTPATH . 'public/' . $existingPath)) {
                unlink(ROOTPATH . 'public/' . $existingPath);
            }

            return base_url('public/uploads/homeBanner/' . $newName); // Store relative path
        }
        return $existingPath; // Keep existing image if no new upload
    }

}