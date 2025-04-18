<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\UserModel;

class Dashboard extends Backend
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        
    }

    public function index() {

        $data = [
            'title' => 'Dashbord'
        ];

        $this->loadViews('general/dashboard', $data);
    }

    public function changePassword() {

        $data = [
            'title' => 'Change Password'
        ];

        $this->loadViews('general/change-password', $data);
    }

    public function updatePassword()
    {
        $session = session();
        $userModel = new \App\Models\UserModel();
        $userId = $session->get('userId'); // Get logged-in user ID

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'current_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');

        // Fetch user details
        $user = $userModel->find($userId);
        if (!$user || !password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update password
        $userModel->update($userId, ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);

        return redirect()->to('/dashboard')->with('success', 'Password updated successfully.');
    }

}