<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Client::create([
            'nom' => 'Ali',
            'email' => 'ali@test.com',
            'telephone' => '0600123456',
        ]);

        Client::create([
            'nom' => 'Sara',
            'email' => 'sara@test.com',
            'telephone' => '0600987654',
        ]);
        Client::create([
            'nom' => 'Yassine',
            'email' => 'yassine@test.com',
            'telephone' => '0600111223',
        ]);

    }
}
