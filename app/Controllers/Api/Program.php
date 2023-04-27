<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Program as ModelsProgram;

class Program extends BaseController
{
    public function index()
    {
        $query = $this->request->getPost('query') ?? '';
        $location = $this->request->getPost('location') ?? '';
        $slug_category = $this->request->getPost('category') ?? '';
        $category = new Category();
        $category = $category->where('slug', $slug_category)->first();
        if ($category) {
            $category_id = $category['id'];
        } else {
            $category_id = '';
        }

        $program = new ModelsProgram();
        $programs = $program->select('programs.*')
            ->select('categories.name as category_name')
            ->join('categories', 'categories.id = programs.category_id')
            ->like('programs.name', $query)
            ->like('categories.id', $category_id)
            ->like('programs.location', $location)
            ->orderBy('programs.created_at', 'DESC')
            ->findAll();
        $data = [
            'programs' => $programs,
        ];
        return $this->getResponse('Sukses mendapatkan data programs', $data);
    }

    public function detail($id)
    {
        $program = new ModelsProgram();
        $program = $program->select('programs.*')
            ->select('categories.name as category_name')
            ->join('categories', 'categories.id = programs.category_id')
            ->where('programs.id', $id)
            ->first();
        $data = [
            'program' => $program,
        ];
        return $this->getResponse('Sukses mendapatkan data program', $data);
    }
}
