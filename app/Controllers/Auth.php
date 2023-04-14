<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
}
