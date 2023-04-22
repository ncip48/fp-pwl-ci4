<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{

    public function index()
    {
        $signature_random = Signature::generateSignature();
        $data = [
            'title' => 'Login',
            'signature_random' => $signature_random,
        ];
        return view('auth', $data);
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            //get validationRules from model
            $validation =  \Config\Services::validation();
            $session = \Config\Services::session();
            $rules = [

                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email harus diisi',
                        'valid_email' => 'Email tidak valid',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi',
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                return $this->getResponse("Error validasi", null, 403, $validation->getErrors());
            }
            $user = new User();
            $user = $user->where('email', $this->request->getPost('email'))->first();
            if ($user) {
                if (password_verify($this->request->getPost('password'), $user['password'])) {
                    $session_data = [
                        'id' => $user['id'],
                        'nik' => $user['nik'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'logged_in' => TRUE,
                    ];
                    $session->set($session_data);
                    //cek role
                    if ($user['role'] == 1) {
                        return redirect()->to(base_url('mahasiswa'));
                    } elseif ($user['role'] == 2) {
                        return redirect()->to(base_url('prodi'));
                    } elseif ($user['role'] == 3) {
                        return redirect()->to(base_url('dekan'));
                    }
                } else {
                    $error = array(
                        'password' => 'Password salah',
                    );
                    return $this->getResponse("Password salah", null, 401, $error);
                }
            } else {
                $error = array(
                    'email' => 'Akun tidak ditemukan',
                );
                return $this->getResponse("Akun tidak ditemukan", null, 404, $error);
            }
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url('auth'));
    }
}
