<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BidModel;

class Product extends BaseController
{
    protected $productModel;
    protected $bidModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->bidModel = new BidModel();
    }
    public function index()
    {
        $data = [
            "title" => "Daftar Product",
            "product" => $this->productModel->getProduct(),
        ];
        return view("product/index", $data);
    }
    public function detail($slug)
    {
        $product = $this->productModel->getProduct($slug);
        $productName = $product['judul'];
        // dd($productName);
        $data = [
            "title" => "Detail Product",
            "product" => $this->productModel->getproduct($slug),
            "bid" => $this->bidModel->getBidByProductName($productName)
        ];
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul product " . $slug . " Tidak Ditemukan");
        }
        return view('product/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            "title" => "Add Product",
            "validation" => \Config\Services::validation(),
        ];
        return view('product/create', $data);
    }
    public function save()
    {
        // Validation Input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[product.judul]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/product/create')->withInput()->with('validation', $validation);
            return redirect()->to('product/create')->withInput();
        }
        // Ambil Gambar
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // Generate Nama Sampul Random
            $namaSampul = $fileSampul->getRandomName();
            // Pindah Gambar ke folder img
            $fileSampul->move('img', $namaSampul);
        }
        // Ambil Nama File
        // $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->productModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
            'address' => $this->request->getVar('address'),
            'created_by' => $this->request->getVar('created_by'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/pages/profile');
    }
    public function delete($id)
    {
        // Cari Gambar berdasarkan ID
        $product = $this->productModel->find($id);
        // Cek Jika file gambar default
        if ($product['sampul'] != 'default.jpg') {
            // Hapus Gambar
            unlink('img/' . $product['sampul']);
            $this->productModel->delete($id);
        } else {
            $this->productModel->delete($id);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/pages/profile');
    }
    public function edit($slug)
    {
        session();
        $data = [
            "title" => "Edit Product",
            "validation" => \Config\Services::validation(),
            'product' => $this->productModel->getproduct($slug),
        ];
        return view('product/edit', $data);
    }
    public function update($id)
    {
        // Cek Judul
        $productLama = $this->productModel->getproduct($this->request->getVar('slug'));
        if ($productLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} product harus diisi',
                    'is_unique' => '{field} product sudah terdaftar'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            return redirect()->to('/product/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        $defaultSampul = $this->request->getVar('sampulLama');
        // Cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // Hapus file lama
            if ($defaultSampul != 'default.jpg') {
                unlink('img/' . $this->request->getVar('sampulLama'));
            } else {
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->productModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
            'address' => $this->request->getVar('address'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/pages/profile');
    }
}
