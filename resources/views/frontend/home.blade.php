@extends('layouts.frontend')

@section('title', 'Beranda - Elizabeth Ulos')

@section('content')

<!-- Hero Section -->
<section style="position:relative; min-height:500px; background:linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('{{ asset('images/hero.jpg') }}') center/cover no-repeat; display:flex; align-items:center; justify-content:center; text-align:center; color:white;">
    <div style="padding:20px;">
        <h1 style="font-size:2.5rem; font-weight:700; margin-bottom:1rem;">Ulos dengan tenunan indah</h1>
        <p style="font-size:1rem; max-width:600px; margin:0 auto 2rem;">Toko yang menyediakan RAGAM ULOS BATAK, untuk keperluan pesta batak serta ragam sarung tenunan tangan, melayani pengiriman barang ke seluruh wilayah Indonesia</p>
        <a href="#produk-terlaris" class="btn" style="background:#333; color:white; padding:12px 40px; border-radius:4px; text-decoration:none; font-size:1rem;">Produk Terlaris</a>
    </div>
</section>

<!-- Produk Terlaris -->
<section id="produk-terlaris" class="py-5" style="background:#fff;">
    <div class="container">
        <h2 style="text-align:center; color:#6B1A1A; font-family:'Playfair Display',serif; font-size:2rem; margin-bottom:10px;">Produk Terlaris</h2>
        <div style="width:60px; height:3px; background:#6B1A1A; margin:0 auto 40px;"></div>
        <div class="row justify-content-center">
            @forelse($produkLaris as $produk)
            <div class="col-lg-4 col-md-6 mb-4">
                <div style="border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                    <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/400x300' }}"
                         style="width:100%; height:250px; object-fit:cover;" alt="{{ $produk->nama_produk }}">
                    <div style="padding:15px;">
                        <h5 style="font-weight:700; margin-bottom:5px;">{{ $produk->nama_produk }}</h5>
                        <p style="color:#6B1A1A; font-weight:600;">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">Belum ada produk terlaris.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-5" style="background:#f8f8f8;">
    <div class="container">
        <h2 style="text-align:center; color:#6B1A1A; font-family:'Playfair Display',serif; font-size:2rem; margin-bottom:10px;">Testimoni Pada Toko Kami</h2>
        <div style="width:60px; height:3px; background:#6B1A1A; margin:0 auto 10px;"></div>
        <p style="text-align:center; color:#666; margin-bottom:40px;">Terdapat Beberapa Testimoni Yang Kami Dapatkan Ketika Menjual Produk Kami</p>
        <div class="row">
            @forelse($ulasanTampil as $ulasan)
            <div class="col-md-6 mb-4">
                <div style="display:flex; gap:15px; padding:15px; background:#fff; border:1px solid #eee; border-radius:8px;">
                    @if($ulasan->gambar)
                    <img src="{{ asset('upload/ulasan/'.$ulasan->gambar) }}" style="width:80px; height:80px; object-fit:cover; border-radius:4px; flex-shrink:0;" alt="">
                    @else
                    <div style="width:80px; height:80px; background:#ddd; border-radius:4px; flex-shrink:0;"></div>
                    @endif
                    <div>
                        <h6 style="font-weight:700; margin-bottom:2px;">{{ $ulasan->nama_pengirim }}</h6>
                        <small style="color:#999;">{{ $ulasan->email ?? '' }}</small>
                        <p style="margin:8px 0 5px; font-size:0.9rem;">{{ $ulasan->isi_ulasan }}</p>
                        <small style="color:#999;">{{ $ulasan->created_at->format('Y-m-d H:i:s') }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada testimoni.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection