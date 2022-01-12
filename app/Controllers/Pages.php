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
        $product = $this->productModel->getProduct($slug);
        $bid_calc = $this->request->getVar('bid');
        if ($bid_calc >= $product['price']) {
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
    public function remove($id)
    {
        $this->bidModel->delete($id);
        session()->setFlashdata('pesan', 'Penawaran Berhasil Dihapus.');
        return redirect()->to('/');
    }
    public function give($product)
    {
        $BidName = $this->request->getVar("BidName");
        $Given_Status = "GIVEN...";
        $Reject_Status = "REJECT...";
        $this->bidModel->set('status', $Given_Status)->where('username', $BidName);
        $this->bidModel->update();
        $this->bidModel->set('status', $Reject_Status)->where('username !=', $BidName);
        $this->bidModel->update();
        $this->productModel->where('judul', $product);
        $this->productModel->delete();
        session()->setFlashdata('pesan', 'Produk Berhasil Dilelang Kepada ' . $BidName);
        return redirect()->to('/');
    }
    public function profile()
    {
        $user = user()->username;
        $data = [
            "title" => "Profile",
            "product" => $this->productModel->getProductByUser($user),
            "bid" => $this->bidModel->getBidByUsername($user),
        ];
        return view('pages/profile', $data);
    }
    public function edit($username)
    {
        session();
        if ($username != user()->username) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("NO ACCESS!");
        };
        $data = [
            "title" => "Edit Profile",
            "validation" => \Config\Services::validation(),
            "user" => $this->profileModel->getUser($username),
        ];
        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Nama Profile " . $username . " Tidak Ditemukan");
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
                'rules' => 'required|max_length[8]',
                'errors' => [
                    'required' => '{field} profile harus diisi',
                    'max_length[8]' => '{field} profile terlalu banyak'
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
        $product = $this->productModel->getProductByUser(user()->username);
        $account = $this->request->getVar('username');
        $this->productModel->set('created_by', $account)->where('created_by', user()->username);
        $this->productModel->update();

        $this->profileModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'phone_number' => $account,
            'address' => $this->request->getVar('address'),
        ]);

        session()->setFlashdata('pesan', 'Profile Berhasil Diubah.');

        return redirect()->to('/pages/profile');
    }
}
