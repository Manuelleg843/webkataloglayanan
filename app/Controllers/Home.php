<?php

namespace App\Controllers;

use App\Models\StandarLayananModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;
    protected $standarLayananModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->standarLayananModel = new StandarLayananModel();
    }

    public function index(): string
    {
        $data = [
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan(),
        ];
        return view('pages/landing_page', $data);
    }

    public function dashboard(): string
    {
        // 
        $data = [
            'tajuk' => 'Dashboard',
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan(),
        ];

        return view('pages/dashboard', $data);
    }

    public function login(): string
    {
        return view('pages/login');
    }

    public function manajemen_layanan(): string
    {
        return view('pages/manajemen_layanan');
    }
}
