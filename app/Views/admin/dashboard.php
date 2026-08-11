<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Custom CSS Tambahan (Bisa ditaruh di header layout atau tag style) -->
<style>
    .stat-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: none;
        border-radius: 12px;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.12) !important;
    }
    .icon-shape {
        width: 55px;
        height: 55px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-0 text-dark">Dashboard</h3>
        <p class="text-muted mb-0">Ringkasan data perpustakaan Anda hari ini.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Card Total Buku -->
    <div class="col-md-6 col-lg-6">
        <div class="card stat-card bg-primary text-white shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-white-50 text-uppercase fw-semibold fs-7 tracking-wider">Total Buku</span>
                        <h2 class="display-5 fw-bold mb-0 mt-2"><?= number_format($jumlahBuku) ?></h2>
                    </div>
                    <div class="icon-shape">
                        <i class="bi bi-book fs-2 text-white"></i> 
                        <!-- Jika menggunakan FontAwesome, ganti class di atas dengan: <i class="fas fa-book fs-2 text-white"></i> -->
                    </div>
                </div>
                <div class="mt-3 pt-3 border-top border-white-20 d-flex align-items-center justify-content-between">
                    <small class="text-white-50">Data diperbarui secara realtime</small>
                    <i class="bi bi-arrow-right text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Kategori -->
    <div class="col-md-6 col-lg-6">
        <div class="card stat-card bg-success text-white shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-white-50 text-uppercase fw-semibold fs-7 tracking-wider">Total Kategori</span>
                        <h2 class="display-5 fw-bold mb-0 mt-2"><?= number_format($jumlahKategori) ?></h2>
                    </div>
                    <div class="icon-shape">
                        <i class="bi bi-tags fs-2 text-white"></i> 
                        <!-- Jika menggunakan FontAwesome, ganti class di atas dengan: <i class="fas fa-tags fs-2 text-white"></i> -->
                    </div>
                </div>
                <div class="mt-3 pt-3 border-top border-white-20 d-flex align-items-center justify-content-between">
                    <small class="text-white-50">Kelola kategori buku</small>
                    <i class="bi bi-arrow-right text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>