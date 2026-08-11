<?= $this->include('layouts/header') ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="container">

<a class="navbar-brand" href="/">

Perpustakaan Digital

</a>

</div>

</nav>

<div class="container mt-4">

<?= $this->renderSection('content') ?>

</div>

<?= $this->include('layouts/footer') ?>