<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ProductModel;

class OrderController extends BaseController
{

    protected $orderModel;
    protected $orderItemModel;
    protected $productModel;

    public function __construct(){
        $this->orderModel = new OrderModel() ;
        $this->orderItemModel = new OrderItemModel() ;
        $this->productModel = new ProductModel() ;
    }

    // Keranjang (simulasi disimpan di session)
    public function cart()
    {
        $cart = session()->get('cart') ?? [];

        $products = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = $this->productModel->find($productId);
                if ($product) {
                    $product['quantity'] = $quantity;
                    $product['subtotal'] = $product['price'] * $quantity;
                    $products[] = $product;
                    $total += $product['subtotal'];
                }
            }


        return view('carts/index', ['products' => $products, 'total' => $total]);
    }

    // Tambah produk ke keranjang
    public function addToCart($productId)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]++;
        } else {
            $cart[$productId] = 1;
        }

        session()->set('cart', $cart);
        return redirect()->to('/cart');
    }

    // Checkout langsung success
    public function checkout_process()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Cart is empty.');
        }

        $total = 0;
        $orderItems = [];

        foreach ($cart as $productId => $quantity) {
            $product = $this->productModel->find($productId);
            if (!$product) continue;

            $subtotal = $product['price'] * $quantity;
            $total += $subtotal;

            $orderItems[] = [
                'product_id' => $productId,
                'quantity'   => $quantity,
                'price'      => $product['price'],
            ];
        }

        $orderId = $this->orderModel->insert([
            'user_id'     => 1, // ganti dengan user login ID
            'total_price' => $total,
            'status'      => 'success',
        ]);

        foreach ($orderItems as &$item) {
            $item['order_id'] = $orderId;
        }

        $this->orderItemModel->insertBatch($orderItems);

        session()->remove('cart');
        return redirect()->to('/cart/success');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->set('cart', $cart);
        }

        return redirect()->to('/cart')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function updateCart($productId)
    {
        $quantity = (int) $this->request->getPost('quantity');

        if ($quantity < 1) {
            return redirect()->to('/cart')->with('error', 'Quantity tidak boleh kurang dari 1.');
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId] = $quantity;
            session()->set('cart', $cart);
        }

        return redirect()->to('/cart')->with('success', 'Quantity berhasil diperbarui.');
    }




    public function success()
    {
        return view('carts/success');
    }
}
