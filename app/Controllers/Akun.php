<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Akun extends BaseController
{
    public function index()
    {
        //
        $data = [
            'title' => 'Profil',
        ];
        return view('akun', $data);
    }
}
