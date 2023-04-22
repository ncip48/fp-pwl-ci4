<?php

namespace App\Database\Seeds;

use App\Models\Category;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Beasiswa',
                'image' => 'beasiswa.png',
            ],
            [
                'name' => 'Magang Reguler',
                'image' => 'magang.png',
            ],
            [
                'name' => 'Pertukaran Pelajar',
                'image' => 'pertukaran.png',
            ],
        ];

        // Using Query Builder
        $this->db->table('categories')->insertBatch($data);
    }
}
