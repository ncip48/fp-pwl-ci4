<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
    public function login()
    {
        try {
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
                        'rules' => 'required|min_length[8]',
                        'errors' => [
                            'required' => 'Password harus diisi',
                            'min_length' => 'Password minimal {param} karakter'
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
                        $session_user = [
                            'id' => $user['id'],
                            'nik' => $user['nik'],
                            'name' => $user['name'],
                            'email' => $user['email'],
                            'role' => $user['role'],
                        ];
                        $session->set('user', $session_user);
                        $session->set('logged_in', TRUE);
                        //cek role
                        if ($user['role'] == 1) {
                            $data = [
                                'redirect' => 'mahasiswa',
                                'user' => $user,
                            ];
                            return $this->getResponse("Berhasil login", $data, 200, null);
                        } else {
                            $data = [
                                'redirect' => 'pengelola',
                                'user' => $user,
                            ];
                            return $this->getResponse("Berhasil login", $data, 200, null);
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
        } catch (\Throwable $th) {
            //throw $th;
            $error = $th->getMessage();
            if (strpos($error, 'Unable to connect to the database.') !== false) {
                $error = 'Unable to connect to the database.';
            } else {
                $error = 'Error server';
            }
            return $this->getResponse("Error server", null, 500, $error);
        }
    }
}
