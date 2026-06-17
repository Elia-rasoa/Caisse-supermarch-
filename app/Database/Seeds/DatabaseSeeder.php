<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Database\Seeds\CaisseSeeder;
use App\Database\Seeds\ProduitSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            CaisseSeeder::class,
            ProduitSeeder::class,
        ] as $seeder) {
            $this->call($seeder);
        }
    }
}