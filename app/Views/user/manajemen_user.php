<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!--  Row 1 -->
<div class="row">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Penyelenggara Layanan</h1>
                    <nav class="navbar my-2">
                        <div class="container-fluid btn-group justify-content-start">
                            <a href="<?= base_url('/manajemen_user'); ?>" class="btn active <?= ($subtajuk == 'Manajemen User') ? 'active disable'  : ''; ?> btn-outline-secondary me-2">Manajemen User</a>
                            <a href="<?= base_url('/manajemen_role'); ?>" class="btn <?= ($subtajuk == 'Manajemen Role') ? 'active disable'  : ''; ?> btn-outline-secondary me-2">Manajemen Role</a>
                        </div>
                    </nav>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start mt-2 mb-4">
                    <a href="<?= base_url('/create_user'); ?>" class="btn btn-primary">Tambah User</a>
                </div>
                <h5 class="card-title fw-semibold mb-4">Daftar User</h5>
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th scope="col" class="border-bottom-0" style="max-width: 200px;">
                                    <h6 class="fw-semibold mb-0">Role</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Penyelenggara Layanan</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $i++; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $user['email']; ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= $user['nama']; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $user['role']; ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $user['penyelenggara']; ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex justify-content-evenly" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('/edit_user/') . $user['id']; ?>" type="button" class="btn btn-warning"><i class="ti ti-edit"></i></a>
                                            <form class="" action="/delete_user/<?= $user['id']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="ti ti-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>