<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PermissionModel;
use App\Models\RoleHasPermissionModel;
use App\Models\RoleModel;
use CodeIgniter\HTTP\ResponseInterface;

class Role extends BaseController
{
    protected $roleModel;
    protected $permissionModel;
    protected $roleHasPermissionModel;

    public function __construct()
    {
        // 
        $this->roleModel = new RoleModel();
        $this->permissionModel = new PermissionModel();
        $this->roleHasPermissionModel = new RoleHasPermissionModel();
    }
    public function index()
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $roles = $this->roleModel->findAll();
        foreach ($roles as $key => $role) {
            $roles[$key]['permissions'] = [];
            $permissions = $this->roleHasPermissionModel->where('role_id', $role['id'])->findAll();
            foreach ($permissions as $key2 => $permission) {
                $permissio = $permission['permission_id'];
                $roles[$key]['permissions'][$key2] = $permissio;
            }
        }

        // dd($roles);

        $data = [
            'tajuk' => 'Manajemen Users',
            'subtajuk' => 'Manajemen Role',
            'roles' => $roles,
        ];

        return view('user/manajemen_role', $data);
    }

    public function update($id)
    {
        //
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(4, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $role['permission']['manajemen_layanan'] = $this->request->getVar('manajemen_layanan');
        $role['permission']['manajemen_persetujuan'] = $this->request->getVar('manajemen_persetujuan');
        $role['permission']['manajemen_penyelenggara'] = $this->request->getVar('manajemen_penyelenggara');
        $role['permission']['manajemen_user'] = $this->request->getVar('manajemen_user');

        $this->roleHasPermissionModel->where('role_id', $id)->delete();

        foreach ($role['permission'] as $value) {
            if ($value == null) {
                continue;
            }
            $this->roleHasPermissionModel->save([
                'role_id' => $id,
                'permission_id' => $value,
            ]);
        }
        session()->setFlashdata('pesan', 'Role berhasil diupdate');
        return redirect()->to('/manajemen_role');
    }
}
