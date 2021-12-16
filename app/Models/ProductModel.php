<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "product";
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'price', 'description', 'sampul', 'address', 'created_by'];

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function getProductById()
    {
        // return $this->where
    }
}
