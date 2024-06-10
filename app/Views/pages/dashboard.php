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
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form class="search-form" action="<?= base_url('/dashboard'); ?>" method="get">
                    <div class="mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Masukkan kata kunci" value="<?= esc($keyword) ?>" id="search-input" aria-describedby="" oninput="searchService()" />
                        <div id="searchHelp" class="form-text">
                            <b>Contoh:</b> layanan, ijazah, laporan, data,
                            kerjasama, dan lain lain...
                        </div>
                    </div>
                </form>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    <?php foreach ($standar_layanan as $layanan) : ?>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="card overflow-hidden rounded-2 h-full p-3 bg-white border-[1px] border-gray-300 w-full shadow-xl flex flex-col gap-2 justify-between" style="width: 400px;">
                                <div class="d-flex justify-content-start gap-3 lg:gap-4 align-items-stretch">
                                    <img src="../assets/images/logos/stis.png" width="50" height="50" class="object-contain" />
                                    <div class="flex-grow">
                                        <span class="fw-bolder"><?= $layanan['nama_layanan']; ?></span>
                                        <br />
                                        <span class="fw-light"><?= substr($layanan['produk_layanan'], 0, 25); ?></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-auto">
                                    <a href="<?= base_url('/detail_layanan/' . $layanan['id']); ?>" class="btn btn-primary">Standar Layanan</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>