<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
  <h1 class="text-xl font-bold mb-4">Daftar Produk</h1>

  <a href="<?= base_url('products/create') ?>" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Produk</a>

  <div class="overflow-x-auto bg-white p-4 rounded shadow">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left font-medium text-gray-600">Nama</th>
          <th class="px-6 py-3 text-left font-medium text-gray-600">Harga</th>
          <th class="px-6 py-3 text-left font-medium text-gray-600">Stok</th>
          <th class="px-6 py-3 text-left font-medium text-gray-600">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php foreach ($products as $p): ?>
          <tr>
            <td class="px-6 py-2"><?= esc($p['name']) ?></td>
            <td class="px-6 py-2">Rp<?= number_format($p['price'], 0, ',', '.') ?></td>
            <td class="px-6 py-2"><?= esc($p['stock']) ?></td>
            <td class="px-6 py-2">
              <a href="<?= base_url('products/edit/'.$p['id']) ?>" class="text-blue-600 hover:underline">Edit</a>
              <form action="<?= base_url('products/delete/'.$p['id']) ?>" method="post" class="inline">
                <?= csrf_field() ?>
                <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
<?= $this->endSection() ?>
