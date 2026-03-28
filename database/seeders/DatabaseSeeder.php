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
            'owner_photo' => 'karo.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Pastikan owner_photo terisi jika user sudah ada
        DB::table('users')->where('email', 'admin@elizabethulos.com')->update([
            'owner_photo' => 'karo.jpeg',
        ]);

        $this->call([
            ProdukSeeder::class,
            UlasanSeeder::class,
        ]);
    }
}
