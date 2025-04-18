<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model {

    protected $table = 'tbl_services';
    protected $primaryKey = 'serviceId';
    protected $allowedFields = ['name', 'short_description', 'details', 'status', 'icon', 'type', 'slug'];
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
    
    public function getContentBySlug($slug)
    {
        // Fetch a single row based on the slug
        return $this->where('slug', $slug)
                    ->first();  // 'first()' fetches the first row (if any), instead of using 'getRowArray()'
    }

    public function getByDynamicConditions(array $whereInConditions = []): array
    {
        $builder = $this;

        foreach ($whereInConditions as $column => $values) {
            if (is_array($values) && !empty($values)) {
                $builder = $builder->whereIn($column, $values);
            }
        }

        return $builder->findAll(); // return all matching results
    }
}
