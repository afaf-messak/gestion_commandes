<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClientsTableSeeder;
use Database\Seeders\ProduitsTableSeeder;
use Database\Seeders\CommandesTableSeeder;
use Database\Seeders\DetailsCommandesTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProduitsTableSeeder::class);
        $this->call(CommandesTableSeeder::class);
        $this->call(DetailsCommandesTableSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
