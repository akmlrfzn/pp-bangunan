<?= $this->extend('layouts/layouts_dashboard') ?>

<?= $this->section('content') ?>
  <h1 class="text-xl font-bold mb-4">Create Categories</h1>

  <h1 class="text-2xl font-bold mb-4">Tambah Kategori</h1>
    <form action="/categories/store" method="post" class="max-w-md">
        <label class="block mb-2">Nama Kategori:</label>
        <input type="text" name="name" class="w-full px-4 py-2 border rounded mb-4" required>

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        <a href="/categories" class="ml-2 text-gray-600 hover:underline">Kembali</a>
    </form>

  
<?= $this->endSection() ?>
