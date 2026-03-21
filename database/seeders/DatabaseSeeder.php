<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        DB::table('users')->insertOrIgnore([
            'name' => 'Admin Elizabeth',
            'email' => 'admin@elizabethulos.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            ProdukSeeder::class,
        ]);
    }
}