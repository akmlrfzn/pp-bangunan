<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'description', 'price', 'stock', 'image','category_id', 
    ];
    protected $useTimestamps = true;
}
