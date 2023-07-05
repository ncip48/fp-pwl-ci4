<?php

namespace App\Controllers\Pengelola;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Program;
use App\Models\User;

class Dashboard extends BaseController
{
    public function index()
    {
        $categories = new Category();
        $jumlah_kategori = $categories->countAllResults();
        $programs = new Program();
        $jumlah_program = $programs->countAllResults();
        $users = new User();
        $jumlah_user = $users->where('role', 1)->countAllResults();
        $session = \Config\Services::session();
        $current_user = $session->get('user');
        return view('pengelola/dashboard', compact('jumlah_kategori', 'jumlah_program', 'jumlah_user', 'current_user'));
    }
}
