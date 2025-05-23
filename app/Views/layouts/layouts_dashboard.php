<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Toko Bangunan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CDN (bisa diganti pakai lokal atau Vite) -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="flex h-screen flex-col justify-between border-e border-gray-100 bg-white w-64">
      <div class="px-4 py-6">
        <span class="grid h-10 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
          Logo
        </span>

        <ul class="mt-6 space-y-1">
          <?php $current = uri_string(); ?>

          <li>
            <a href="<?= base_url('/dashboard') ?>"
              class="block rounded-lg px-4 py-2 text-sm font-medium 
              <?= $current == 'dashboard' ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' ?>">
              Dashboard
            </a>
          </li>

          <li>
            <a href="<?= base_url('/products') ?>"
              class="block rounded-lg px-4 py-2 text-sm font-medium 
              <?= $current == 'products' ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' ?>">
              Produk
            </a>
          </li>

          <li>
            <a href="<?= base_url('/categories') ?>"
              class="block rounded-lg px-4 py-2 text-sm font-medium 
              <?= $current == 'categories' ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' ?>">
              Category
            </a>
          </li>


          <li>
            <details class="group [&_summary::-webkit-details-marker]:hidden">
              <summary class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                <span class="text-sm font-medium">Akun</span>
                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </span>
              </summary>

              <ul class="mt-2 space-y-1 px-4">
                <li>
                  <a href="#" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Profil
                  </a>
                </li>
                <li>
                  <a href="#" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Keamanan
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('/logout') ?>" class="block w-full rounded-lg px-4 py-2 text-sm font-medium text-red-500 hover:bg-gray-100 hover:text-red-600">
                    Logout
                  </a>
                </li>
              </ul>
            </details>
          </li>
        </ul>
      </div>

      <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
        <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
          <img alt="" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&fit=crop&w=1770&q=80" class="size-10 rounded-full object-cover" />
          <div>
            <p class="text-xs">
              <strong class="block font-medium"> <?= esc(auth()->user()->username) ?> </strong>
              <span> <?= esc(auth()->user()->email) ?> </span>
            </p>
          </div>
        </a>
      </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
      <?= $this->renderSection('content') ?>
    </main>
  </div>

</body>
</html>
