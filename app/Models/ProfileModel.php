<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = "users";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'phone_number', 'address'];

    public function getUserById($id)
    {
        return $this->where(['id' => $id])->findAll();
    }

    public function getUser($username = null)
    {
        if ($username == null) {
            return $this->findAll();
        }
        return $this->where(['username' => $username])->first();
    }
}
