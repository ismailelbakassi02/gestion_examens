<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_role' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '0',
                'null'       => false,
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_role', true);
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}
