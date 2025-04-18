<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

use Hermawan\DataTables\DataTable;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


class User extends Backend
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
        $this->loadViews('users/index', $headerInfo);
    }

    /**
     * This method is used to fetch users in datatables
     */

    public function fetchUsers()
    {
        $userModel = new UserModel();

        $query = $userModel->select([
            'userId',
            'name',
            'mobile',
            'alternate_mobile',
            'address',
            'createdDtm'
        ])->where('isAdmin !=', 1); // Exclude admin users if needed

        return DataTable::of($query)->toJson();
    }

    // Show Edit Form
    public function edit($id)
    {
        $serviceModel = new UserModel();
        $user = $serviceModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'User not found');
        }

        $this->loadViews('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        // Validate required fields (Only 'name' & 'mobile' required)
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'            => 'required|min_length[3]',
            'mobile'          => 'required|min_length[10]|max_length[10]',
            'alternate_mobile'=> 'permit_empty|min_length[10]|max_length[10]',
            'address'         => 'permit_empty|string|max_length[255]',
            'office_address'  => 'permit_empty|string|max_length[255]',
            'addhar_no'       => 'permit_empty|min_length[12]|max_length[12]',
            'pan_no'          => 'permit_empty|min_length[10]|max_length[10]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Get form data
        $data = [
            'name'            => $this->request->getPost('name'),
            'mobile'          => $this->request->getPost('mobile'),
            'alternate_mobile'=> $this->request->getPost('alternate_mobile') ?: null, // Optional
            'address'         => $this->request->getPost('address') ?: null, // Optional
            'office_address'  => $this->request->getPost('office_address') ?: null, // Optional
            'addhar_no'       => $this->request->getPost('addhar_no') ?: null, // Optional
            'pan_no'          => $this->request->getPost('pan_no') ?: null, // Optional
            'isAdmin'          => 2, // Optional
            'isDeleted'          => 0, // Optional
            'updatedBy'          => 1, // Optional
            'updatedDtm'      => date('Y-m-d H:i:s'), // Set current timestamp

        ];

        // Update user data in DB
        $userModel = new UserModel();
        if ($userModel->update($id, $data)) {
            return redirect()->to('/users')->with('success', 'User updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update user. Try again.');
        }
    }

}