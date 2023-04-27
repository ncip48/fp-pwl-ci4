<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahLocationDiPrograms extends Migration
{
    public function up()
    {
        $this->forge->addColumn('programs', [
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'organizer',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('programs', 'location');
    }
}
