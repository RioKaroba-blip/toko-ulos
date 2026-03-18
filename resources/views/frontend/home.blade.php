@extends('layouts.frontend')
@section('title', 'Beranda - Elizabeth Ulos')
@section('content')

<section style="position:relative; min-height:520px; background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('{{ asset('images/hero.jpg') }}') center/cover no-repeat; display:flex; align-items:center; justify-content:center; text-align:center; color:white;">
    <div style="padding:20px;">
        <p style="letter-spacing:3px; font-size:0.85rem; margin-bottom:1rem; opacity:0.8;">ELIZABETH ULOS</p>
        <h1 style="font-family:'Playfair Display',serif; font-size:3rem; font-weight:700; margin-bottom:1rem;">Ulos dengan tenunan indah</h1>
        <p style="font-size:1rem; max-width:600px; margin:0 auto 2rem; opacity:0.85;">Toko yang menyediakan RAGAM ULOS BATAK, untuk keperluan pesta batak serta ragam sarung tenunan tangan, melayani pengiriman ke seluruh Indonesia</p>
        <a href="#produk-terlaris" style="background:#6B1A1A; color:white; padding:14px 44px; border-radius:4px; text-decoration:none; font-size:1rem; font-weight:500; letter-spacing:1px;">Produk Terlaris</a>
    </div>
</section>

<section id="produk-terlaris" class="py-5" style="background:#fff;">
    <div class="container">
        <h2 style="text-align:center; color:#6B1A1A; font-family:'Playfair Display',serif; font-size:2rem; margin-bottom:10px;">Produk Terlaris</h2>
        <div style="width:60px; height:3px; background:#6B1A1A; margin:0 auto 40px;"></div>
        <div class="row justify-content-center">
            @forelse($produkLaris as $produk)
            <div class="col-lg-4 col-md-6 mb-4">
                <div style="border-radius:10px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.08); transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/400x300' }}"
                         style="width:100%; height:260px; object-fit:cover;" alt="{{ $produk->nama_produk }}">
                    <div style="padding:18px;">
                        <span style="background:#f5e6e6; color:#6B1A1A; font-size:0.75rem; padding:3px 10px; border-radius:20px;">{{ $produk->kategori->nama_kategori ?? 'Ulos' }}</span>
                        <h5 style="font-weight:700; margin:10px 0 5px;">{{ $produk->nama_produk }}</h5>
                        <p style="color:#6B1A1A; font-weight:600; margin-bottom:12px;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('detail_produk', $produk->id) }}" style="display:block; text-align:center; background:#6B1A1A; color:white; padding:9px; border-radius:5px; text-decoration:none; font-size:0.9rem;">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">Belum ada produk terlaris.</p>
            </div>
            @endforelse
        </div>
        <div style="text-align:center; margin-top:20px;">
            <a href="{{ route('produk') }}" style="border:2px solid #6B1A1A; color:#6B1A1A; padding:11px 40px; border-radius:4px; text-decoration:none; font-weight:500;">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8f8f8;">
    <div class="container">
        <h2 style="text-align:center; color:#6B1A1A; font-family:'Playfair Display',serif; font-size:2rem; margin-bottom:10px;">Testimoni Pelanggan</h2>
        <div style="width:60px; height:3px; background:#6B1A1A; margin:0 auto 10px;"></div>
        <p style="text-align:center; color:#666; margin-bottom:40px;">Apa kata pelanggan kami</p>
        <div class="row">
            @forelse($ulasanTampil as $ulasan)
            <div class="col-md-6 mb-4">
                <div style="padding:20px; background:#fff; border-left:4px solid #6B1A1A; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                    <div style="display:flex; gap:15px; align-items:flex-start;">
                        @if($ulasan->gambar)
                        <img src="{{ asset('upload/ulasan/'.$ulasan->gambar) }}" style="width:60px; height:60px; object-fit:cover; border-radius:50%; flex-shrink:0;" alt="">
                        @else
                        <div style="width:60px; height:60px; background:#6B1A1A; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <span style="color:#FFD700; font-weight:700; font-size:1.2rem;">{{ strtoupper(substr($ulasan->nama_pengirim, 0, 1)) }}</span>
                        </div>
                        @endif
                        <div>
                            <h6 style="font-weight:700; margin-bottom:2px;">{{ $ulasan->nama_pengirim }}</h6>
                            <small style="color:#999;">{{ $ulasan->created_at->format('d M Y') }}</small>
                            <p style="margin:10px 0 0; font-size:0.9rem; color:#555; font-style:italic;">"{{ $ulasan->isi_ulasan }}"</p>
                        </div>
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