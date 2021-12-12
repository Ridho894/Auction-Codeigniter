<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        $data = [
            "title" => "Daftar Komik",
            "komik" => $this->komikModel->getKomik(),
        ];
        return view("komik/index", $data);
    }
    public function detail($slug)
    {
        $data = [
            "title" => "Detail Komik",
            "komik" => $this->komikModel->getKomik($slug),
        ];
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul Komik " . $slug . " Tidak Ditemukan");
        }
        return view('komik/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            "title" => "Form Tambah Data Komik",
            "validation" => \Config\Services::validation(),
        ];
        return view('komik/create', $data);
    }
    public function save()
    {
        // Validation Input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
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
            return redirect()->to('/komik/create')->withInput();
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
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/komik');
    }
    public function delete($id)
    {
        // Cari Gambar berdasarkan ID
        $komik = $this->komikModel->find($id);
        // Cek Jika file gambar default
        if ($komik['sampul'] != 'default.jpg') {
            // Hapus Gambar
            unlink('img/' . $komik['sampul']);
        } else {
            $this->komikModel->delete($id);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/komik');
    }
    public function edit($slug)
    {
        session();
        $data = [
            "title" => "Form Ubah Data Komik",
            "validation" => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug),
        ];
        return view('komik/edit', $data);
    }
    public function update($id)
    {
        // Cek Judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
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
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
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
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/komik');
    }
}
