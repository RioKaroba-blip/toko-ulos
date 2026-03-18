@extends('layouts.frontend')
@section('title', $produk->nama_produk . ' - Elizabeth Ulos')
@section('content')

<section class="py-3" style="background:#f8f8f8; border-bottom:1px solid #eee;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#6B1A1A; text-decoration:none;">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('produk') }}" style="color:#6B1A1A; text-decoration:none;">Produk</a></li>
                <li class="breadcrumb-item active">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-4">
                <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/500x400' }}"
                     alt="{{ $produk->nama_produk }}"
                     style="width:100%; border-radius:10px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
            </div>
            <div class="col-md-7">
                <span style="background:#f5e6e6; color:#6B1A1A; font-size:0.8rem; padding:4px 12px; border-radius:20px;">{{ $produk->kategori->nama_kategori ?? 'Ulos' }}</span>
                <h2 style="font-family:'Playfair Display',serif; color:#1a1a1a; margin:15px 0 10px; font-size:1.8rem;">{{ $produk->nama_produk }}</h2>
                <p style="font-size:2rem; color:#6B1A1A; font-weight:700; margin-bottom:20px;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <div style="height:1px; background:#eee; margin-bottom:20px;"></div>
                <p style="color:#555; line-height:1.8; margin-bottom:25px;">{{ $produk->deskripsi ?: 'Ulos berkualitas tinggi dari pengrajin Batak tradisional. Dibuat dengan teknik tenun tradisional yang telah diwariskan turun-temurun.' }}</p>
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <a href="https://wa.me/6285277669222?text=Saya ingin pesan {{ urlencode($produk->nama_produk) }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}"
                       target="_blank"
                       style="background:#25D366; color:white; padding:13px 30px; border-radius:6px; text-decoration:none; font-weight:600; display:flex; align-items:center; gap:8px;">
                        <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                    </a>
                    <a href="{{ route('produk') }}"
                       style="border:2px solid #6B1A1A; color:#6B1A1A; padding:13px 30px; border-radius:6px; text-decoration:none; font-weight:600;">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($produkLaris) && $produkLaris->count() > 0)
<section class="py-5" style="background:#f8f8f8;">
    <div class="container">
        <h3 style="font-family:'Playfair Display',serif; color:#6B1A1A; margin-bottom:10px;">Produk Lainnya</h3>
        <div style="width:50px; height:3px; background:#6B1A1A; margin-bottom:30px;"></div>
        <div class="row">
            @foreach($produkLaris->take(4) as $p)
            <div class="col-md-3 col-sm-6 mb-4">
                <div style="border-radius:10px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.08); background:white;">
                    <img src="{{ $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/300x250' }}"
                         style="width:100%; height:200px; object-fit:cover;" alt="{{ $p->nama_produk }}">
                    <div style="padding:15px;">
                        <h6 style="font-weight:700; margin-bottom:5px;">{{ $p->nama_produk }}</h6>
                        <p style="color:#6B1A1A; font-weight:600; margin-bottom:10px;">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('detail_produk', $p->id) }}" style="display:block; text-align:center; background:#6B1A1A; color:white; padding:8px; border-radius:5px; text-decoration:none; font-size:0.85rem;">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection