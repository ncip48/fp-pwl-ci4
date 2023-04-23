<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Category as ModelsCategory;

class Category extends BaseController
{
    public function index()
    {
        $categories = new ModelsCategory();
        $categories = $categories->findAll();

        $data = [
            'categories' => $categories,
        ];
        return $this->getResponse("Berhasil mendapatkan category", $data, 200, null);
    }
}
