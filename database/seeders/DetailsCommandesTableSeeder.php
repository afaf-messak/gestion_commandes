<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailCommande;

class DetailsCommandesTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                DetailCommande::create([
                        'commande_id' => 1,
                        'produit_id' => 1,
                        'quantite' => 1,
                        'prix_unitaire' => 1200.00,
                        'total' => 1200.00
                ]);

                DetailCommande::create([
                        'commande_id' => 1,
                        'produit_id' => 2,
                        'quantite' => 1,
                        'prix_unitaire' => 800.00,
                        'total' => 800.00
                ]);

                DetailCommande::create([
                        'commande_id' => 2,
                        'produit_id' => 3,
                        'quantite' => 1,
                        'prix_unitaire' => 400.00,
                        'total' => 400.00
                ]);

                DetailCommande::create([
                        'commande_id' => 2,
                        'produit_id' => 4,
                        'quantite' => 3,
                        'prix_unitaire' => 150.00,
                        'total' => 450.00
                ]);

                DetailCommande::create([
                        'commande_id' => 3,
                        'produit_id' => 2,
                        'quantite' => 1,
                        'prix_unitaire' => 800.00,
                        'total' => 800.00
                ]);

                DetailCommande::create([
                        'commande_id' => 3,
                        'produit_id' => 3,
                        'quantite' => 1,
                        'prix_unitaire' => 400.00,
                        'total' => 400.00
                ]);
        }
}

