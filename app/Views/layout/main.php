<!doctype html>
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?= $this->include('layout/sidebar') ?>
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <?= $this->include('layout/header') ?>
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
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