<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahKolomDiCategories extends Migration
{
    public function up()
    {
        $fields = [
            'slug' => [
                'type' => 'varchar',
                'constraint' => 100,
                'after' => 'image'
            ]
        ];
        $this->forge->addColumn('categories', $fields);
    }

    public function down()
    {
        //remove the column existing
        $this->forge->dropColumn('categories', 'slug');
    }
}
