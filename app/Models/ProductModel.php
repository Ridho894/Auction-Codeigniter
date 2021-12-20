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
    public function getProductById($user)
    {
        return $this->where(['created_by' => $user])->findAll();
    }
    public function search($search)
    {
        // $builder = $this->table('product');
        // $builder->like('judul', $search);
        // return $builder;
        return $this->table('product')->like('judul', $search);
    }
}
