<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        
        //add tables and fields when command run in CMD
        //command: php spark migrate
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'password_hash' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => null
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => null
            ]
        ]);

        $this->forge->addPrimaryKey('id')
                    ->addUniqueKey('email');

        $this->forge->createTable('user');
    }

    public function down()
    {
        //undo actions made when command run in CMD
        //command: php spark migrate:rollback (rollback most recent changes on database).
        $this ->forge->dropTable('user');
    }
}
