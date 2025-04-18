<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\ServiceModel;
use App\Models\SeoMetaModel;
use Hermawan\DataTables\DataTable;
use CodeIgniter\API\ResponseTrait;

class HomeTextSlider extends Backend
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
        $this->loadViews('homeTextSlider/index', $headerInfo);
    }

    /**
     * This method is used to fetch users in datatables
     */

    public function create()
    {   
        $this->loadViews('homeTextSlider/create');
    }

    /**
     * This method is used to fetch users in datatables
     */
    public function fetchTextSliders()
    {
        $serviceModel = new ServiceModel(); // Use correct model
        $serviceModel->select('serviceId, name, created_at')
                     ->where('type', HOMETEXTSLIDER); // Use whereIn for array

        return DataTable::of($serviceModel)->toJson();
    }
    
    public function store()
    {


        $request = service('request');


        // **Validation**
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'      => 'required|max_length[255]',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->with('error', $validation->getErrors());
        }

        $serviceModel = new ServiceModel();


        $serviceData = [
            'name'              => $request->getPost('name'),
            'status'              => 'active',
            'type'              => HOMETEXTSLIDER,
        ];

        $serviceId = $serviceModel->insert($serviceData);

        return redirect()->to('/homeTextSlider')->with('success', 'Home text slider added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $pageModel = new ServiceModel();
        $page = $pageModel->find($id);

        if (!$page) {
            return redirect()->to('/homeTextSlider')->with('error', 'Home text slider not found');
        }

        $this->loadViews('homeTextSlider/edit', ['page' => $page]);
    }

    // Update Service
    public function update($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/homeTextSlider')->with('error', 'Home text slider not found');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }


        $data = [
            'name' => $this->request->getPost('name'),
            'type'    => HOMETEXTSLIDER,

        ];

        $serviceModel->update($id, $data);

        return redirect()->to('/homeTextSlider')->with('success', 'Home text slider updated successfully');
    }

}