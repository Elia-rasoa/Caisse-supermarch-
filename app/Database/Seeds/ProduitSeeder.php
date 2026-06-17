<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        $builder = $this->db->table('produits');

        if ($builder->countAllResults() > 0) {
            return;
        }

        $builder->insertBatch([
            [
                'id' => 1,
                'designation' => 'Ordinateur Portable Lenovo',
                'prix' => 2500000,
                'qntStock' => 10,
            ],
            [
                'id' => 2,
                'designation' => 'Souris Sans Fil Logitech',
                'prix' => 80000,
                'qntStock' => 50,
            ],
            [
                'id' => 3,
                'designation' => 'Clavier Mecanique Redragon',
                'prix' => 150000,
                'qntStock' => 25,
            ],
            [
                'id' => 4,
                'designation' => 'Ecran Samsung 24 pouces',
                'prix' => 600000,
                'qntStock' => 15,
            ],
            [
                'id' => 5,
                'designation' => 'Casque Audio JBL',
                'prix' => 120000,
                'qntStock' => 30,
            ],
        ]);
    }
}