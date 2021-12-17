<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "product";

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function getProductByIdUser()
    {
        $builder = $this->db->table('product');
        $query = $builder->getWhere(['created_by' => 'admin']);
        return $query;
    }
    public function search($search)
    {
        // $builder = $this->table('product');
        // $builder->like('judul', $search);
        // return $builder;
        return $this->table('product')->like('judul', $search);
    }
}
