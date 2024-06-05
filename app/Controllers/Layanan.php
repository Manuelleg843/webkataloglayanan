<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyelenggaraLayananModel;
use App\Models\StandarLayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class Layanan extends BaseController
{
    protected $standarLayananModel;
    protected $penyelenggaraLayananModel;

    public function __construct()
    {
        $this->standarLayananModel = new StandarLayananModel();
        $this->penyelenggaraLayananModel = new PenyelenggaraLayananModel();
    }
    public function index()
    {
        //
    }

    public function manajemen_layanan()
    {
        // 
        $standar_layanan = $this->standarLayananModel->get_standar_layanan();
        foreach ($standar_layanan as $key => $value) {
            $standar_layanan[$key]['penyelenggara_layanan'] = $this->penyelenggaraLayananModel->get_nama_penyelenggara_layanan_by_id($value['penyelenggara_layanan_id']);
        }
        // dd($standar_layanan);
        $data = [
            'tajuk' => 'Manajemen Layanan',
            'standar_layanan' => $standar_layanan,
        ];
        return view('layanan/manajemen_layanan', $data);
    }

    public function detail_layanan($id)
    {
        // 
        $data = [
            'tajuk' => 'Dashboard',
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan_by_id($id),
        ];

        if (!$data['standar_layanan']) {
            return view('layanan/missing_layanan');
        }

        if (session()->get('nama')) {
            return view('layanan/detail_layanan', $data);
        }

        return view('pages/detail_layanan', $data);
    }
}
