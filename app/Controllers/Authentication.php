<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyelenggaraLayananModel;
use App\Models\RoleHasPermissionModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Authentication extends BaseController
{
    protected $userModel;
    protected $penyelenggaraLayananModel;
    protected $roleHasPermissionModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->penyelenggaraLayananModel = new PenyelenggaraLayananModel();
        $this->roleHasPermissionModel = new RoleHasPermissionModel();
    }

    public function index()
    {
        helper(['form']);

        if ($this->request->getPost()) {
            // Rules validation
            $rules = [
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email wajib diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password wajib diisi'
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                return view('pages/login', [
                    'validation' => $this->validator
                ]);
            } else {
                return $this->_login();
            }
            //
            return view('pages/home');
        }

        return view('pages/login');
    }

    private function _login()
    {
        $login = [];
        $login['email'] = $this->request->getVar('email');
        $login['password'] = $this->request->getVar('password');

        $user = $this->userModel->get_user_by_email($login['email']);
        if ($user && password_verify($login['password'], $user['password'])) {
            $user = $this->userModel->get_user_by_email($login['email']);
            $this->_setSession($user);
            return redirect()->to('dashboard');
        } else {
            session()->setFlashdata('error', 'Email atau password salah!');
            session()->setFlashdata('email', $login['email']);
            return redirect()->to('login');
        }
    }

    private function _setSession($user)
    {
        $data = [
            'id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'penyelenggara_layanan_id' => $user['penyelenggara_layanan_id'],
        ];

        $permission = $this->roleHasPermissionModel->where('role_id', $user['role_id'])->findAll();
        foreach ($permission as $key => $value) {
            $data['permission'][$key] = $value['permission_id'];
        }

        if ($user['role_id'] == 2) {
            $penyelenggara_layanan = $this->penyelenggaraLayananModel->get_penyelenggara_layanan_by_id($user['penyelenggara_layanan_id']);
            $data['penyelenggara_layanan'] = $penyelenggara_layanan['nama'];
        } else {
            $data['penyelenggara_layanan'] = "";
        }

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
