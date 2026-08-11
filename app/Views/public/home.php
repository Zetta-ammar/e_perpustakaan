<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($judul ?? 'E-Perpustakaan') ?></title>
    
    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* Styling Khusus Katalog Buku */
        .hero-section {
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
            border-radius: 20px;
            color: #ffffff;
        }
        
        .book-card {
            border: none;
            border-radius: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12) !important;
        }

        .book-cover-container {
            position: relative;
            height: 280px;
            overflow: hidden;
            background-color: #f1f5f9;
        }

        .book-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .book-card:hover .book-cover {
            transform: scale(1.05);
        }

        .badge-category {
            background-color: #e0e7ff;
            color: #4338ca;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        .btn-detail {
            border-radius: 10px;
            font-weight: 600;
            background-color: #4f46e5;
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn-detail:hover {
            background-color: #4338ca;
        }

        .search-box {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
        }

        .search-box:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>

<body class="bg-light">

<div class="container py-4">

    <!-- Header & Hero Filter -->
    <div class="hero-section p-4 p-md-5 mb-5 shadow">
        <div class="text-center mb-4">
            <h1 class="fw-bold mb-1">E-Perpustakaan</h1>
            <p class="text-white-50 mb-0">Temukan ribuan koleksi buku menarik dan tingkatkan wawasan Anda.</p>
        </div>

        <!-- Form Pencarian -->
        <form method="get" action="">
            <div class="row g-2 justify-content-center bg-white p-3 rounded-4 shadow-sm">
                
                <!-- Input Keyword -->
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                            <i class="bi bi-search"></i>
                        </span>
                        <input 
                            type="text" 
                            name="keyword" 
                            class="form-control border-0 shadow-none ps-0" 
                            placeholder="Cari berdasarkan judul atau penulis..." 
                            value="<?= esc($_GET['keyword'] ?? '') ?>">
                    </div>
                </div>

                <!-- Select Kategori -->
                <div class="col-md-4 border-start border-md-0">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                            <i class="bi bi-grid"></i>
                        </span>
                        <select name="kategori" class="form-select border-0 shadow-none ps-0">
                            <option value="">Semua Kategori</option>
                            <?php foreach($kategori as $k): ?>
                                <option 
                                    value="<?= $k['id'] ?>" 
                                    <?= (($_GET['kategori'] ?? '') == $k['id']) ? 'selected' : '' ?>>
                                    <?= esc($k['nama_kategori']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="col-md-3">
                    <button class="btn btn-primary w-100 h-100 py-2 rounded-3 fw-semibold" style="background-color: #4f46e5; border: none;">
                        <i class="bi bi-filter me-1"></i> Cari Buku
                    </button>
                </div>

            </div>
        </form>
    </div>

    <!-- Grid List Buku -->
    <div class="row g-4">
        
        <?php if(empty($buku)): ?>
            <!-- Tampilan Jika Buku Tidak Ditemukan -->
            <div class="col-12 text-center py-5">
                <div class="bg-white p-5 rounded-4 shadow-sm d-inline-block">
                    <i class="bi bi-search-heart display-1 text-muted opacity-50 mb-3 d-block"></i>
                    <h4 class="fw-bold text-dark mb-1">Buku Tidak Ditemukan</h4>
                    <p class="text-muted mb-3">Coba gunakan kata kunci lain atau pilih kategori yang berbeda.</p>
                    <a href="<?= current_url() ?>" class="btn btn-outline-primary rounded-pill px-4">
                        Reset Pencarian
                    </a>
                </div>
            </div>
        <?php else: ?>
            
            <?php foreach($buku as $row): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card book-card h-100 shadow-sm">
                        
                        <!-- Cover Buku -->
                        <div class="book-cover-container">
                            <?php if(!empty($row['cover']) && file_exists(FCPATH . 'uploads/cover/' . $row['cover'])): ?>
                                <img src="<?= base_url('uploads/cover/'.$row['cover']) ?>" alt="<?= esc($row['judul']) ?>" class="book-cover">
                            <?php else: ?>
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="bi bi-book fs-1 mb-2"></i>
                                    <small class="fs-8">No Cover</small>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Info Buku -->
                        <div class="card-body p-3 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-2">
                                    <span class="badge badge-category">
                                        <?= esc($row['nama_kategori']) ?>
                                    </span>
                                </div>
                                <h6 class="fw-bold text-dark text-truncate-2 mb-1" title="<?= esc($row['judul']) ?>" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.6em;">
                                    <?= esc($row['judul']) ?>
                                </h6>
                                <p class="text-muted fs-7 mb-3 text-truncate">
                                    <i class="bi bi-person me-1"></i><?= esc($row['penulis']) ?>
                                </p>
                            </div>

                            <a href="<?= base_url('detail/'.$row['id']) ?>" class="btn btn-primary btn-detail w-100 py-2 text-white">
                                Detail Buku <i class="bi bi-arrow-right-short fs-5 align-middle"></i>
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>

    <?php if (!empty($buku)): ?>
        <div class="d-flex justify-content-center mt-5">
            <?= $pager->links('public', 'bootstrap_full') ?>
        </div>
    <?php endif; ?>

</div>

<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
