<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

class Program extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Program',
        ];
        return view('program', $data);
    }

    public function detail($slug)
    {
        $category = new Category();
        $category = $category->where('slug', $slug)->first();
        $data = [
            'title' => $category['name'],
            'category' => $category['name'],
            'slug' => $slug,
        ];
        return view('program', $data);
    }
}
