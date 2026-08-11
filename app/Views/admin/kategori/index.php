<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3>Data Kategori</h3>

    <a href="<?= base_url('admin/kategori/create') ?>"
       class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Kategori
    </a>

</div>
<?php if(session()->getFlashdata('success')) : ?>

<div class="alert alert-success">

    <?= session()->getFlashdata('success') ?>

</div>

<?php endif; ?>

<table class="table table-striped table-hover table-bordered align-middle">

   <thead class="table-dark">
<tr>
    <th width="70">No</th>
    <th>Nama Kategori</th>
    <th width="180">Aksi</th>
</tr>
</thead>

    <tbody>

    <?php $no = 1 + (5 * ($currentPage - 1)); ?>

    <?php foreach($kategori as $row): ?>

    <tr>

        <td><?= $no++ ?></td>

        <td><?= esc($row['nama_kategori']) ?></td>

        <td>

            <a href="<?= base_url('admin/kategori/edit/'.$row['id']) ?>"
   class="btn btn-warning btn-sm">
    Edit
</a>

            <a href="<?= base_url('admin/kategori/delete/'.$row['id']) ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus kategori ini?')">
    Hapus
</a>

        </td>

    </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php if (!empty($kategori)): ?>
    <div class="d-flex justify-content-center">
        <?= $pager->links('admin_kategori', 'bootstrap_full') ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
