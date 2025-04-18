<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\SeoMetaModel;
use App\Models\PartnerModel;
use App\Models\ContactUsModel;
use App\Models\LeadModel;
use App\Models\BlogModel;
use CodeIgniter\Controller;

class Web extends Controller
{
    public function index()
    {

        // $serviceModel = new ServiceModel();

        // $services = $serviceModel->getByDynamicConditions([
        //     'type' => array_merge(PAGE_CATEGORY, SERVICE_CATEGORY)
        // ]);

        $seo = new SeoMetaModel();
        $seoData = $seo->getByPageName('home');

        $serviceModel = new ServiceModel(); // Model ka object create karo
        $partnerModel = new PartnerModel(); // Model ka object create karo
        
        $data = [
            'title' => 'Home',
            'username' => 'Devendra Dode', // Example dynamic data
            'year' => date('Y'),
            'seoData' => $seoData,
            'services' => $serviceModel->getActiveServices(),
            'partners' => $partnerModel->getActiveServices(),
        ];

        return view('web/home', $data);
    }

    public function detail($slug)
    {

        $fullUrl = current_url();

        $seo = new SeoMetaModel();
        $seoData = $seo->getMetadataByPageUrl($fullUrl);

        $serviceModel = new ServiceModel(); // Model ka object create karo
        $service = $serviceModel->getContentBySlug($slug);

        $partnerModel = new PartnerModel(); // Model ka object create karo

        $data = [
            'title' => 'Home',
            'username' => 'Devendra Dode', // Example dynamic data
            'year' => date('Y'),
            'seoData' => $seoData,
            'service' => $service,
            'services' => $serviceModel->getActiveServices(), 
            'partners' => $partnerModel->getActiveServices()

        ];

        if($slug == 'apply-now'){
          return view('web/apply-now', $data);
        }

        return view('web/detail', $data);
    }

    public function contactUs()
    {
        $validation = \Config\Services::validation();

        // Get reCAPTCHA response from frontend
        $recaptchaToken = $this->request->getPost('recaptcha_token');

        if (!$recaptchaToken) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'reCAPTCHA token is missing.'
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Verify reCAPTCHA with Google
        $secretKey = '6LdPRhkrAAAAAOTrmRzKIu3GYUcL7tAE5_6CsouX'; 
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recaptchaToken);
        $responseData = json_decode($verifyResponse);

