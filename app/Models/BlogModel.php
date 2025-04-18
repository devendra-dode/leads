<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model {

    protected $table = 'tbl_blogs';
    protected $primaryKey = 'blogId';
    protected $allowedFields = ['name', 'short_description', 'details', 'status', 'image', 'slug', 'category'];
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

        $query = $builder->select('blogId, name, type, slug, short_description, status, image, created_at', 'category')->get();

        return $query->getResult();
    }

    public function getServicesArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('blogId, name, short_description, status, image, created_at', 'category')->get();

        return $query->getResultArray();
    }

    public function getActiveServices()
    {
        return $this->where('status', 'active')->get()->getResultArray();
    }

}
