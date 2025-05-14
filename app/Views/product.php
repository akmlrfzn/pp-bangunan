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
