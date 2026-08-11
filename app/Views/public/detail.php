<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($judul) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <a href="<?= base_url('/') ?>" class="btn btn-secondary mb-4">
        ← Kembali
    </a>

    <div class="card shadow">

        <div class="row g-0">

            <div class="col-md-4 text-center p-4">

                <img
                    src="<?= base_url('uploads/cover/'.$buku['cover']) ?>"
                    class="img-fluid rounded shadow">

            </div>

            <div class="col-md-8">

                <div class="card-body">

                    <h2><?= esc($buku['judul']) ?></h2>

                    <table class="table">

                        <tr>
                            <th width="150">Kategori</th>
                            <td><?= esc($buku['nama_kategori']) ?></td>
                        </tr>

                        <tr>
                            <th>Penulis</th>
                            <td><?= esc($buku['penulis']) ?></td>
                        </tr>

                        <tr>
                            <th>Penerbit</th>
                            <td><?= esc($buku['penerbit']) ?></td>
                        </tr>

                        <tr>
                            <th>Tahun</th>
                            <td><?= esc($buku['tahun']) ?></td>
                        </tr>

                    </table>

                    <h5>Deskripsi</h5>

                    <p><?= nl2br(esc($buku['deskripsi'])) ?></p>

                    <hr>

                    <a href="<?= base_url('uploads/pdf/'.$buku['file_pdf']) ?>"
                       target="_blank"
                       class="btn btn-primary">
                        📖 Baca PDF
                    </a>

                    <a href="<?= base_url('uploads/pdf/'.$buku['file_pdf']) ?>"
                       download
                       class="btn btn-success">
                        ⬇ Download PDF
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>