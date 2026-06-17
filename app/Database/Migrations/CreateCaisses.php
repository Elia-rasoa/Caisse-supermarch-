<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCaisse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'libelle' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('caisses');
    }

    public function down()
    {
        $this->forge->dropTable('caisses', true);
    }
}
