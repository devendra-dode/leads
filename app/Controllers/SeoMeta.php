<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\SeoMetaModel;
use CodeIgniter\API\ResponseTrait;
use Hermawan\DataTables\DataTable;


class SeoMeta extends Backend
{
    use ResponseTrait;
    
    protected $model;

    public function __construct()
    {
        $this->model = new SeoMetaModel();
    }

    /**
     * Display SEO Meta Data List
     */
    public function index()
    {
        $headerInfo['plugin'] = ['dataTables'];
        $this->loadViews('SeoMeta/index', $headerInfo);
    }

    /**
     * Fetch SEO Meta Records
     */

    public function fetchSeoMeta()
    {
        $serviceModel = new SeoMetaModel(); // Use correct model
        $serviceModel->select('id, meta_title, page_url, meta_description, created_at');

        return DataTable::of($serviceModel)->toJson();
    }

    /**
     * Show Create SEO Meta Form
     */
    public function create()
    {
        $this->loadViews('SeoMeta/create');
    }

    /**
     * Store SEO Meta Data
     */
    public function store()
    {
        $request = service('request');
        $validation = \Config\Services::validation();

        $validation->setRules([
            //'page_name'         => 'required|max_length[255]',
            'meta_title'        => 'required|max_length[255]',
            'meta_description'  => 'required',
            'meta_keywords'     => 'permit_empty|max_length[255]',
            'og_image'          => 'permit_empty|uploaded[og_image]|is_image[og_image]|mime_in[og_image,image/jpg,image/jpeg,image/png]|max_size[og_image,2048]',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->with('validation', $validation);
        }

        $slug = url_title($request->getPost('page_name'), '-', true);
        $canonicalUrl = base_url('/seo-meta/' . $slug);

        // Handle Image Uploads
        $ogImagePath = $this->uploadImage('og_image');

        // Insert into Database
        $this->model->insert([
            'page_url'           => $canonicalUrl,
            'page_name'          => $request->getPost('page_name'),
            'meta_title'         => esc($request->getPost('meta_title')),
            'meta_description'   => esc($request->getPost('meta_description')),
            'meta_keywords'      => esc($request->getPost('meta_keywords') ?? ''),
            'og_title'           => esc($request->getPost('meta_title')),
            'og_description'     => esc($request->getPost('meta_description')),
            'og_image'           => $ogImagePath,
            'twitter_title'      => esc($request->getPost('meta_title')),
            'twitter_description'=> esc($request->getPost('meta_description')),
            'twitter_image'      => $ogImagePath,
            'canonical_url'      => $canonicalUrl,
        ]);

        return redirect()->to('/seo-meta')->with('success', 'SEO Meta Data added successfully!');
    }

    /**
     * Show Edit Form
     */
    public function edit($id)
    {
        $seoMeta = $this->model->find($id);
        if (!$seoMeta) {
            return redirect()->to('/seo-meta')->with('error', 'Record not found');
        }

        $this->loadViews('SeoMeta/edit', ['meta' => $seoMeta]);
    }

    /**
     * Update SEO Meta Data
     */
    public function update($id)
    {
        $seoMeta = $this->model->find($id);
        if (!$seoMeta) {
            return redirect()->to('/seo-meta')->with('error', 'Record not found');
        }

        // Validation Rules
        $validation = \Config\Services::validation();
        $validation->setRules([
           // 'page_name'         => 'required|max_length[255]',
            'meta_title'        => 'required|max_length[255]',
            'meta_description'  => 'required',
            'meta_keywords'     => 'permit_empty|max_length[255]',
            'meta_image'        => 'permit_empty|is_image[meta_image]|mime_in[meta_image,image/jpg,image/jpeg,image/png]|max_size[meta_image,2048]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Handle Image Upload (if a new image is provided)
        $metaImagePath = $seoMeta['og_image']; // Keep existing image
        $metaImage = $this->request->getFile('meta_image');

        if ($metaImage && $metaImage->isValid() && !$metaImage->hasMoved()) {
            $metaImagePath = $this->uploadImage('meta_image', $seoMeta['og_image']);
        }

        // Data Update
        $data = [
            'meta_title'         => esc($this->request->getPost('meta_title')),
            'meta_description'   => esc($this->request->getPost('meta_description')),
            'meta_keywords'      => esc($this->request->getPost('meta_keywords') ?? ''),
            'og_title'           => esc($this->request->getPost('meta_title')),
            'og_description'     => esc($this->request->getPost('meta_description')),
            'og_image'           => $metaImagePath,
            'twitter_title'      => esc($this->request->getPost('meta_title')),
            'twitter_description'=> esc($this->request->getPost('meta_description')),
            'twitter_image'      => $metaImagePath,
        ];

        $this->model->update($id, $data);

        return redirect()->to('/seo-meta')->with('success', 'SEO Meta Data updated successfully');
    }

    /**
     * Upload Image Helper Function
     */
    private function uploadImage($field, $existingPath = null)
    {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/meta_images/', $newName);

            // Delete old image if it exists
            if ($existingPath && file_exists(ROOTPATH . 'public/' . $existingPath)) {
                unlink(ROOTPATH . 'public/' . $existingPath);
            }

            return base_url('uploads/meta_images/' . $newName); // Store relative path
        }
        return $existingPath; // Keep existing image if no new upload
    }

    /**
     * Delete SEO Meta Record
     */
    public function delete($id)
    {
        $seoMeta = $this->model->find($id);
        if (!$seoMeta) {
            return redirect()->to('/seo-meta')->with('error', 'Record not found');
        }

        $this->model->delete($id);

        return redirect()->to('/seo-meta')->with('success', 'Record deleted successfully');
    }


}
