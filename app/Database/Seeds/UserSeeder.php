<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $user_object->insertBatch([
            [
                "username" => "rahun",
                "email" => "rahul@mail.com",
                "phone_no" => "67011328979",
                "role" => "admin",
                "password_hash" => password_hash("12345", PASSWORD_DEFAULT)
            ],
            [
                "username" => "pandu",
                "email" => "pandu@mail.com",
                "phone_no" => "6798937428",
                "role" => "parnet",
                "password_hash" => password_hash("12345", PASSWORD_DEFAULT)
            ],
            [
                "username" => "arip",
                "email" => "arip@mail.com",
                "phone_no" => "678030273",
                "role" => "mitra",
                "password_hash" => password_hash("12345", PASSWORD_DEFAULT)
            ],
            [
                "username" => "loli",
                "email" => "loli@mail.com",
                "phone_no" => "678030273",
                "role" => "pengguna",
                "password_hash" => password_hash("12345", PASSWORD_DEFAULT)
            ],
        ]);
    }
}
