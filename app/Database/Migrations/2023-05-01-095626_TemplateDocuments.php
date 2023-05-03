<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TemplateDocuments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_program' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pdf' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'html' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('template_documents');
    }

    public function down()
    {
        $this->forge->dropTable('template_documents');
    }
}
