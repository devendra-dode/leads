<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactUsModel extends Model {

    protected $table = 'contact_us';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'subject', 'message', 'created_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        return $data;
    }

    protected function beforeUpdate(array $data) {
        return $data;
    }

    public function getServices()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('name', 'email', 'subject', 'message', 'created_at')->get();

        return $query->getResult();
    }

    public function getServicesArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('name', 'email', 'subject', 'message', 'created_at')->get();

        return $query->getResultArray();
    }

    public function getActiveServices()
    {
        return $this->where('status', 'active')->get()->getResultArray();
    }

}
