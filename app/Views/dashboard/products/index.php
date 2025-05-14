<?= $this->extend('layouts/layouts_dashboard') ?>

<?= $this->section('content') ?>
  <h1 class="text-xl font-bold mb-4">Daftar Produk</h1>

  <a href="<?= base_url('products/create') ?>" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Produk</a>

  <div class="overflow-x-auto bg-white p-4 rounded shadow">
   <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Deskripsi</th>
                <th class="px-4 py-2 text-left">Harga</th>
                <th class="px-4 py-2 text-left">Stok</th>
                <th class="px-4 py-2 text-left">Kategori</th>
                <th class="px-4 py-2 text-left">Gambar</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
                <tr class="border-t">
                    <td class="px-4 py-2"><?= esc($p['name']) ?></td>
                    <td class="px-4 py-2"><?= esc($p['description']) ?></td>
                    <td class="px-4 py-2">Rp<?= number_format($p['price'], 2, ',', '.') ?></td>
                    <td class="px-4 py-2"><?= $p['stock'] ?></td>
                    <td class="px-4 py-2"><?= $p['category_name'] ?></td>
                    <td class="px-4 py-2">
                        <?php if ($p['image']): ?>
                            <img src="/uploads/products/<?= $p['image'] ?>" class="w-20 h-20 object-cover rounded">
                        <?php else: ?>
                            <span class="text-gray-400">Tidak ada</span>
                        <?php endif ?>
                    </td>
                  
                    <td class="px-4 py-2">
                        <a href="/products/edit/<?= $p['id'] ?>" class="text-yellow-600 hover:underline">Edit</a> |
                        <form action="/products/delete/<?= $p['id'] ?>" method="post" class="inline">
                            <?= csrf_field() ?>
                            <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
  </div>
<?= $this->endSection() ?>
