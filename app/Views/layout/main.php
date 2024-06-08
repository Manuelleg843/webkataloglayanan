<!doctype html>
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?= $this->include('layout/sidebar') ?>
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <?= $this->include('layout/header') ?>
            <div class="container-fluid">
                <!-- content Mulai -->
                <?= $this->renderSection('content') ?>
                <!-- content Selesai -->
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