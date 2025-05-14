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

<section>
  <div class=" dark:bg-gray-900 max-w-screen-2xl h-screen px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
    <div class="mx-auto max-w-3xl">
      <header class="text-center">
        <h1 class="text-xl text-white font-bold text-gray-900 sm:text-3xl">Keranjang</h1>
      </header>

      <div class="mt-8">
        <ul class="space-y-4">
          <?php foreach ($products as $index => $item): ?>
            <li class="flex items-center gap-4">
              <?php
                $imagePath = !empty($item['image']) ? base_url('uploads/products/' . $item['image']) : 'https://via.placeholder.com/64';
                ?>

                <img
                src="<?= $imagePath ?>"
                alt="<?= esc($item['name']) ?>"
                class="size-16 rounded-sm object-cover"
                />

              <div>
                <h3 class="text-sm text-white text-gray-900"><?= esc($item['name']) ?></h3>

                <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                  <div class="text-white">
                    <dt class="inline">Harga:</dt>
                    <dd class="inline">Rp <?= number_format($item['price'], 0, ',', '.') ?></dd>
                  </div>
                </dl>
              </div>

              <div class="flex flex-1 items-center justify-end gap-2">
                    <!-- Form Edit Quantity -->
                    <form action="<?= base_url('cart/update/' . $item['id']) ?>" method="post" class="flex items-center gap-1">
                        <div class="flex items-center border border-gray-300 rounded-sm">
                            
                            <!-- Tombol Minus -->
                            <button type="button" class="px-2 text-white text-gray-600 hover:text-red-500" onclick="updateQty(this, -1)">−</button>

                            <!-- Input Quantity -->
                            <input
                            type="number"
                            name="quantity"
                            min="1"
                            value="<?= esc($item['quantity']) ?>"
                            class="w-10 h-8 text-center text-white text-sm outline-none [appearance:textfield]"
                            />

                            <!-- Tombol Plus -->
                            <button type="button" class="px-2 text-white hover:text-green-600" onclick="updateQty(this, 1)">+</button>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="text-white rounded-lg hover:text-green-800  text-xs ml-1 py-2 px-4 bg-green-500">
                            Update
                        </button>
                    </form>


                    <!-- Form Hapus Item -->
                    <form action="<?= base_url('cart/remove/' . $item['id']) ?>" method="post">
                        <button type="submit" class="text-white bg-red-500 py-2 px-2 rounded-lg transition hover:text-white hover:text-red-900">
                        <span class="sr-only">Hapus item</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 
                            1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 
                            01-2.244 2.077H8.084a2.25 2.25 0 
                            01-2.244-2.077L4.772 5.79m14.456 
                            0a48.108 48.108 0 00-3.478-.397m-12 
                            .562c.34-.059.68-.114 1.022-.165m0 
                            0a48.11 48.11 0 013.478-.397m7.5 
                            0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 
                            51.964 0 00-3.32 0c-1.18.037-2.09 
                            1.022-2.09 2.201v.916m7.5 0a48.667 
                            48.667 0 00-7.5 0" />
                        </svg>
                        </button>
                    </form>
                    </div>


            </li>
          <?php endforeach; ?>
        </ul>

        <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
          <div class="w-screen max-w-lg space-y-4">
            <dl class="space-y-0.5 text-sm text-gray-700">
              <div class="flex justify-between !text-white font-medium ">
                <dt>Total</dt>
                <dd>Rp <?= number_format($total, 0, ',', '.') ?></dd>
              </div>
            </dl>

            <div class="flex justify-end">
                <form action="<?= base_url('/cart/checkout_process') ?>" method="post">
                    <button
                        type="submit"
                        class="block rounded-sm bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600"
                    >
                        Checkout
                    </button>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footers -->
<?= view('components/_footers') ?> 



<!-- SCRIPTS -->

<script>
  function updateQty(button, step) {
    const input = button.parentElement.querySelector('input[name="quantity"]');
    let value = parseInt(input.value) || 1;
    value = value + step;
    if (value < 1) value = 1;
    input.value = value;
  }
</script>


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
