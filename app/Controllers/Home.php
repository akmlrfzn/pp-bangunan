<?php

namespace App\Controllers;
use CodeIgniter\Shield\Authentication\Authentication;

use App\Models\ProductModel;

class Home extends BaseController
{
   public function index(): string
    {
        $productModel = new ProductModel(); // buat objek model
        $data['products'] = $productModel->findAll(); // ambil semua data
        return view('welcome_message', $data);
    }
}
