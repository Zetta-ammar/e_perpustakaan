<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3>Data Buku</h3>

    <a href="<?= base_url('admin/buku/create') ?>" class="btn btn-primary">
        Tambah Buku
    </a>

</div>

<?php if(session()->getFlashdata('success')) : ?>

<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>

<?php endif; ?>

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>

            <th width="50">No</th>
            <th width="90">Cover</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th width="170">Aksi</th>

        </tr>

    </thead>

    <tbody>

    <?php if(empty($buku)): ?>

        <tr>
            <td colspan="7" class="text-center">
                Belum ada data buku.
            </td>
        </tr>

    <?php else: ?>

        <?php $no = 1 + (5 * ($currentPage - 1)); ?>

        <?php foreach($buku as $row): ?>

        <tr>

            <td><?= $no++ ?></td>

            <td class="text-center">

    <img src="<?= base_url('uploads/cover/'.$row['cover']) ?>"
         width="70"
         class="img-thumbnail">

</td>

            <td><?= esc($row['judul']) ?></td>

            <td><?= esc($row['nama_kategori']) ?></td>

            <td><?= esc($row['penulis']) ?></td>

            <td><?= esc($row['tahun']) ?></td>

           <td>

    <a href="<?= base_url('uploads/pdf/'.$row['file_pdf']) ?>"
       target="_blank"
       class="btn btn-info btn-sm">
        Baca
    </a>

    <a href="<?= base_url('admin/buku/edit/'.$row['id']) ?>"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <a href="<?= base_url('admin/buku/delete/'.$row['id']) ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus buku ini?')">
    Hapus
</a>

</td>

        </tr>

        <?php endforeach; ?>

    <?php endif; ?>

    </tbody>

</table>

<?php if (!empty($buku)): ?>
    <div class="d-flex justify-content-center">
        <?= $pager->links('admin_buku', 'bootstrap_full') ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
