<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\LeadModel;
use App\Models\UserModel;
use App\Models\LeadRemarkModel;
use Hermawan\DataTables\DataTable;
use CodeIgniter\API\ResponseTrait;

class Lead extends Backend
{
    use ResponseTrait;

    protected $leadModel;

    public function __construct()
    {
        $this->leadModel = new LeadModel();
    }

    /**
     * Display the lead listing page.
     */
    public function index()
    {

        $headerInfo['plugin'] = ['dataTables'];
        $this->loadViews('leads/index', $headerInfo);
    }

    /**
     * Fetch leads for DataTables.
     */

    public function fetchLeads()
    {
        $leadModel = new LeadModel(); // Use correct model
        $leadModel->select('leadId, name, mobile, loan_type, loan_amount, status, source, last_remark, updated_at')
        ->orderBy('created_at', 'DESC'); // Order by latest updated

        return DataTable::of($leadModel)->toJson();
    }

    /**
     * Show the form to edit an existing lead.
     */
    public function edit($id)
    {
        $leadModel = new LeadModel();
        $lead = $leadModel->select('tbl_leads.*, 
                                    tbl_users.userId, 
                                    tbl_users.addhar_no, 
                                    tbl_users.pan_no, 
                                    tbl_users.alternate_mobile, 
                                    tbl_users.address, 
                                    tbl_users.office_address')
                          ->join('tbl_users', 'tbl_users.mobile = tbl_leads.mobile', 'left')
                          ->where('tbl_leads.leadId', $id)
                          ->first();


        if (!$lead) {
            return redirect()->to('/lead')->with('error', 'Lead not found');
        }
        return $this->loadViews('leads/edit', ['lead' => $lead]);
    }

    /**
     * Update an existing lead.
     */
    public function update($id)
    {
        // Find the lead
        $lead = $this->leadModel->find($id);
        if (!$lead) {
            return redirect()->to('/lead')->with('error', 'Lead not found');
        }

        // Validation Rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'       => 'required|max_length[255]',
            'mobile'     => 'required|numeric|exact_length[10]',
            'status'     => 'required',
            'loan_type'  => 'required|max_length[100]',
            'loan_amount'=> 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Lead Update Data
        $leadData = [
            'name'       => $this->request->getPost('name'),
            'mobile'     => $this->request->getPost('mobile'),
            'status'     => $this->request->getPost('status'),
            'loan_type'  => $this->request->getPost('loan_type'),
            'loan_amount'=> $this->request->getPost('loan_amount'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update Lead
        $this->leadModel->update($id, $leadData);

        // Get User ID
        $userId = $this->request->getPost('userId');
        if ($userId) {
            $userModel = new UserModel();

            // Check if user exists
            $existingUser = $userModel->find($userId);
            if ($existingUser) {
                // User Update Data
                $userData = [
                    'name'            => $this->request->getPost('name'),
                    'mobile'          => $this->request->getPost('mobile'),
                    'alternate_mobile'=> $this->request->getPost('alternate_mobile') ?: null,
                    'address'         => $this->request->getPost('address') ?: null,
                    'office_address'  => $this->request->getPost('office_address') ?: null,
                    'addhar_no'       => $this->request->getPost('addhar_no') ?: null,
                    'pan_no'          => $this->request->getPost('pan_no') ?: null,
                    'roleId'          => 2,
                    'isAdmin'         => 0,
                    'isDeleted'       => 0,
                    'updatedBy'       => 1,
                    'updatedDtm'      => date('Y-m-d H:i:s'),
                ];

                // Update User
                $userModel->update($userId, $userData);
            }
        }

        return redirect()->to('/lead')->with('success', 'Lead updated successfully');
    }

    public function saveRemark()
    {
        $leadId = $this->request->getPost('lead_id');
        $remark = $this->request->getPost('remark');

        if (!$leadId || !$remark) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data']);
        }

        // Load models
        $leadRemarkModel = new LeadRemarkModel();
        $leadModel = new LeadModel();

        // Insert into lead_remarks table
        $leadRemarkModel->insert([
            'lead_id'    => $leadId,
            'remark'     => $remark,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Update leads table
        $leadModel->update($leadId, ['last_remark' => $remark]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Remark saved successfully!']);
    }



}
