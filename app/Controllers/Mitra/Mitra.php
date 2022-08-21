<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class Mitra extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "mitra") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("mitra/index");
    }
}
