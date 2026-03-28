<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UlasanSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ulasan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('ulasan')->insert([
            [
                'nama_pengirim' => 'Rio Karoba',
                'email'         => 'rio@example.com',
                'isi_ulasan'    => 'saya sangat puas belanja di toko-ulos ELIZABETH ULOS',
                'gambar'        => 'ulasan-1.png',
                'status'        => 'tampil',
                'created_at'    => '2026-03-27 00:00:00',
                'updated_at'    => '2026-03-27 00:00:00',
            ],
        ]);
    }
}
