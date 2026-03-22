<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;

class CommandesTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                Commande::create([
                        'client_id' => 1,
                        'date_commande' => now(),
                        'total' => 2000.00
                ]);

                Commande::create([
                        'client_id' => 2,
                        'date_commande' => now(),
                        'total' => 950.00
                ]);

                Commande::create([
                        'client_id' => 3,
                        'date_commande' => now(),
                        'total' => 550.00
                ]);
        }
}

