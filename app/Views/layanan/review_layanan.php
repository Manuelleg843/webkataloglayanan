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
                        <h1 class="m-0">Review Layanan</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Form Review <?= $standar_layanan['nama_layanan']; ?></h5>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('/review_layanan/save'); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <?php
                                    $form_data = session()->getFlashdata('form_data');
                                    $errors = session()->getFlashdata('errors');
                                    ?>

                                    <div class="mb-3">
                                        <label for="format" class="form-label">Format Layanan</label>
                                        <select name="format" class="form-select form-control" id="format">
                                            <option value="0">Salah</option>
                                            <option value="1">Benar</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alur" class="form-label">Alur Layanan</label>
                                        <select name="alur" class="form-select form-control" id="alur">
                                            <option value="0">Salah</option>
                                            <option value="1">Benar</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea class="form-control" id="catatan" name="catatan"><?= isset($form_data['catatan']) ? $form_data['catatan'] : '' ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="komentar" class="form-label">Komentar</label>
                                        <textarea class="form-control" id="komentar" name="komentar"><?= isset($form_data['catatan']) ? $form_data['catatan'] : '' ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Save
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