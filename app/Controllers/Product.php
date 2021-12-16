<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
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
        $data = [
            "title" => "Detail Product",
            "product" => $this->productModel->getProduct($slug),
        ];
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul Product " . $slug . " Tidak Ditemukan");
        }
        return view('product/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            "title" => "Form Tambah Data Product",
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
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/product/create')->withInput();
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
            'created_by' => $this->request->getVar('created_by'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/product');
    }
    public function delete($id)
    {
        // Cari Gambar berdasarkan ID
        $product = $this->productModel->find($id);
        // Cek Jika file gambar default
        if ($product['sampul'] != 'default.jpg') {
            // Hapus Gambar
            unlink('img/' . $product['sampul']);
        } else {
            $this->productModel->delete($id);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/product');
    }
    public function edit($slug)
    {
        session();
        $data = [
            "title" => "Form Ubah Data Product",
            "validation" => \Config\Services::validation(),
            'product' => $this->productModel->getProduct($slug),
        ];
        return view('product/edit', $data);
    }
    public function update($id)
    {
        // Cek Judul
        $productLama = $this->productModel->getProduct($this->request->getVar('slug'));
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
        // Cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // Hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->productModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/product');
    }
}
