<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 200);
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->integer('harga');
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 255)->nullable();
            $table->string('slide1', 255)->nullable();
            $table->string('slide2', 255)->nullable();
            $table->string('slide3', 255)->nullable();
            $table->boolean('is_laris')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

