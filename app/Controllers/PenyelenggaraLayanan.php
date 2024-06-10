<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyelenggaraLayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class PenyelenggaraLayanan extends BaseController
{
    protected $penyelenggaraLayananModel;
    public function __construct()
    {
        // 
        $this->penyelenggaraLayananModel = new PenyelenggaraLayananModel();
    }

    public function index()
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(3, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'tajuk' => 'Manajemen Penyelenggara',
            'penyelenggara_layanan' => $this->penyelenggaraLayananModel->get_penyelenggara_layanan(),
        ];
        return view('penyelenggara/manajemen_penyelenggara', $data);
    }

    public function create_penyelenggara()
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(3, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'tajuk' => 'Tambah Penyelenggara',
            'validation' => \Config\Services::validation(),
        ];
        return view('penyelenggara/create_penyelenggara', $data);
    }

    public function edit($id)
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(3, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'tajuk' => 'Edit Penyelenggara',
            'penyelenggara' => $this->penyelenggaraLayananModel->get_penyelenggara_layanan_by_id($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('penyelenggara/edit_penyelenggara', $data);
    }

    public function save()
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(3, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[penyelenggara_layanan.nama]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'is_unique' => 'Nama sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }

        $this->penyelenggaraLayananModel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telp' => $this->request->getPost('telp'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/manajemen_penyelenggara');
    }

    public function update($id)
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(3, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        // cek nama penyelenggara
        $penyelenggaraLama = $this->penyelenggaraLayananModel->find($id)['nama'];
        if ($penyelenggaraLama == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[penyelenggara_layanan.nama]';
        }
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'is_unique' => 'Nama sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }

        $this->penyelenggaraLayananModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telp' => $this->request->getPost('telp'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/manajemen_penyelenggara');
    }

    public function delete($id)
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(3, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $this->penyelenggaraLayananModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/manajemen_penyelenggara');
    }
}
