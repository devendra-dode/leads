<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model {

    protected $table = 'tbl_services';
    protected $primaryKey = 'serviceId';
    protected $allowedFields = ['name', 'short_description', 'detail', 'status', 'icon', 'type', 'slug'];
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

        $query = $builder->select('serviceId, name, type, slug, short_description, detail, status, icon, created_at')->get();

        return $query->getResult();
    }

    public function getServicesArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('serviceId, name, short_description, detail, status, icon, created_at')->get();

        return $query->getResultArray();
    }

    public function getActiveServices()
    {
        return $this->where('status', 'active')->get()->getResultArray();
    }

}
