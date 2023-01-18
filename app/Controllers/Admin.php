<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ClientModel;

class Admin extends BaseController
{
    protected $productModel;
    protected $clientModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->clientModel = new ClientModel();
    }
    public function index()
    {

        return view('pages/admin/index', [
            'title' => 'Dashboard',
        ]);
    }
    public function product()
    {
        $product = $this->productModel;
        return view('pages/admin/product', [
            'title' => 'Product',
            "product" => $product->paginate(6, 'product'),
        ]);
    }
    public function user()
    {
        $user = $this->clientModel;
        return view('pages/admin/user', [
            'title' => 'User',
            'user' => $user->getUser()
        ]);
    }

    public function create()
    {
        return view('pages/admin/user/create', [
            'title' => 'User',
        ]);
    }

    public function deleteUser($id)
    {
        $this->clientModel->delete($id);
        return redirect()->to('/admin/user');
    }

    public function createUser()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $address = $this->request->getVar('address');
        $phone_number = $this->request->getVar('phone_number');
        $status = $this->request->getVar('active');

        $this->clientModel->save([
            'username' => $username,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'address' => $address,
            'phone_number' => (int)$phone_number,
            'active' => $status,
        ]);
        return redirect()->to('/admin/user');
    }
}
