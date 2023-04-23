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
                'image' => 'beasiswa.jpg',
                'slug' => 'beasiswa',
                'description' => 'Beasiswa adalah suatu bentuk bantuan yang diberikan kepada mahasiswa yang memenuhi syarat tertentu. Beasiswa dapat berupa uang, tunjangan, maupun fasilitas lainnya. Beasiswa dapat diberikan oleh pemerintah, lembaga swasta, maupun lembaga internasional.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Magang Reguler',
                'image' => 'magang.jpg',
                'slug' => 'magang-reguler',
                'description' => 'Magang reguler adalah kegiatan belajar mengajar yang dilakukan oleh mahasiswa di suatu instansi atau perusahaan selama 1 semester atau lebih. Magang reguler dilakukan oleh mahasiswa untuk memenuhi salah satu persyaratan dalam menyelesaikan studi.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pertukaran Pelajar',
                'image' => 'pertukaran.jpg',
                'slug' => 'pertukaran-pelajar',
                'description' => 'Pertukaran pelajar adalah kegiatan belajar mengajar yang dilakukan oleh mahasiswa di suatu instansi atau perusahaan. Pertukaran pelajar dilakukan oleh mahasiswa untuk memenuhi salah satu persyaratan dalam menyelesaikan studi.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('categories')->insertBatch($data);
    }
}
