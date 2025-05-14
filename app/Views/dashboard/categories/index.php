<?= $this->extend('layouts/layouts_dashboard') ?>

<?= $this->section('content') ?>
  <h1 class="text-xl font-bold mb-4">List Categories</h1>

  <a href="<?= base_url('categories/create') ?>" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Categories</a>

  <table class="min-w-full border border-gray-200 mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat): ?>
                <tr class="border-t">
                    <td class="px-4 py-2"><?= $cat['id'] ?></td>
                    <td class="px-4 py-2"><?= esc($cat['name']) ?></td>
                    <td class="px-4 py-2">
                        <a href="/categories/edit/<?= $cat['id'] ?>" class="text-white hover:underline bg-blue-600 px-4 py-2 rounded-lg ">Edit</a> 
                        <a href="/categories/delete/<?= $cat['id'] ?>" onclick="return confirm('Yakin hapus?')" class="text-white bg-red-600 px-4 py-2 rounded-lg hover:underline">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
