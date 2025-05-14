<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ProductModel;
use App\Models\CategoriesModel;

class ProductPage extends BaseController
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
        return view('product', $data);
    }
}
