<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ReviewModel;
use App\Models\ProfileModel;
use App\Models\BidModel;

class Pages extends BaseController
{
    protected $productModel;
    protected $reviewModel;
    protected $profileModel;
    protected $bidModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->reviewModel = new ReviewModel();
        $this->profileModel = new ProfileModel();
        $this->bidModel = new BidModel();
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
            "title" => "Home",
            "product" => $product->paginate(6, 'product'),
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
        session();
        $harga = $this->productModel->getProduct($slug);
        $bid = $this->request->getVar('bid');
        if ($bid >= $harga['price']) {
            return view('welcome_message');
        }
        $data = [
            "title" => "Details",
            "product" => $this->productModel->getProduct($slug),
            "validation" => \Config\Services::validation(),
        ];
        return view('pages/detail_product', $data);
    }
    public function bidProduct($slug)
    {
        session();
        $db = db_connect();
        $product = $this->productModel->getProduct($slug);
        $bid = $this->request->getVar('bid');
        if ($product['created_by'] === user()->username) {
            session()->setFlashdata('pesan', "Anda tidak dapat menawar barang anda");
            return redirect()->to('/pages/detail_product/' . $product['slug']);
        }
        if ($bid >= $product['price']) {
            $sql = "INSERT INTO bid (username, bid, product) VALUES (" . $db->escape(user()->username) . "," . $db->escape($this->request->getVar('bid')) . ", " . $db->escape($product['judul']) . ")";
            $db->query($sql);
            session()->setFlashdata('pesan', "Berhasil Menawar Product " . $product['judul']);
            return redirect()->to('/');
        } else if ($bid < $product['price']) {
            session()->setFlashdata('pesan', "Penawaran anda terlalu rendah");
            return redirect()->to('/pages/detail_product/' . $product['slug']);
        }
    }
    public function bid()
    {
        $this->bidModel->save([
            'username' => $this->request->getVar('username'),
            'bid' => $this->request->getVar('bid'),
            'product' => $this->request->getVar('judul'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/pages/profile');
    }
    public function profile()
    {
        $user = user()->username;
        $data = [
            "title" => "Profile",
            "product" => $this->productModel->getProductByUser($user),
        ];
        return view('pages/profile', $data);
    }
    public function edit($id)
    {
        session();
        $data = [
            "title" => "Edit Profile",
            "validation" => \Config\Services::validation(),
            "user" => $this->profileModel->getUser($id),
        ];
        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Nama Profile " . $id . " Tidak Ditemukan");
        }
        return view("pages/edit", $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'username' => [
                'rules' => "required",
                'errors' => [
                    'required' => '{field} profile harus diisi',
                ]
            ],
            'phone_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} profile harus diisi',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} profile harus diisi',
                ]
            ]
        ])) {
            return redirect()->to('/pages/edit/' . $this->request->getVar('id'))->withInput();
        }
        $this->profileModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/pages/profile');
    }
}
