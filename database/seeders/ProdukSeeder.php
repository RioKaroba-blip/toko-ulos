<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Isi Kategori
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Ulos', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Songket', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'SorTali', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Isi Produk
        DB::table('produk')->insert([
            ['nama_produk' => 'Ulos Ragihotang', 'kategori_id' => 1, 'harga' => 500000, 'deskripsi' => 'Ulos Ragihotang adalah ulos tradisional Batak yang ditenun dengan indah dan bermakna dalam budaya Batak.', 'gambar' => null, 'is_laris' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'Ulos Sibolang', 'kategori_id' => 1, 'harga' => 450000, 'deskripsi' => 'Ulos Sibolang merupakan ulos yang biasa digunakan dalam acara adat Batak.', 'gambar' => null, 'is_laris' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'Ulos Sadum', 'kategori_id' => 1, 'harga' => 600000, 'deskripsi' => 'Ulos Sadum adalah ulos dengan motif yang indah dan warna cerah.', 'gambar' => null, 'is_laris' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'Songket Merah', 'kategori_id' => 2, 'harga' => 750000, 'deskripsi' => 'Songket merah dengan motif emas yang elegan dan mewah.', 'gambar' => null, 'is_laris' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'Songket Emas', 'kategori_id' => 2, 'harga' => 850000, 'deskripsi' => 'Songket emas premium dengan kualitas terbaik.', 'gambar' => null, 'is_laris' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'Songket Hitam', 'kategori_id' => 2, 'harga' => 700000, 'deskripsi' => 'Songket hitam elegan untuk acara formal.', 'gambar' => null, 'is_laris' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'SorTali Tradisional', 'kategori_id' => 3, 'harga' => 300000, 'deskripsi' => 'SorTali tradisional Batak dengan motif khas.', 'gambar' => null, 'is_laris' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'SorTali Premium', 'kategori_id' => 3, 'harga' => 400000, 'deskripsi' => 'SorTali premium dengan kualitas terbaik.', 'gambar' => null, 'is_laris' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['nama_produk' => 'SorTali Motif Batak', 'kategori_id' => 3, 'harga' => 350000, 'deskripsi' => 'SorTali dengan motif Batak yang khas dan indah.', 'gambar' => null, 'is_laris' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}