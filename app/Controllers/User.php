<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyelenggaraLayananModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    protected $userModel;
    protected $penyelenggaraLayananModel;
    protected $roleModel;

    public function __construct()
    {
        // 
        $this->userModel = new UserModel();
        $this->penyelenggaraLayananModel = new PenyelenggaraLayananModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        //
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $users = $this->userModel->findAll();

        foreach ($users as $key => $user) {
            $role = $this->roleModel->find($user['role_id']);
            $users[$key]['role'] = $role['role'];
        }

        foreach ($users as $key => $user) {
            $penyelenggara = $this->penyelenggaraLayananModel->where('id', $user['penyelenggara_layanan_id'])->first();
            if (!$penyelenggara) {
                $penyelenggara = ['nama' => ''];
            }
            $users[$key]['penyelenggara'] = $penyelenggara['nama'];
        }

        $data = [
            'tajuk' => 'Manajemen Users',
            'subtajuk' => 'Manajemen User',
            'users' => $users
        ];
        return view('user/manajemen_user', $data);
    }

    public function create_user()
    {
        //
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $roles = $this->roleModel->findAll();
        $penyelenggara_layanan = $this->penyelenggaraLayananModel->findAll();

        $data = [
            'tajuk' => 'Tambah User',
            'subtajuk' => 'Tambah User',
            'roles' => $roles,
            'penyelenggara_layanan' => $penyelenggara_layanan,
            'validation' => \Config\Services::validation(),
        ];
        return view('user/create_user', $data);
    }

    public function edit($id)
    {
        //
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $user = $this->userModel->find($id);
        $roles = $this->roleModel->findAll();
        $penyelenggara_layanan = $this->penyelenggaraLayananModel->findAll();

        $user['role'] = $this->roleModel->find($user['role_id'])['role'];
        if ($user['penyelenggara_layanan_id']) {
            $user['penyelenggara'] = $this->penyelenggaraLayananModel->where('id', $user['penyelenggara_layanan_id'])->first()['nama'];
        } else {
            $user['penyelenggara'] = '';
        }

        $data = [
            'tajuk' => 'Edit User',
            'subtajuk' => 'Edit User',
            'user' => $user,
            'roles' => $roles,
            'penyelenggara_layanan' => $penyelenggara_layanan
        ];
        return view('user/edit_user', $data);
    }

    public function save()
    {
        //
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'password_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi',
                    'matches' => 'Konfirmasi password tidak sesuai'
                ],
            ],
            'role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role wajib diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }


        /**
         * @var string|null $password
         */
        $password = $this->request->getPost('password');
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $this->userModel->save([
            'email' => $this->request->getPost('email'),
            'nama' => $this->request->getPost('nama'),
            'role_id' => $this->request->getPost('role_id'),
            'penyelenggara_layanan_id' => $this->request->getPost('penyelenggara_layanan_id'),
            'password' => $hashedpassword,

        ]);

        session()->setFlashdata('pesan', 'User berhasil ditambahkan');
        return redirect()->to('/manajemen_user');
    }

    public function update($id)
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        // cek email user
        $emailLama = $this->userModel->find($id)['email'];
        if ($emailLama == $this->request->getPost('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|is_unique[users.email]';
        }
        if (!$this->validate([
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi'
                ]
            ],
            'role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role wajib diisi'
                ]
            ],
            'password' => [
                'rules' => 'min_length[8]|permit_empty',
                'errors' => [
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'password_confirm' => [
                'rules' => 'matches[password]|permit_empty',
                'errors' => [
                    'matches' => 'Konfirm password tidak sesuai'
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }

        /**
         * @var string|null $password
         */
        $password = $this->request->getPost('password');
        if ($password) {
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashedpassword = $this->userModel->find($id)['password'];
        }

        $user['id'] = $id;
        $user['email'] = $this->request->getPost('email');
        $user['nama'] = $this->request->getPost('nama');
        $user['role_id'] = $this->request->getPost('role_id');
        if ($this->request->getPost('penyelenggara_layanan_id')) {
            $user['penyelenggara_layanan_id'] = $this->request->getPost('penyelenggara_layanan_id');
        }
        $user['password'] = $hashedpassword;

        $this->userModel->save($user);

        session()->setFlashdata('pesan', 'User berhasil diupdate');
        return redirect()->to('/manajemen_user');
    }

    public function delete($id)
    {
        //
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'User berhasil dihapus');
        return redirect()->to('/manajemen_user');
    }
}
