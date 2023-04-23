<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahDeskripsiDiCategories extends Migration
{
    public function up()
    {
        $fields = [
            'description' => [
                'type' => 'TEXT',
                'after' => 'slug'
            ]
        ];
        $this->forge->addColumn('categories', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('categories', 'slug');
    }
}
