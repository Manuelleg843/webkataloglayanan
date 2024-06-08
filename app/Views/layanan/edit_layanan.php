<?php $this->extend('layout/main'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <!-- Row 1 -->
    <div class="row">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Layanan</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Form Update Layanan</h5>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('/edit_layanan/update/' . $standar_layanan['id']); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <?php
                                    $form_data = session()->getFlashdata('form_data');
                                    $errors = session()->getFlashdata('errors');
                                    ?>

                                    <div class="mb-3">
                                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                                        <input type="text" value="<?= isset($form_data['nama_layanan']) ? $form_data['nama_layanan'] : $standar_layanan['nama_layanan']; ?>" class="form-control <?= (isset($errors['nama_layanan']) ? 'is-invalid' : ''); ?>" name="nama_layanan" id="nama_layanan" autofocus />
                                        <div class="invalid-feedback">
                                            <?= isset($errors['nama_layanan']) ? $errors['nama_layanan'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="persyaratan" class="form-label">Persyaratan</label>
                                        <textarea class="form-control" id="persyaratan" name="persyaratan"><?= isset($form_data['persyaratan']) ? $form_data['persyaratan'] : $standar_layanan['persyaratan']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Sistem, Mekanisme, dan Prosedur</label>
                                        <div class="col-sm-2 mt-2 mb-3">
                                            <img src="<?= base_url('layanan_images/' . $standar_layanan['gambar']); ?>" class="img-thumbnail img-preview" />
                                        </div>
                                        <div class="col-sm-8 form-control <?= (isset($errors['gambar']) ? 'is-invalid' : ''); ?>">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImg()">
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= isset($errors['gambar']) ? $errors['gambar'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sistem_mekanisme_dan_prosedur" class="form-label">Sistem, Mekanisme, dan Prosedur</label>
                                        <textarea class="form-control" id="sistem_mekanisme_dan_prosedur" name="sistem_mekanisme_dan_prosedur"><?= isset($form_data['sistem_mekanisme_dan_prosedur']) ? $form_data['sistem_mekanisme_dan_prosedur'] : $standar_layanan['sistem_mekanisme_dan_prosedur']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jangka_waktu_pelayanan" class="form-label">Jangka Waktu Pelayanan</label>
                                        <input type="text" value="<?= isset($form_data['jangka_waktu_pelayanan']) ? $form_data['jangka_waktu_pelayanan'] : $standar_layanan['jangka_waktu_pelayanan']; ?>" class="form-control" name="jangka_waktu_pelayanan" id="jangka_waktu_pelayanan" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="biaya_tarif" class="form-label">Biaya/Tarif</label>
                                        <input type="text" value="<?= isset($form_data['biaya_tarif']) ? $form_data['biaya_tarif'] : $standar_layanan['biaya_tarif']; ?>" class="form-control" name="biaya_tarif" id="biaya_tarif" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="produk_layanan" class="form-label">Produk Pelayanan</label>
                                        <textarea class="form-control" id="produk_layanan" name="produk_layanan"><?= isset($form_data['produk_layanan']) ? $form_data['produk_layanan'] :  $standar_layanan['produk_layanan']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penanganan_pengaduan_saran_masukan" class="form-label">Penanganan Pengaduan, Saran dan Masukan</label>
                                        <textarea class="form-control" id="penanganan_pengaduan_saran_masukan" name="penanganan_pengaduan_saran_masukan"><?= isset($form_data['penanganan_pengaduan_saran_masukan']) ? $form_data['penanganan_pengaduan_saran_masukan'] : $standar_layanan['penanganan_pengaduan_saran_masukan']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dasar_hukum" class="form-label">Dasar Hukum</label>
                                        <textarea class="form-control" id="dasar_hukum" name="dasar_hukum"><?= isset($form_data['dasar_hukum']) ? $form_data['dasar_hukum'] : $standar_layanan['dasar_hukum']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sarana_prasarana_fasilitas" class="form-label">Sarana dan Prasarana dan/atau Fasilitas</label>
                                        <textarea class="form-control" id="sarana_prasarana_fasilitas" name="sarana_prasarana_fasilitas"><?= isset($form_data['sarana_prasarana_fasilitas']) ? $form_data['sarana_prasarana_fasilitas'] : $standar_layanan['sarana_prasarana_fasilitas']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kopetensi_pelaksana" class="form-label">Kompetensi Pelaksana</label>
                                        <textarea class="form-control" id="kopetensi_pelaksana" name="kopetensi_pelaksana"><?= isset($form_data['kopetensi_pelaksana']) ? $form_data['kopetensi_pelaksana'] : $standar_layanan['kopetensi_pelaksana']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengawasan_internal" class="form-label">Pengawasan Internal</label>
                                        <textarea class="form-control" id="pengawasan_internal" name="pengawasan_internal"><?= isset($form_data['pengawasan_internal']) ? $form_data['pengawasan_internal'] : $standar_layanan['pengawasan_internal']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_pelaksana" class="form-label">Jumlah Pelaksana</label>
                                        <input type="text" value="<?= isset($form_data['jumlah_pelaksana']) ? $form_data['jumlah_pelaksana'] : $standar_layanan['jumlah_pelaksana']; ?>" class="form-control" id="jumlah_pelaksana" name="jumlah_pelaksana" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="jaminan_pelayanan" class="form-label">Jaminan Pelayanan</label>
                                        <textarea class="form-control" id="jaminan_pelayanan" name="jaminan_pelayanan"><?= isset($form_data['jaminan_pelayanan']) ? $form_data['jaminan_pelayanan'] : $standar_layanan['jaminan_pelayanan']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jaminan_keamanan_keselamatan_pelayanan" class="form-label">Jaminan Keamanan dan Keselamatan Pelayanan</label>
                                        <textarea class="form-control" id="jaminan_keamanan_keselamatan_pelayanan" name="jaminan_keamanan_keselamatan_pelayanan"><?= isset($form_data['jaminan_keamanan_keselamatan_pelayanan']) ? $form_data['jaminan_keamanan_keselamatan_pelayanan'] : $standar_layanan['jaminan_keamanan_keselamatan_pelayanan']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="evaluasi_kinerja_pelaksana" class="form-label">Evaluasi Kinerja Pelaksana</label>
                                        <textarea class="form-control" id="evaluasi_kinerja_pelaksana" name="evaluasi_kinerja_pelaksana"><?= isset($form_data['evaluasi_kinerja_pelaksana']) ? $form_data['evaluasi_kinerja_pelaksana'] : $standar_layanan['evaluasi_kinerja_pelaksana']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Tautan/ Link ke Layanan (Opsional)</label>
                                        <input type="text" value="<?= isset($form_data['link']) ? $form_data['link'] : $standar_layanan['link']; ?>" class="form-control" id="link" name="link" />
                                    </div>
                                    <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-primary">
                                        <?= $standar_layanan['status'] == 2 ? 'Ajukan Ulang' : 'Ubah' ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>