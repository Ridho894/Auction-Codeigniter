<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('pages/admin/index', [
            'title' => 'Dashboard'
        ]);
    }
}
