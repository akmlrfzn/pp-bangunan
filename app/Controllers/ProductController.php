<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        return view('dashboard/products/index', $data);
    }

    public function create()
    {
        return view('dashboard/products/create');
    }

    public function store()
    {
        $this->productModel->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);
        return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
        return view('dashboard/products/edit', $data);
    }

    public function update($id)
    {
        $this->productModel->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);
        return redirect()->to('/products')->with('success', 'Produk berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/products')->with('success', 'Produk berhasil dihapus');
    }
}
