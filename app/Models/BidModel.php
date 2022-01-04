<?php

namespace App\Models;

use CodeIgniter\Model;

class BidModel extends Model
{
    protected $table = "bid";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'bid', 'product'];

    // public function getBidByUsername($username)
    // {
    //     return $this->where(['username' => $username])->findAll();
    // }
}
