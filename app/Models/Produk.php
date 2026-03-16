<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    
    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'harga',
        'deskripsi',
        'is_laris',
        'gambar_utama',
        'slide_1',
        'slide_2',
        'slide_3',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
}