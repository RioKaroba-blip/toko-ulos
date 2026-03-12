<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Ulos'],
            ['nama_kategori' => 'Songket'],
            ['nama_kategori' => 'Sortali'],
            ['nama_kategori' => 'Batik'],
            ['nama_kategori' => 'Tenun'],
        ];

        DB::table('kategori')->insert($kategori);
    }
}
