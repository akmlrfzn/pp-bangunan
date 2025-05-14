<?= $this->extend('layouts/layouts_dashboard') ?>

<?= $this->section('content') ?>
  <h1 class="text-xl font-bold mb-4">Edit Produk</h1>

  <form action="/products/store" method="post" enctype="multipart/form-data" class="max-w-md space-y-4">
        <input name="name" type="text" placeholder="Nama Produk" required class="w-full px-4 py-2 border rounded" />
        <textarea name="description" placeholder="Deskripsi" required class="w-full px-4 py-2 border rounded"></textarea>
        <input name="price" type="number" step="0.01" placeholder="Harga" required class="w-full px-4 py-2 border rounded" />
        <input name="stock" type="number" placeholder="Stok" required class="w-full px-4 py-2 border rounded" />

        <select name="category_id" required class="w-full px-4 py-2 border rounded">
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?></option>
            <?php endforeach ?>
        </select>

        <input type="file" name="image" class="w-full border rounded px-4 py-2" />

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        <a href="/products" class="ml-2 text-gray-600 hover:underline">Kembali</a>
    </form>
  
<?= $this->endSection() ?>
