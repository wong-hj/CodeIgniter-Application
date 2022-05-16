<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTask extends Migration
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
            'description' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('task');
    }

    public function down()
    {
        //undo actions made when command run in CMD
        //command: php spark migrate:rollback (rollback most recent changes on database).
        $this ->forge->dropTable('task');
    }
}
