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
                        <h5 class="card-title fw-semibold mb-4"><?= $standar_layanan['nama_layanan']; ?></h5>
                        <table class="table table-bordered">
                            <!-- <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead> -->
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
                                        <img src="<?= base_url('layanan_images/peminjaman_bahan_pustaka.png'); ?>" class="w-50" alt="Gambar Teknis">
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
</div>

<?php $this->endSection(); ?>