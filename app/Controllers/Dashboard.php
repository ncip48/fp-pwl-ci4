<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $s = $session->get('user');

        dd($s);
    }
}
