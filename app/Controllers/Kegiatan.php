<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kegiatan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kegiatanku',
        ];
        return view('kegiatanku', $data);
    }
}
