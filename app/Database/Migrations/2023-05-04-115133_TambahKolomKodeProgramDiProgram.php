<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahKolomKodeProgramDiProgram extends Migration
{
    public function up()
    {
        $this->forge->addColumn('programs', [
            'kode_program' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'category_id'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('programs', 'kode_program');
    }
}
