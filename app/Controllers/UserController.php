<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password_hash' => 'required|max_length[255]|validateUser[email,password_hash]',
            ];

            $errors = [
                'password_hash' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if ($user['role'] == "admin") {

                    return redirect()->to(base_url('Admin/admin'));
                } elseif ($user['role'] == "parnet") {

                    return redirect()->to(base_url('Parnet/parnet'));
                } elseif ($user['role'] == "mitra") {

                    return redirect()->to(base_url('Mitra/mitra'));
                } elseif ($user['role'] == "pengguna") {

                    return redirect()->to(base_url('Pengguna/pengguna'));
                }
            }
        }
        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
