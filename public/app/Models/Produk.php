<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'harga',
        'deskripsi',
        'gambar',
        'slide1',
        'slide2',
        'slide3',
        'is_laris',
    ];

    /**
     * Get the kategori that owns the Produk
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
