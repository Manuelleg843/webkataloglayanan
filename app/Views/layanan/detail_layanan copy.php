<?php $this->extend('layout/main'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <!-- Row 1 -->
    <div class="row">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h1 class="m-0">Standar Layanan STIS</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Permohonan Narasumber Sosialisasi</h5>
                        <table class="table table-bordered">
                            <!-- <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead> -->
                            <?php
                            $sistemekanisme = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. \nQuisquam blanditiis, iste, vel repellendus consequuntur autem quod perferendis harum rem ipsum ut obcaecati ea reiciendis, cupiditate consequatur aperiam itaque corrupti illum!";
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Persyaratan</h5>
                                    </th>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam blanditiis, iste, vel repellendus consequuntur autem quod perferendis harum rem ipsum ut obcaecati ea reiciendis, cupiditate consequatur aperiam itaque corrupti illum!</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Sistem, Mekanisme, dan Prosedur</h5>
                                    </th>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque aliquid dolore nobis obcaecati saepe quam reprehenderit ipsum quas. Impedit sequi consequatur maxime a dolores laboriosam tenetur dolor placeat repellat commodi?</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Jangka Waktu Pelayanan</h5>
                                    </th>
                                    <td>
                                        <img src="<?= base_url('layanan_images/peminjaman_bahan_pustaka.png'); ?>" class="w-50" alt="Gambar Teknis">
                                        <p>
                                            <?= nl2br(esc($sistemekanisme)) ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Biaya/Tarif</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Produk Pelayanan</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Penanganan Pengaduan, Saran dan Masukan</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Dasar Hukum</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Sarana dan Prasarana dan/atau Fasilitas</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Kompetensi Pelaksana</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Pengawasan Internal</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Jumlah Pelaksana</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Jaminan Pelayanan</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Jaminan Keamanan dan Keselamatan Pelayanan</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h5 class="fw-semibold mb-1">Evaluasi Kinerja Pelaksana</h5>
                                    </th>
                                    <td>Jacob</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>