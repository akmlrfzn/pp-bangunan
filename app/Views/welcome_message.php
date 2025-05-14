<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- TAILWIND CSS CDN -->
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<?= view('components/_navbar') ?> 

<!-- Hero Section  -->

<section class="relative bg-cover bg-center bg-no-repeat lg:h-screen" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');">
  <div class="absolute inset-0 bg-black/60"></div>

  <div class="relative mx-auto w-full max-w-screen-xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
    <div class="mx-auto max-w-prose text-center text-white">
      <h1 class="text-4xl font-bold sm:text-5xl">
        Bangun Impian Anda Bersama
        <strong class="text-yellow-400"> Toko Bangunan Kami </strong>
      </h1>

      <p class="mt-4 text-base sm:text-lg/relaxed text-pretty">
        Temukan berbagai material dan perlengkapan bangunan terbaik untuk rumah, kantor, maupun proyek Anda. Kualitas terjamin dan harga bersaing!
      </p>

      <div class="mt-6 flex justify-center gap-4">
        <a
          class="inline-block rounded border border-yellow-500 bg-yellow-500 px-5 py-3 font-medium text-black shadow-sm transition-colors hover:bg-yellow-600"
          href="<?= base_url('/products') ?>"
        >
          Belanja Sekarang
        </a>

        <a
          class="inline-block rounded border border-white px-5 py-3 font-medium text-white shadow-sm transition-colors hover:bg-white hover:text-black"
          href="<?= base_url('/about') ?>"
        >
          Tentang Kami
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Hero Section  -->

<!-- Product  -->
<section id="product">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
    <header class="text-center">
      <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Product Collection</h2>
      <p class="mx-auto mt-4 max-w-md text-gray-500">
        Temukan berbagai produk menarik dengan kualitas terbaik untuk kebutuhan Anda.
      </p>
    </header>

    <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($products as $product): ?>
        <li class="relative group border rounded overflow-hidden bg-white shadow">
          <a href="#" class="block overflow-hidden">
            <div class="relative">
              <img
                src="<?= base_url('uploads/products/' . $product['image']) ?>"
                alt="<?= esc($product['name']) ?>"
                class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
              />

              <!-- Tombol Tambah ke Keranjang -->
              <div class="absolute inset-0 flex items-end justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black/40">
                <a href="<?= base_url('cart/add/' . $product['id']) ?>"
                  class="mb-4 inline-block rounded bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200 transition">
                  Tambah ke Keranjang
                </a>
              </div>
            </div>

            <div class="relative bg-white pt-3 pb-5 px-2">
              <h3 class="text-sm font-semibold text-gray-800">
                <?= esc($product['name']) ?>
              </h3>
              <p class="mt-2 text-gray-900 font-bold">
                Rp <?= number_format($product['price'], 0, ',', '.') ?>
              </p>
            </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>


<!-- Product  -->

<!-- CTAs -->
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="p-8 md:p-12 lg:px-16 lg:py-24">
    <div class="mx-auto max-w-lg text-center">
      <h2 class="text-2xl font-bold text-gray-900 md:text-3xl dark:text-white">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit
      </h2>

      <p class="hidden text-gray-500 sm:mt-4 sm:block dark:text-gray-400">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae dolor officia blanditiis
        repellat in, vero, aperiam porro ipsum laboriosam consequuntur exercitationem incidunt
        tempora nisi?
      </p>
    </div>

    <div class="mx-auto mt-8 max-w-xl">
      <form action="#" class="sm:flex sm:gap-4">
        <div class="sm:flex-1">
          <label for="email" class="sr-only">Email</label>

          <input
            type="email"
            placeholder="Email address"
            class="w-full rounded-md border-gray-200 bg-white p-3 shadow-xs transition focus:border-white focus:ring-3 focus:ring-yellow-400 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white"
          />
        </div>

        <button
          type="submit"
          class="group mt-4 flex w-full items-center justify-center gap-2 rounded-md bg-rose-600 px-5 py-3 text-white transition focus:ring-3 focus:ring-yellow-400 focus:outline-hidden sm:mt-0 sm:w-auto"
        >
          <span class="text-sm font-medium"> Sign Up </span>

          <svg
            class="size-5 shadow-sm rtl:rotate-180"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 8l4 4m0 0l-4 4m4-4H3"
            />
          </svg>
        </button>
      </form>
    </div>
  </div>
</section>

<!-- CTAs -->

<!-- QNA -->
 <div class="bg-gray-50 dark:bg-gray-900 flex justify-center items-center flex-col px-24 py-10 ">
    <h4 class="text-white mb-12 text-3xl font-bold" >Qna </h4>
    <div class="space-y-4">
        <details
            class="group border-s-4 border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 [&_summary::-webkit-details-marker]:hidden"
            open
        >
            <summary class="flex items-center justify-between gap-1.5 text-gray-900 dark:text-white">
            <h2 class="text-lg font-medium">Lorem ipsum dolor sit amet consectetur adipisicing?</h2>

            <svg
                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
            </summary>

            <p class="pt-4 text-gray-900 dark:text-white">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
            recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
            consequuntur distinctio corporis earum similique!
            </p>
        </details>

        <details
            class="group border-s-4 border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 [&_summary::-webkit-details-marker]:hidden"
        >
            <summary class="flex items-center justify-between gap-1.5 text-gray-900 dark:text-white">
            <h2 class="text-lg font-medium">Lorem ipsum dolor sit amet consectetur adipisicing?</h2>

            <svg
                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
            </summary>

            <p class="pt-4 text-gray-900 dark:text-white">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
            recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
            consequuntur distinctio corporis earum similique!
            </p>
        </details>

        <details
            class="group border-s-4 border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 [&_summary::-webkit-details-marker]:hidden"
        >
            <summary class="flex items-center justify-between gap-1.5 text-gray-900 dark:text-white">
            <h2 class="text-lg font-medium">Lorem ipsum dolor sit amet consectetur adipisicing?</h2>

            <svg
                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
            </summary>

            <p class="pt-4 text-gray-900 dark:text-white">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
            recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
            consequuntur distinctio corporis earum similique!
            </p>
        </details>
    </div>
 </div>
 
<!-- QNA -->

<!-- Footers -->
<?= view('components/_footers') ?> 



<!-- SCRIPTS -->

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
