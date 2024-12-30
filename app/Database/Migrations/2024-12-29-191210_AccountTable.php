<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AccountTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_account' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'null'       => false,
            ],
            'id_role' => [
                'type'       => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '0',
                'null'       => false,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_account', true);
        $this->forge->addKey('id_user');
        $this->forge->addKey('id_role');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE'); 
        $this->forge->addForeignKey('id_role', 'role', 'id_role', 'CASCADE', 'CASCADE'); 
        $this->forge->createTable('account');
    }

    public function down()
    {
        $this->forge->dropTable('account');
    }
}
