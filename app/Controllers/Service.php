<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\ServiceModel;
use App\Models\SeoMetaModel;
use App\Libraries\DataTable;
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
        $dataTable = new DataTable();

        $columns = [
            ['name' => 'serviceId'],
            ['name' => 'name'],
            ['name' => 'short_description'],
            ['name' => 'icon'],
            ['name' => 'created_at', 'formatter' => 'date_only']
        ];

        // ✅ Pass model name as a string and WHERE condition separately
        $where = ['type' => 'service']; // Only active services

        $response = $dataTable->process('ServiceModel', $columns, $where);

        return $this->setResponseFormat('json')->respond($response);
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
            'details'            => $request->getPost('description'),
            'slug'              => $slug,
            'status'              => 'active',
            'type'              => 'service'
        ];

        $serviceId = $serviceModel->insert($serviceData);

        // **Meta Image Upload**
        $metaImagePath = null;
        if ($image = $request->getFile('meta_image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $metaImagePath = $image->store('meta_images', 'public');
            }
        }

        // **SEO Meta Data Save**
        $seoModel->insert([
            'page_url'           => base_url('/service/' . $slug),
            'page_name'           => $request->getPost('service_name'),
            'meta_title'         => esc($request->getPost('meta_title') ?? $request->getPost('service_name')),
            'meta_description'   => esc($request->getPost('meta_description') ?? ''),
            'meta_keywords'      => esc($request->getPost('meta_keywords') ?? ''),
            'og_title'           => esc($request->getPost('meta_title') ?? $request->getPost('service_name')),
            'og_description'     => esc($request->getPost('meta_description') ?? ''),
            'og_image'           => $metaImagePath ? base_url('uploads/' . esc($metaImagePath)) : null,
            'canonical_url'      => base_url('/service/' . $slug),

            // Twitter Meta Data
            'twitter_title'      => esc($request->getPost('meta_title') ?? $request->getPost('service_name')),
            'twitter_description'=> esc($request->getPost('meta_description') ?? ''),
            'twitter_image'      => $metaImagePath ? base_url('uploads/' . esc($metaImagePath)) : null,
        ]);


        return redirect()->back()->with('success', 'Service added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/service')->with('error', 'Service not found');
        }

        $this->loadViews('services/edit', ['service' => $service]);
    }

    // Update Service
    public function update($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/service')->with('error', 'Service not found');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'service_name' => 'required|min_length[3]|max_length[255]',
            'service_icon' => 'required',
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
            'details' => $this->request->getPost('description'),
        ];

        $serviceModel->update($id, $data);

        return redirect()->to('/service')->with('success', 'Service updated successfully');
    }

}