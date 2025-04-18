<?php

namespace App\Controllers;

use App\Controllers\Backend;
use App\Models\BlogModel;
use App\Models\SeoMetaModel;
use App\Models\ServiceModel;
use Hermawan\DataTables\DataTable;
use CodeIgniter\API\ResponseTrait;

class Blog extends Backend
{
    use ResponseTrait;
    
    protected $model;
    /**
     * This is default constructor of the class
     */
    public function __construct(){
    }

    /**
     * Loads user listing page
     */
    public function index()
    {   
        $headerInfo['plugin'] = ['dataTables'];
        $this->loadViews('blogs/index', $headerInfo);
    }

    /**
     * This method is used to fetch users in datatables
     */

    public function create()
    {   
        $catModel = new ServiceModel(); // Use correct model
        $categories = $catModel->select('name')->whereIn('type', SERVICE_CATEGORY)->findAll(); 
        $this->loadViews('blogs/create', ['categories' => $categories]);
    }

    /**
     * This method is used to fetch users in datatables
     */
    public function fetchBlogs()
    {
        $BlogModel = new BlogModel(); // Use correct model
        $BlogModel->select('blogId, name, short_description, category, image, created_at'); 

        return DataTable::of($BlogModel)->toJson();
    }

    
    public function store()
    {
        $request = service('request');

        // **Validation**
        $validation = \Config\Services::validation();
        $validation->setRules([
            'blog_name'      => 'required|max_length[255]',
            'short_description' => 'required',
            'category'       => 'required',
            'description'       => 'required',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->with('error', $validation->getErrors());
        }

        $BlogModel = new BlogModel();
        $seoModel = new SeoMetaModel();

        $slug = url_title($request->getPost('blog_name'), '-', true);
        $count = $BlogModel->where('slug', $slug)->countAllResults();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $blogImage = $this->uploadBlogImage('blog_image');

        $BlogData = [
            'name'              => $request->getPost('blog_name'),
            'short_description' => $request->getPost('short_description'),
            'details'            => $request->getPost('description'),
            'category'            => $request->getPost('category'),
            'slug'              => $slug,
            'image'              => $blogImage,
        ];

        $blogId = $BlogModel->insert($BlogData);

        $metaImagePath = $this->uploadImage('meta_image');

        $metaTitle = $request->getPost('meta_title');
        $pageName  = $request->getPost('blog_name');

        $seoModel->insert([
            'page_url'           => base_url('/blog/' . $slug),
            'page_name'          => $request->getPost('blog_name'),
            'page_type'          => 'blog',
            'meta_title'         => esc(!empty($metaTitle) ? $metaTitle : $pageName),
            'meta_description'   => esc($request->getPost('meta_description') ?? ''),
            'meta_keywords'      => esc($request->getPost('meta_keywords') ?? ''),
            'og_title'           => esc(!empty($metaTitle) ? $metaTitle : $pageName),
            'og_description'     => esc($request->getPost('meta_description') ?? ''),
            'og_image'           => $metaImagePath ?: null,
            'canonical_url'      => base_url('/blog/' . $slug),

            // Twitter Meta Data
            'twitter_title'      => esc(!empty($metaTitle) ? $metaTitle : $pageName),
            'twitter_description'=> esc($request->getPost('meta_description') ?? ''),
            'twitter_image'      => $metaImagePath ?: null,
        ]);


        return redirect()->to('/blog')->with('success', 'Blog added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $BlogModel = new BlogModel();
        $Blog = $BlogModel->find($id);

        $catModel = new ServiceModel(); // Use correct model
        $categories = $catModel->select('name')->whereIn('type', SERVICE_CATEGORY)->findAll();

        if (!$Blog) {
            return redirect()->to('/blog')->with('error', 'Blog not found');
        }

        $this->loadViews('blogs/edit', ['blog' => $Blog, 'categories' => $categories]);
    }

    // Update Blog
    public function update($id)
    {
        $BlogModel = new BlogModel();
        $Blog = $BlogModel->find($id);

        if (!$Blog) {
            return redirect()->to('/blog')->with('error', 'Blog not found');
        }

        $request = service('request');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'blog_name' => 'required|min_length[3]|max_length[255]',
           // 'blog_image' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Handle Image Upload (if a new image is provided)
        $metaImagePath = $Blog['image']; // Keep existing image
        $metaImage = $this->request->getFile('blog_image');

        if ($metaImage && $metaImage->isValid() && !$metaImage->hasMoved()) {
            $metaImagePath = $this->uploadBlogImage('blog_image', $Blog['image']);
        }


        $data = [
            'name' => $this->request->getPost('blog_name'),
            'image' => $metaImagePath,
            'category'            => $request->getPost('category'),
            'short_description' => $this->request->getPost('short_description'),
            'details' => $this->request->getPost('description'),
        ];

        $BlogModel->update($id, $data);

        return redirect()->to('/blog')->with('success', 'Blog updated successfully');
    }

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

            return base_url('public/uploads/meta_images/' . $newName); // Store relative path
        }
        return $existingPath; // Keep existing image if no new upload
    }

    private function uploadBlogImage($field, $existingPath = null)
    {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/blog/', $newName);

            // Delete old image if it exists
            if ($existingPath && file_exists(ROOTPATH . 'public/' . $existingPath)) {
                unlink(ROOTPATH . 'public/' . $existingPath);
            }

            return base_url('public/uploads/blog/' . $newName); // Store relative path
        }
        return $existingPath; // Keep existing image if no new upload
    }

}