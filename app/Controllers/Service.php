<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\ServiceModel;
use App\Models\SeoMetaModel;
use Hermawan\DataTables\DataTable;
use CodeIgniter\API\ResponseTrait;

class Service extends Backend
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
        $this->loadViews('services/index', $headerInfo);
    }

    /**
     * This method is used to fetch users in datatables
     */

    public function create()
    {   
        $this->loadViews('services/create');
    }

    /**
     * This method is used to fetch users in datatables
     */
    public function fetchServices()
    {
        $serviceModel = new ServiceModel(); // Use correct model
        $serviceModel->select('serviceId, name, short_description, icon, created_at')
                     ->whereIn('type', SERVICE_CATEGORY); // Use whereIn for array

        return DataTable::of($serviceModel)->toJson();
    }

    
    public function store()
    {
        $request = service('request');

        // **Validation**
        $validation = \Config\Services::validation();
        $validation->setRules([
            'service_name'      => 'required|max_length[255]',
            'service_icon'      => 'required|max_length[255]',
            'short_description' => 'required',
            'description'       => 'required',
            // 'meta_title'        => 'required|max_length[255]',
            // 'meta_description'  => 'required',
            // 'meta_keywords'     => 'permit_empty|max_length[255]',
            // 'meta_image'        => 'permit_empty|uploaded[meta_image]|is_image[meta_image]|mime_in[meta_image,image/jpg,image/jpeg,image/png]|max_size[meta_image,2048]',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->with('error', $validation->getErrors());
        }

        $serviceModel = new ServiceModel();
        $seoModel = new SeoMetaModel();

        $slug = url_title($request->getPost('service_name'), '-', true);
        $count = $serviceModel->where('slug', $slug)->countAllResults();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $serviceData = [
            'name'              => $request->getPost('service_name'),
            'icon'              => $request->getPost('service_icon'),
            'short_description' => $request->getPost('short_description'),
            'details' => str_replace(['&nbsp;', '<br>', '<br />'], ' ', $this->request->getPost('description')),
            'slug'              => $slug,
            'status'              => 'active',
            'type'              => $request->getPost('service_category'),

        ];

        $serviceId = $serviceModel->insert($serviceData);

        $metaImagePath = $this->uploadImage('meta_image');

        $metaTitle = $request->getPost('meta_title');
        $pageName  = $request->getPost('service_name');

        $seoModel->insert([
            'page_url'           => base_url('/service/' . $slug),
            'page_name'          => $pageName,
            'page_type'          => 'service',
            'meta_title'         => esc(!empty($metaTitle) ? $metaTitle : $pageName),
            'meta_description'   => esc($request->getPost('meta_description') ?? ''),
            'meta_keywords'      => esc($request->getPost('meta_keywords') ?? ''),
            'og_title'           => esc(!empty($metaTitle) ? $metaTitle : $pageName),
            'og_description'     => esc($request->getPost('meta_description') ?? ''),
            'og_image'           => $metaImagePath ?: null,
            'canonical_url'      => base_url('/service/' . $slug),

            // Twitter Meta Data
            'twitter_title'      => esc(!empty($metaTitle) ? $metaTitle : $pageName),
            'twitter_description'=> esc($request->getPost('meta_description') ?? ''),
            'twitter_image'      => $metaImagePath ?: null,
        ]);


        return redirect()->to('/services')->with('success', 'Service added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/services')->with('error', 'Service not found');
        }

        $this->loadViews('services/edit', ['service' => $service]);
    }

    // Update Service
    public function update($id)
    {
        $request = service('request');

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/services')->with('error', 'Service not found');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'service_name' => 'required|min_length[3]|max_length[255]',
            'service_icon' => 'required',
            'service_category' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getPost('service_name'),
            'icon' => $this->request->getPost('service_icon'),
            'short_description' => $this->request->getPost('short_description'),
            'details' => str_replace(['&nbsp;', '<br>', '<br />'], ' ', $this->request->getPost('description')),
            'type'    => $request->getPost('service_category'),
        ];

        $serviceModel->update($id, $data);

        return redirect()->to('/services')->with('success', 'Service updated successfully');
    }

    private function uploadImage($field, $existingPath = null)
    {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/meta_images/', $newName);

            // Delete old image if it exists
            if ($existingPath && file_exists(ROOTPATH . 'public/' . $existingPath)) {
                unlink(ROOTPATH . 'public/' . $existingPath);
            }

            return base_url('public/uploads/meta_images/' . $newName); // Store relative path
        }
        return $existingPath; // Keep existing image if no new upload
    }

}