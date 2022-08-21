<?php

namespace App\Controllers\Parnet;

use App\Controllers\BaseController;

class Parnet extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "parnet") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("parnet/index");
    }
}
