<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model {

    protected $table = 'partners';
    protected $primaryKey = 'partnerId';
    protected $allowedFields = ['name', 'logo'];
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

        $query = $builder->select('partnerId, name, status, logo, created_at')->get();

        return $query->getResult();
    }

    public function getServicesArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('partnerId, name, status, logo, created_at')->get();

        return $query->getResultArray();
    }

    public function getActiveServices()
    {
        return $this->where('status', 'active')->get()->getResultArray();
    }

}
