<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!--  Row 1 -->
<div class="row">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Role</h1>
                    <nav class="navbar my-2">
                        <div class="container-fluid btn-group justify-content-start">
                            <a href="<?= base_url('/manajemen_user'); ?>" class="btn <?= ($subtajuk == 'Manajemen User') ? 'active disable'  : ''; ?> btn-outline-secondary me-2">Manajemen User</a>
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
                <h5 class="card-title fw-semibold mb-4">Daftar Role</h5>
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Role</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Permission</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($roles as $role) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 mt-5"><?= $i++; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal mt-5"><?= $role['role'] ?></p>
                                    </td>
                                    <td class="border-bottom-0 ml=5">
                                        <div class="container mt-5">
                                            <form class="row g-3 align-items-center" action="<?= base_url('/manajemen_role/update/' . $role['id']); ?>" method="post">
                                                <label>
                                                    <input <?= ($role['role'] == "Super Admin") ? 'disabled' : '' ?> class="col-auto" <?= in_array(1, $role['permissions']) ? "checked" : "" ?> type="checkbox" name="manajemen_layanan" value="1"> Manajemen Layanan
                                                </label><br>
                                                <label>
                                                    <input <?= ($role['role'] == "Super Admin") ? 'disabled' : '' ?> class="col-auto" <?= in_array(2, $role['permissions']) ? "checked" : "" ?> type="checkbox" name="persetujuan_layanan" value="2"> Persetujuan Layanan
                                                </label><br>
                                                <label>
                                                    <input <?= ($role['role'] == "Super Admin") ? 'disabled' : '' ?> class="col-auto" <?= in_array(3, $role['permissions']) ? "checked" : "" ?> type="checkbox" name="manajemen_penyelenggara" value="3"> Manajemen Penyelenggara
                                                </label><br>
                                                <label>
                                                    <input <?= ($role['role'] == "Super Admin") ? 'disabled' : '' ?> class="col-auto" <?= in_array(4, $role['permissions']) ? "checked" : "" ?> type="checkbox" name="manajemen_user" value="4"> Manajemen Users
                                                </label>
                                                <div>
                                                    <button <?= ($role['role'] == "Super Admin") ? 'disabled' : '' ?> type="submit" class="btn btn-primary btn-sm max-w-20">
                                                        Simpan
                                                    </button>
                                                </div>
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