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
                        <h1 class="m-0">Update Penyelenggara Layanan</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Form Update Penyelenggara Layanan</h5>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('/edit_penyelenggara/update/' . $penyelenggara['id']); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <?php
                                    $form_data = session()->getFlashdata('form_data');
                                    $errors = session()->getFlashdata('errors');
                                    ?>

                                    <div class="mb-3">
                                        <label for="nama_layanan" class="form-label">Nama Penyelenggara</label>
                                        <input type="text" value="<?= isset($form_data['nama']) ? $form_data['nama'] : $penyelenggara['nama']; ?>" class="form-control <?= (isset($errors['nama']) ? 'is-invalid' : ''); ?>" name="nama" id="nama" autofocus />
                                        <div class="invalid-feedback">
                                            <?= isset($errors['nama']) ? $errors['nama'] : '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" value="<?= isset($form_data['email']) ? $form_data['email'] : $penyelenggara['email']; ?>" class="form-control" name="email" id="email" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="telp" class="form-label">No Telp</label>
                                        <input type="text" value="<?= isset($form_data['telp']) ? $form_data['telp'] : $penyelenggara['telp']; ?>" class="form-control" name="telp" id="telp" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi"><?= isset($form_data['deskripsi']) ? $form_data['deskripsi'] : $penyelenggara['deskripsi']; ?></textarea>
                                    </div>
                                    <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-primary">
                                        Ubah
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