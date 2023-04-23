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
        ];
        return view('auth', $data);
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url('auth'));
    }
}
