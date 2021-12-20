<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ReviewModel;

class Pages extends BaseController
{
    protected $productModel;
    protected $reviewModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->reviewModel = new ReviewModel();
    }

    public function index()
    {
        $search = $this->request->getVar('search');
        if ($search) {
            $product = $this->productModel->search($search);
        } else {
            $product = $this->productModel;
        }
        // dd($search);
        $data = [
            "title" => "Home",
            "product" => $product->paginate(3, 'product'),
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
            "review" => $this->reviewModel->getReview(),
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
        $db = \Config\Database::connect();
        $user = user()->username;
        $query = $db->query("SELECT * FROM product WHERE created_by = '$user'");
        // foreach ($query->getResult() as $row) {
        //     echo $row->judul;
        // }
        $data = [
            "title" => "Profile",
            "product" => $this->productModel->getProduct(),
        ];
        return view('pages/profile', $data);
    }
}
