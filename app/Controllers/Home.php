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

        $keyword = $this->request->getVar('search');

        if ($keyword) {
            $standar_layanan = $this->standarLayananModel->where('status', 1)->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
        } else {
            $standar_layanan = $this->standarLayananModel->where('status', 1)->findAll();
        }

        $data = [
            'standar_layanan' => $standar_layanan,
            'keyword' => $keyword,
        ];
        return view('pages/landing_page', $data);
    }

    public function dashboard()
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if ($keyword = $this->request->getVar('search')) {
            $standar_layanan = $this->standarLayananModel->where('status', 1)->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
        } else {
            $standar_layanan = $this->standarLayananModel->get_standar_layanan_where_status('1');
        }

        $data = [
            'tajuk' => 'Dashboard',
            'standar_layanan' => $standar_layanan,
            'keyword' => $keyword,
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
