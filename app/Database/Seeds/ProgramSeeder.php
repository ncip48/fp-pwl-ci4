<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'category_id' => 1,
            'kode_program' => 'BEA-001',
            'name' => 'Beasiswa PPA',
            'description' => 'Beasiswa PPA adalah beasiswa yang diberikan kepada mahasiswa yang berprestasi dan berkebutuhan khusus',
            'organizer' => 'Universitas Amikom Yogyakarta',
            'location' => 'Yogyakarta',
            'slot' => 100,
            'image' => 'program-1.jpg',
            'qualification' => 'Mahasiswa aktif Universitas Amikom Yogyakarta',
            'start_program' => '2021-01-01',
            'end_program' => '2021-12-31',
        ];

        // Using Query Builder
        $this->db->table('programs')->insert($data);
    }
}
