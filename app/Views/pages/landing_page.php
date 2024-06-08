<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Layanan STIS</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/stis.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
                        <a href="#" class="text-nowrap logo-img">
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
                                        Selamat Datang di Portal Katalog Layanan STIS
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <input type="" class="form-control" placeholder="Masukkan kata kunci" id="" aria-describedby="" />
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
                                                        <span class="fw-light"><?= $layanan['produk_layanan']; ?></span>
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>