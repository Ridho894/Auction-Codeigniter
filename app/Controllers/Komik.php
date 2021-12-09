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
        // $komik = $this->komikModel->findAll();

        $data = [
            "title" => "Daftar Komik",
            "komik" => $this->komikModel->getKomik(),
        ];

        // Cara connect Database tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // Cara connect Database dengan model
        return view("komik/index", $data);
    }
    public function detail($slug)
    {
        $data = [
            "title" => "Detail Komik",
            "komik" => $this->komikModel->getKomik($slug),
        ];
        return view('komik/detail', $data);
    }
}
