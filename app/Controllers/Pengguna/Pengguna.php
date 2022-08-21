<?php

namespace App\Controllers\Pengguna;

use App\Controllers\BaseController;

class Pengguna extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "pengguna") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("pengguna/index");
    }
}
