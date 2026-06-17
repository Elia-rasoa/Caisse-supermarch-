<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'prix' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
            'qntStock' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('produits');
    }

    public function down()
    {
        $this->forge->dropTable('produits', true);
    }
}
