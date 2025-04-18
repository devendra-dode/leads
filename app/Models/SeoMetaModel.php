<?php

namespace App\Models;

use CodeIgniter\Model;

class SeoMetaModel extends Model {

    protected $table = 'tbl_seo_metadata';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'page_url',
        'page_name',
        'page_type',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
        'canonical_url',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'created_at',
        'updated_at',
    ];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        return $data;
    }

    protected function beforeUpdate(array $data) {
        return $data;
    }

    public function getAllMetadata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('id, page_url, meta_title, meta_description, meta_keywords, og_title, og_description, og_image, canonical_url, twitter_title, twitter_description, twitter_image, created_at, updated_at')->get();

        return $query->getResult();
    }

    public function getMetadataArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select('id, page_url, meta_title, meta_description, meta_keywords, og_title, og_description, og_image, canonical_url, twitter_title, twitter_description, twitter_image, created_at, updated_at')->get();

        return $query->getResultArray();
    }

    public function getMetadataByPageUrl($page_url)
    {
        return $this->where('page_url', $page_url)->first();
    }

    /**
     * Get SEO meta data by page name
     */
    public function getByPageName(string $pageName): array
    {
        return $this->where('page_name', $pageName)->first() ?? [];
    }

    /**
     * Optional: Get SEO meta data by page type
     */
    public function getByPageType(string $pageType): array
    {
        return $this->where('page_type', $pageType)->first() ?? [];
    }

}
