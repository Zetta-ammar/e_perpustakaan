<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card shadow">

    <div class="card-header bg-warning">
        Edit Kategori
    </div>

    <div class="card-body">

        <form action="<?= base_url('admin/kategori/update/'.$kategori['id']) ?>" method="post">

            <?= csrf_field() ?>

            <div class="mb-3">

                <label class="form-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="<?= $kategori['nama_kategori'] ?>"
                    required>

            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="<?= base_url('admin/kategori') ?>" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<?= $this->endSection() ?>