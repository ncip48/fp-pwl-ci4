<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //role 1 = mahasiswa, 2 = kaprodi, 3 = dekan, 4 = admin
        $data = [
            [
                'nik' => '1234567890',
                'name' => 'Herly',
                'email' => 'herly@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nik' => '1234567891',
                'name' => 'Barka Satya',
                'email' => 'barka@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nik' => '1234567892',
                'name' => 'Ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
