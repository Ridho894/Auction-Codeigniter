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
            "title" => "Home | Auction",
            "product" => $this->productModel->paginate(1, 'product'),
            "pager" => $this->productModel->pager,
        ];
        return view("pages/home", $data);
    }
    public function about()
    {
        $data = [
            "title" => "About | Auction"
        ];
        return view("pages/about", $data);
    }
    public function contact()
    {
        $data = [
            "title" => "Contact Us | Auction",
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
        return view("pages/contact", $data);
    }
    public function detailProduct($slug)
    {
        $data = [
            "title" => "Details | Auction",
            "product" => $this->productModel->getProduct($slug),
        ];
        return view('pages/detail_product', $data);
    }
}
