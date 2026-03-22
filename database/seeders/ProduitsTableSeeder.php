<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitsTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                Produit::create([
                        'nom' => 'Laptop',
                        'description' => 'High performance laptop',
                        'prix' => 1200.00,
                        'quantite' => 10
                ]);

                Produit::create([
                        'nom' => 'Smartphone',
                        'description' => 'Latest smartphone model',
                        'prix' => 800.00,
                        'quantite' => 15
                ]);

                Produit::create([
                        'nom' => 'Tablet',
                        'description' => 'Portable tablet device',
                        'prix' => 400.00,
                        'quantite' => 8
                ]);

                Produit::create([
                        'nom' => 'Headphones',
                        'description' => 'Wireless headphones',
                        'prix' => 150.00,
                        'quantite' => 20
                ]);
        }
}

