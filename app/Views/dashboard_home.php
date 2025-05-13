<?= $this->extend('layouts/layouts_dashboard') ?>


<?= $this->section('content') ?>
<h1 class="text-2xl font-bold">Welcome dashboard, <?= esc(auth()->user()->username) ?></h1>

<?= $this->endSection() ?>