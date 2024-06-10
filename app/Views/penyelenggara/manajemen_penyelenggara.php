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
                    <a href="<?= base_url('/create_penyelenggara'); ?>" class="btn btn-primary">Tambah Penyelenggara</a>
                </div>
                <h5 class="card-title fw-semibold mb-4">Daftar Penyelenggara Layanan</h5>
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Penyelenggara</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No Telp</h6>
                                </th>
                                <th scope="col" class="border-bottom-0" style="max-width: 200px;">
                                    <h6 class="fw-semibold mb-0">Deskripsi</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penyelenggara_layanan as $penyelenggara) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $i++; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= $penyelenggara['nama']; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $penyelenggara['email']; ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $penyelenggara['telp']; ?></p>
                                    </td>
                                    <td class="border-bottom-0 text-warp" style="max-width: 250px;">
                                        <p class="text-justify mb-0 fw-normal">
                                            <?= htmlspecialchars(substr($penyelenggara['deskripsi'], 0, 75) . "..."); ?>
                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex justify-content-evenly" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('/edit_penyelenggara/') . $penyelenggara['id']; ?>" type="button" class="btn btn-warning"><i class="ti ti-edit"></i></a>
                                            <form class="" action="/delete_penyelenggara/<?= $penyelenggara['id']; ?>" method="POST">
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