<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaisseSeeder extends Seeder
{
    public function run(): void
    {
        $builder = $this->db->table('caisses');

        if ($builder->countAllResults() > 0) {
            return;
        }

        $builder->insertBatch([
            [
                'id' => 1,
                'libelle' => 'Caisse 1',
            ],
            [
                'id' => 2,
                'libelle' => 'Caisse 2',
            ],
        ]);
    }
}