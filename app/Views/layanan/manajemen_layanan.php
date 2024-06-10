<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!--  Row 1 -->
<div class="row">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Layanan <?= (session()->get('role_id') == 2) ? session()->get('penyelenggara_layanan') : "STIS" ?></h1>
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
                <form class="search-form" action="<?= base_url('/manajemen_layanan'); ?>" method="get">
                    <div class="mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Masukkan kata kunci" value="<?= esc($keyword) ?>" id="search-input" aria-describedby="" oninput="searchService()" />
                        <div id="searchHelp" class="form-text">
                            <b>Contoh:</b> layanan, ijazah, laporan, data,
                            kerjasama, dan lain lain...
                        </div>
                    </div>
                </form>
                <h5 class="card-title fw-semibold mb-4">Layanan Terdaftar</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Layanan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Unit Penyelenggara</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($standar_layanan as $layanan) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $i++; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= $layanan['nama_layanan']; ?></h6>
                                        <span class="fw-normal"><?= substr($layanan['produk_layanan'], 0, 25); ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $layanan['penyelenggara_layanan']; ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <?php if ($layanan['status'] == 1) { ?>
                                                <span class="badge bg-success rounded-3 fw-semibold">Disetujui</span>
                                            <?php } else if ($layanan['status'] == 2) { ?>
                                                <span class="badge bg-warning rounded-3 fw-semibold">Revisi</span>
                                            <?php } else { ?>
                                                <span class="badge bg-secondary rounded-3 fw-semibold">Pending</span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex justify-content-evenly" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('/detail_layanan/') . $layanan['id']; ?>" class="btn btn-primary"><i class="ti ti-eye"></i></a>
                                            <a href="<?= base_url('/edit_layanan/') . $layanan['id']; ?>" type="button" class="btn btn-warning"><i class="ti ti-edit"></i></a>
                                            <form class="" action="/delete_layanan/<?= $layanan['id']; ?>" method="POST">
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