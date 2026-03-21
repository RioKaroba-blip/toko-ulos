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
        'gambar',
        'slide1',
        'slide2',
        'slide3',
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