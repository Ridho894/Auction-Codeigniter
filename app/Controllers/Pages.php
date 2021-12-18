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
        $data = [
<<<<<<< HEAD
            "title" => "Home",
            "product" => $product->paginate(3, 'product'),
=======
            "title" => "Home | Auction",
            "product" => $this->productModel->paginate(1, 'product'),
>>>>>>> parent of 58a0f7f (user-profile dll)
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
<<<<<<< HEAD
            "title" => "Review",
            "review" => $this->reviewModel->getReview()
=======
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
>>>>>>> parent of 58a0f7f (user-profile dll)
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
<<<<<<< HEAD
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
=======
>>>>>>> parent of 58a0f7f (user-profile dll)
}
