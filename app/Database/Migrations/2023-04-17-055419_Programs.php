<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Programs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'organizer' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'slot' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'qualification' => [
                'type' => 'TEXT'
            ],
            'start_program' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'end_program' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('programs');
    }

    public function down()
    {
        $this->forge->dropTable('programs');
    }
}
