<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoriesModel;

class CategoryController extends BaseController
{
    protected $category;

   public function __construct()
    {
        $this->category = new CategoriesModel();
    }

    public function index()
    {
        $data['categories'] = $this->category->findAll();
        return view('dashboard/categories/index', $data);
    }

    public function create()
    {
        return view('dashboard/categories/create');
    }

    public function store()
    {
        $this->category->insert([
            'name' => $this->request->getPost('name'),
        ]);
        return redirect()->to('/categories');
    }

    public function edit($id)
    {
        $data['category'] = $this->category->find($id);
        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $this->category->update($id, [
            'name' => $this->request->getPost('name'),
        ]);
        return redirect()->to('/categories');
    }

    public function delete($id)
    {
        $this->category->delete($id);
        return redirect()->to('/categories');
    }
}
