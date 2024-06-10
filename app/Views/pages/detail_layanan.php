<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Layanan STIS</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/assets/images/logos/stis.png'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/styles.min.css'); ?>" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper">
        <!--  Main wrapper -->
        <div class="body-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">
            <!--  Header Start -->
            <header class="app-header mb-4" style="position: fixed">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="brand-logo d-flex align-items-center justify-content-between">
                        <a href="<?= base_url('/'); ?>" class="text-nowrap logo-img">
                            <img src="../assets/images/logos/stis.png" class="mx-1" width="40" alt="" />
                            <span class="card-title text-dark fw-bolder">Katalog Layanan STIS</span>
                        </a>
                        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse"></div>
                    </div>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="<?= base_url('/login'); ?>" class="btn btn-primary">Login</a>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <!-- Content Header (Page header) -->
                    <div class="content-header mt-5">
                        <div class="container-fluid">
                            <div class="row mb-3">
                                <div class="col d-flex justify-content-center">
                                    <h1 class="m-0">
                                        Standar Layanan STIS
                                    </h1>
                                </div>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold mb-4"><?= $standar_layanan['nama_layanan']; ?></h5>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Persyaratan</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['persyaratan']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Sistem, Mekanisme, dan Prosedur</h5>
                                                </th>
                                                <td>
                                                    <img src="<?= base_url('layanan_images/' . $standar_layanan['gambar']); ?>" class="w-50" alt="Gambar Teknis">
                                                    <p><?= nl2br($standar_layanan['sistem_mekanisme_dan_prosedur']); ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Jangka Waktu Pelayanan</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['jangka_waktu_pelayanan']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Biaya/Tarif</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['biaya_tarif']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Produk Pelayanan</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['produk_layanan']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Penanganan Pengaduan, Saran dan Masukan</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['penanganan_pengaduan_saran_masukan']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Dasar Hukum</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['dasar_hukum']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Sarana dan Prasarana dan/atau Fasilitas</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['sarana_prasarana_fasilitas']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Kompetensi Pelaksana</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['kopetensi_pelaksana']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Pengawasan Internal</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['pengawasan_internal']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Jumlah Pelaksana</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['jumlah_pelaksana']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Jaminan Pelayanan</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['jaminan_pelayanan']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Jaminan Keamanan dan Keselamatan Pelayanan</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['jaminan_keamanan_keselamatan_pelayanan']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <h5 class="fw-semibold mb-1">Evaluasi Kinerja Pelaksana</h5>
                                                </th>
                                                <td><?= nl2br($standar_layanan['evaluasi_kinerja_pelaksana']); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-6 px-6 text-center">
                    <strong>Made with <i class="fa fa-heart ml-1"></i> &copy;
                        <a href="https://api.duniagames.co.id/api/content/upload/file/6975025431687514976.jpg" target="_blank">Mahasiswa Politeknik Statistika STIS</a>.</strong>
                    All rights reserved.
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0.0
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('/assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/sidebarmenu.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/app.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/dashboard.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/layanan_form.js'); ?>"></script>
</body>

</html>