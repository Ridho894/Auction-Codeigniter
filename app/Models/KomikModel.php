<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table = "komik";
    protected $useTimestamps = true;
<<<<<<< HEAD:app/Models/ProductModel.php
    protected $allowedFields = ['judul', 'slug', 'price', 'description', 'sampul'];
=======
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
>>>>>>> parent of c2983ff (migrasi ke final project yaitu lelang):app/Models/KomikModel.php

    public function getKomik($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
<<<<<<< HEAD
    public function getProductByIdUser()
    {
        $builder = $this->db->table('product');
        $query = $builder->getWhere(['created_by' => 'admin']);
        return $query;
    }
<<<<<<< HEAD:app/Models/KomikModel.php
    public function search($search)
    {
        // $builder = $this->table('product');
        // $builder->like('judul', $search);
        // return $builder;
        return $this->table('product')->like('judul', $search);
    }
=======
>>>>>>> parent of 58a0f7f (user-profile dll)
=======
>>>>>>> parent of b7cf154 (search product):app/Models/ProductModel.php
}
