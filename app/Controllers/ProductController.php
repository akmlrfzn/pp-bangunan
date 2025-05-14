<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoriesModel;

class ProductController extends BaseController
{
    protected $product, $category;

    public function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoriesModel();
    }

    public function index()
    {
        $data['products'] = $this->product
            ->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();
        return view('dashboard/products/index', $data);
        
    }

    public function create()
    {
        $data['categories'] = $this->category->findAll();
        return view('dashboard/products/create', $data);
    }

    public function store()
    {
        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/products', $imageName); // perbaikan path!
        }


        $this->product->save([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'image'       => $imageName,
        ]);

        return redirect()->to('/products');
    }


    public function edit($id)
    {
        $data['product'] = $this->product->find($id);
        $data['categories'] = $this->category->findAll();
        return view('dashboard/products/edit', $data);
    }

    public function update($id)
    {
        $product = $this->product->find($id);
        $image = $this->request->getFile('image');
        $imageName = $product['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Hapus gambar lama (optional)
            if ($imageName && file_exists("uploads/products/$imageName")) {
                unlink("uploads/products/$imageName");
            }

            $imageName = $image->getRandomName();
            $image->move('uploads/products', $imageName);
        }

        $this->product->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'image'       => $imageName,
        ]);

        return redirect()->to('/products');
    }


    public function delete($id)
    {
        $this->product->delete($id);
        return redirect()->to('/products');
    }
}
