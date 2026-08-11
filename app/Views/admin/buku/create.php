<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        Tambah Buku
    </div>

    <div class="card-body">
        <?php if(session('errors')) : ?>

<div class="alert alert-danger">

    <ul class="mb-0">

        <?php foreach(session('errors') as $error): ?>

            <li><?= esc($error) ?></li>

        <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

        <form action="<?= base_url('admin/buku/store') ?>" method="post" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>

                    <?php foreach($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>">
                            <?= esc($k['nama_kategori']) ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number"
                       name="tahun"
                       class="form-control"
                       min="1900"
                       max="<?= date('Y') ?>"
                       required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Cover Buku</label>
                <input type="file"
                       name="cover"
                       class="form-control"
                       accept=".jpg,.jpeg,.png">
            </div>

            <div class="mb-3">
                <label>File PDF</label>
                <input type="file"
                       name="file_pdf"
                       class="form-control"
                       accept=".pdf"
                       required>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="<?= base_url('admin/buku') ?>" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<?= $this->endSection() ?>