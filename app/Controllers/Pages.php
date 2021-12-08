<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Home | CodeIgniter"
        ];
        return view("pages/home", $data);
    }
    public function about()
    {
        $data = [
            "title" => "About | CodeIgniter"
        ];
        return view("pages/about", $data);
    }
    public function contact()
    {
        $data = [
            "title" => "Contact Us | CodeIgniter",
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
}
