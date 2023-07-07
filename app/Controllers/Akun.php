<?php

namespace App\Controllers;

use App\Models\User;

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

    public function editPass()
    {
        //create function to edit password here

        $data = [
            'title' => 'Ubah Password',
        ];
        return view('editPass', $data);
    }

    public function editFoto()
    {
        //create function to edit foto here

        $data = [
            'title' => 'Ubah Foto',
        ];
        return view('editFoto', $data);
    }
}
