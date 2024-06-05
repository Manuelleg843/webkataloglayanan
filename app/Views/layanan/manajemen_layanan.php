<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!--  Row 1 -->
<div class="row">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Layanan STIS</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <input type="" class="form-control" placeholder="Masukkan kata kunci" id="" aria-describedby="">
                        <div id="searchHelp" class="form-text"><b>Contoh:</b> layanan, ijazah, laporan, data, kerjasama, dan lain lain...</div>
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
                                        <span class="fw-normal"><?= $layanan['produk_layanan']; ?></span>
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
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><i class="ti ti-eye"></i></button>
                                            <button type="button" class="btn btn-warning"><i class="ti ti-edit"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i></button>
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