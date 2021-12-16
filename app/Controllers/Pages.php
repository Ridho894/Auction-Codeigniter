<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Pages extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            "title" => "Home",
            "product" => $this->productModel->paginate(3, 'product'),
            "pager" => $this->productModel->pager,
        ];
        return view("pages/home", $data);
    }
    public function about()
    {
        $data = [
            "title" => "About"
        ];
        return view("pages/about", $data);
    }
    public function review()
    {
        $data = [
            "title" => "Review",
            "Alamat" => [
                [
                    "tipe" => "Rumah",
                    "jalan" => "Gito Gati",
                    "kota" => "Sleman"
                ],
                [
                    "tipe" => "Kantor",
                    "jalan" => "Palagan",
                    "kota" => "Sleman"
                ]
            ]
        ];
        return view("pages/review", $data);
    }
    public function detailProduct($slug)
    {
        $data = [
            "title" => "Details",
            "product" => $this->productModel->getProduct($slug),
            "validation" => \Config\Services::validation(),
        ];
        return view('pages/detail_product', $data);
    }
    public function bidProduct()
    {
        if (!$this->validate([
            'bid' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/')->withInput();
        }
    }
    public function profile()
    {
        $data = [
            "title" => "Profile",
            "product" => $this->productModel->getProduct(),
        ];
        return view('pages/profile', $data);
    }
}
