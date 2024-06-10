<?php $this->extend('layout/main'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <!-- Row 1 -->
    <div class="row">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Form Edit User</h5>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('/edit_user/update/' . $user['id']); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <?php
                                    $form_data = session()->getFlashdata('form_data');
                                    $errors = session()->getFlashdata('errors');
                                    ?>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" value="<?= isset($form_data['email']) ? $form_data['email'] : $user['email']; ?>" class="form-control <?= (isset($errors['email']) ? 'is-invalid' : ''); ?>" name="email" id="email" autofocus />
                                        <div class="invalid-feedback">
                                            <?= isset($errors['email']) ? $errors['email'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_layanan" class="form-label">Nama</label>
                                        <input type="text" value="<?= isset($form_data['nama']) ? $form_data['nama'] : $user['nama']; ?>" class="form-control <?= (isset($errors['nama']) ? 'is-invalid' : ''); ?>" name="nama" id="nama" />
                                        <div class="invalid-feedback">
                                            <?= isset($errors['nama']) ? $errors['nama'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" value="<?= isset($form_data['password']) ? $form_data['password'] : ""; ?>" class="form-control <?= (isset($errors['password']) ? 'is-invalid' : ''); ?>" name="password" id="password" />
                                        <div class="invalid-feedback">
                                            <?= isset($errors['password']) ? $errors['password'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirm" class="form-label">Password Confirm</label>
                                        <input type="password" value="<?= isset($form_data['password_confirm']) ? $form_data['password_confirm'] : ""; ?>" class="form-control <?= (isset($errors['password_confirm']) ? 'is-invalid' : ''); ?>" name="password_confirm" id="password_confirm" />
                                        <div class="invalid-feedback">
                                            <?= isset($errors['password_confirm']) ? $errors['password_confirm'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role_id" class="form-label">Role</label>
                                        <select class="form-select form-control <?= (isset($errors['role_id']) ? 'is-invalid' : ''); ?>" name="role_id" id="role_id">
                                            <option value="<?= $user['role_id']; ?>" selected><?= $user['role']; ?></option>
                                            <?php foreach ($roles as $role) : ?>
                                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penyelenggara_layanan" class="form-label">Penyelenggara Layanan</label>
                                        <select class="form-select form-control <?= (isset($errors['penyelenggara_layanan_id']) ? 'is-invalid' : ''); ?>" name="penyelenggara_layanan_id" id="penyelenggara_layanan">
                                            <option value="<?= $user['penyelenggara_layanan_id']; ?>" selected><?= ($user['penyelenggara']) ? $user['penyelenggara'] : "Pilih Salah Satu"; ?></option>
                                            <?php foreach ($penyelenggara_layanan as $penyelenggara) : ?>
                                                <option value="<?= $penyelenggara['id']; ?>"><?= $penyelenggara['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>