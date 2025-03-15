<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use CodeIgniter\Controller;

class Web extends Controller
{
    public function index()
    {
        $serviceModel = new ServiceModel(); // Model ka object create karo

        $data = [
            'title' => 'Home Page',
            'username' => 'Mukesh Gurjar', // Example dynamic data
            'year' => date('Y'),
            'services' => $serviceModel->getActiveServices() // getResultArray() ka data pass karo
        ];

        return view('web/home', $data); // View me data send karo
    }
}
