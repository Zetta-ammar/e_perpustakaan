<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card shadow">

    <div class="card-header bg-warning">
        Edit Buku
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

        <form action="<?= base_url('admin/buku/update/'.$buku['id']) ?>"
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label>Kategori</label>

                <select name="kategori_id" class="form-select">

                    <?php foreach($kategori as $k): ?>

                    <option
                        value="<?= $k['id'] ?>"
                        <?= $k['id']==$buku['kategori_id']?'selected':'' ?>>

                        <?= esc($k['nama_kategori']) ?>

                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       value="<?= esc($buku['judul']) ?>">
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text"
                       name="penulis"
                       class="form-control"
                       value="<?= esc($buku['penulis']) ?>">
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text"
                       name="penerbit"
                       class="form-control"
                       value="<?= esc($buku['penerbit']) ?>">
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number"
                       name="tahun"
                       class="form-control"
                       value="<?= esc($buku['tahun']) ?>">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="5"><?= esc($buku['deskripsi']) ?></textarea>

            </div>

            <div class="mb-3">

                <label>Cover Saat Ini</label><br>

                <img
                    src="<?= base_url('uploads/cover/'.$buku['cover']) ?>"
                    width="120"
                    class="img-thumbnail">

            </div>

            <div class="mb-3">
                <label>Ganti Cover</label>
                <input type="file"
                       name="cover"
                       class="form-control"
                       accept=".jpg,.jpeg,.png">
            </div>

            <div class="mb-3">
                <label>Ganti PDF</label>
                <input type="file"
                       name="file_pdf"
                       class="form-control"
                       accept=".pdf">
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="<?= base_url('admin/buku') ?>"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<?= $this->endSection() ?>