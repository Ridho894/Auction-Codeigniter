<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = "users";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'email', 'password_hash', 'phone_number', 'username', 'address', 'active', 'created_at', 'is_admin'];

    public function getUser()
    {
        return $this->where(['is_admin' => 0])->findAll();
    }
}
