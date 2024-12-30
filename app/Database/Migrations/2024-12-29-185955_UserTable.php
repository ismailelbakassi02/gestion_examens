<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '0',
                'null'       => false,
            ],
            'date_birth' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
<<<<<<< HEAD
=======
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '0',
                'null'       => false,
            ],
>>>>>>> views
            'adresse' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '0',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