        if (!$responseData->success || $responseData->score < 0.5) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed.'
            ])->setStatusCode(ResponseInterface::HTTP_FORBIDDEN);
        }

        // Define validation rules
        $rules = [
            'name'    => 'required|min_length[3]',
            'email'   => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Prepare data
        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'subject'    => $this->request->getPost('subject'),
            'message'    => $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Save to database
        $contactModel = new ContactUsModel();
        $contactModel->save($data);

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Contact form submitted successfully.'
        ]);
    }

    public function applyNow()
    {

        $fullUrl = current_url();

        $seo = new SeoMetaModel();
        $seoData = $seo->getMetadataByPageUrl($fullUrl);

        $serviceModel = new ServiceModel(); // Model ka object create karo
        $service = $serviceModel->getContentBySlug('apply-now');

        $partnerModel = new PartnerModel(); // Model ka object create karo

        $data = [
            'title' => 'Home',
            'username' => 'Devendra Dode', // Example dynamic data
            'year' => date('Y'),
            'seoData' => $seoData,
            'service' => $service,
            'services' => $serviceModel->getActiveServices(), 
            'partners' => $partnerModel->getActiveServices()

        ];

        return view('web/apply-now', $data);
    }

    public function postApplyNow()
    {
        $validation = \Config\Services::validation();

        // Get reCAPTCHA response from frontend
        $recaptchaToken = $this->request->getPost('loan_recaptcha_token');

        if (!$recaptchaToken) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'reCAPTCHA token is missing.'
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Verify reCAPTCHA with Google
        $secretKey = '6LdPRhkrAAAAAOTrmRzKIu3GYUcL7tAE5_6CsouX'; 
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recaptchaToken);
        $responseData = json_decode($verifyResponse);

        if (!$responseData->success || $responseData->score < 0.5) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed.'
            ])->setStatusCode(ResponseInterface::HTTP_FORBIDDEN);
        }

        // Define validation rules
        $rules = [
            'name'       => 'required|min_length[3]',
            'contact'     => 'required|regex_match[/^[6-9][0-9]{9}$/]', // Validate mobile number
            'loan_type'  => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Prepare data
        $data = [
            'name'       => $this->request->getPost('name'),
            'mobile'     => $this->request->getPost('contact'),
            'loan_type'  => $this->request->getPost('loan_type'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Save to database
        try {
            $contactModel = new LeadModel(); // Make sure you load the correct model
            $contactModel->save($data);

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Loan application form submitted successfully.'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error saving data: ' . $e->getMessage()
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function blogLists()
    {
        // Get the current URL to set SEO metadata
        $fullUrl = current_url();

        // Fetch SEO metadata for the current URL
        $seo = new SeoMetaModel();
        $seoData = $seo->getMetadataByPageUrl($fullUrl);

        // Fetch service data
        $serviceModel = new ServiceModel();

        // Fetch partner data
        $partnerModel = new PartnerModel();

        // Fetch blog data with pagination
        $model = new BlogModel();
        $data['blogs'] = $model->orderBy('blogId', 'DESC')->paginate(5);
        $data['pager'] = $model->pager;

        // Prepare data to be passed to the view
        $viewData = [
            'title' => 'Home',
            'username' => 'Devendra Dode', // Example dynamic data
            'year' => date('Y'),
            'seoData' => $seoData,
            'services' => $serviceModel->getActiveServices(),
            'partners' => $partnerModel->getActiveServices(),
            'blogs' => $data['blogs'],
            'pager' => $data['pager'],
        ];

        // Return the view with data
        return view('web/blog-list', $viewData);
    }

    public function blogDetail($slug)
    {
        // Get the current URL to set SEO metadata
        $fullUrl = current_url();

        // Fetch SEO metadata for the current URL
        $seo = new SeoMetaModel();
        $seoData = $seo->getMetadataByPageUrl($fullUrl);

       
        // // Fetch service data
         $serviceModel = new ServiceModel();

        // Fetch partner data
        $partnerModel = new PartnerModel();

        // Load the model
        $model = new BlogModel();

        // Get the blog post by slug
        $blog = $model->where('slug', $slug)->first();

        // Prepare data to be passed to the view
        $viewData = [
            'title' => 'Home',
            'username' => 'Devendra Dode', // Example dynamic data
            'year' => date('Y'),
            'seoData' => $seoData,
            'services' => $serviceModel->getActiveServices(),
            'partners' => $partnerModel->getActiveServices(),
            'blog' => $blog,
        ];

        // Return the view with data
        return view('web/blog-detail', $viewData);
    }

    public function sitemapGenerate()
    {
        // Load the SEO Metadata model
        $model = new SeoMetaModel();

        // Fetch the data from the tbl_seo_metadata table
        $pages = $model->findAll();

        //print_r($pages);die;

        // Create a new SimpleXMLElement instance
        $xml = new \SimpleXMLElement('<urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        // Loop through pages and add them to the sitemap
        foreach ($pages as $page) {
            // Create a new URL entry
            $url = $xml->addChild('url');
            $url->addChild('loc', $page['page_url']);
            $url->addChild('lastmod', date('Y-m-d', strtotime($page['updated_at'])));
            $url->addChild('changefreq', 'monthly'); // Adjust this as necessary
            $url->addChild('priority', '0.8'); // Adjust priority as necessary
        }

        // Set the correct headers for XML output
        return $this->response->setContentType('application/xml')->setBody($xml->asXML());
    }
}
