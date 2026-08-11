<?= $this->include('layouts/header') ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/admin/dashboard">
            E-Perpustakaan | ADMIN
        </a>

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/kategori">Kategori</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/buku">Buku</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-danger ms-2" href="/logout">
                    Logout
                </a>
            </li>

        </ul>

    </div>
</nav>

<div class="container mt-4">

    <?= $this->renderSection('content') ?>

</div>

<?= $this->include('layouts/footer') ?>