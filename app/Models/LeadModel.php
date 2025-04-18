<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadModel extends Model {

    protected $table = 'tbl_leads';
    protected $primaryKey = 'leadId';
    protected $allowedFields = ['name', 'mobile', 'status', 'loan_type', 'loan_amount', 'updated_at', 'last_remark'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        return $data;
    }

    protected function beforeUpdate(array $data) {
        return $data;
    }

    public function getLeads()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('leadId, name, loan_type, loan_amount, status, created_at')->get();

        return $query->getResult();
    }

    public function getLeadsArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('leadId, name, loan_type, loan_amount, status, created_at')->get();

        return $query->getResultArray();
    }

    public function getNewLeads()
    {
        return $this->where('status', 'new')->get()->getResultArray();
    }

}
