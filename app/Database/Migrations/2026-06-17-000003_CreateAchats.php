<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'produit' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'prix unitaire' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
            'qnt' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
            'montant' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('achats');
    }

    public function down()
    {
        $this->forge->dropTable('achats', true);
    }
}
