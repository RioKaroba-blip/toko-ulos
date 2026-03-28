@extends('layouts.frontend')
@section('title', 'Beranda - Elizabeth Ulos')
@section('content')

<section style="position:relative;min-height:520px;background:linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)),url('{{ asset('images/hero.jpg') }}') center/cover no-repeat;display:flex;align-items:center;justify-content:center;text-align:center;color:white;">
    <div style="padding:20px;">
        <h1 style="font-family:'Playfair Display',serif;font-size:3rem;font-weight:700;margin-bottom:1rem;">Ulos dengan tenunan indah</h1>
        <p style="font-size:0.95rem;max-width:550px;margin:0 auto 2rem;opacity:0.85;">Jadilah penjelajah dan temukan yang anda inginkan</p>
        <a href="#produk-terlaris" style="background:rgba(0,0,0,0.5);border:2px solid white;color:white;padding:13px 44px;border-radius:4px;text-decoration:none;font-size:1rem;font-weight:500;letter-spacing:1px;">Produk Terlaris</a>
    </div>
</section>

<section id="produk-terlaris" class="py-5" style="background:#fff;">
    <div class="container">
        <h2 style="text-align:center;color:#6B1A1A;font-family:'Playfair Display',serif;font-size:2rem;margin-bottom:8px;">Produk Terlaris</h2>
        <div style="width:60px;height:3px;background:#6B1A1A;margin:0 auto 40px;"></div>
        <div class="row justify-content-center">
            @forelse($produkLaris as $produk)
            <div class="col-lg-4 col-md-6 mb-4">
                <div style="border-radius:10px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.08);transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/400x300' }}"
                         style="width:100%;height:250px;object-fit:cover;" alt="{{ $produk->nama_produk }}">
                    <div style="padding:18px;">
                        <h5 style="font-weight:700;margin:0 0 6px;">{{ $produk->nama_produk }}</h5>
                        <p style="color:#6B1A1A;font-weight:600;margin-bottom:14px;">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <div style="display:flex;gap:8px;">
                            <a href="https://wa.me/6285277669222?text=Saya ingin pesan {{ urlencode($produk->nama_produk) }}" target="_blank"
                               style="flex:1;text-align:center;background:#25D366;color:white;padding:8px;border-radius:5px;text-decoration:none;font-size:0.85rem;font-weight:500;">Pesan</a>
                            <a href="{{ route('detail_produk', $produk->id) }}"
                               style="flex:1;text-align:center;background:#1a73e8;color:white;padding:8px;border-radius:5px;text-decoration:none;font-size:0.85rem;font-weight:500;">Detail Produk <i class="fas fa-info-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4"><p class="text-muted">Belum ada produk terlaris.</p></div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8f8f8;">
    <div class="container">
        <h2 style="text-align:center;color:#6B1A1A;font-family:'Playfair Display',serif;font-size:2rem;margin-bottom:8px;">Testimoni Pada Toko Kami</h2>
        <div style="width:60px;height:3px;background:#6B1A1A;margin:0 auto 10px;"></div>
        <p style="text-align:center;color:#666;margin-bottom:40px;">Terdapat Beberapa Testimoni Yang Kami Dapatkan Ketika Menjual Produk Kami</p>
        <div class="row">
            @forelse($ulasanTampil as $ulasan)
            <div class="col-md-6 mb-4">
                <div style="display:flex;gap:15px;align-items:flex-start;padding:20px;background:#fff;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,0.06);">
                    @if($ulasan->gambar)
                    <img src="{{ asset('upload/ulasan/'.$ulasan->gambar) }}" style="width:70px;height:70px;object-fit:cover;border-radius:8px;flex-shrink:0;" alt="">
                    @else
                    <div style="width:70px;height:70px;background:#6B1A1A;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="color:#FFD700;font-weight:700;font-size:1.5rem;">{{ strtoupper(substr($ulasan->nama_pengirim,0,1)) }}</span>
                    </div>
                    @endif
                    <div>
                        <h6 style="font-weight:700;margin-bottom:2px;">{{ $ulasan->nama_pengirim }}</h6>
                        <small style="color:#999;">{{ $ulasan->email ?? '' }}</small>
                        <p style="margin:8px 0 5px;font-size:0.9rem;color:#555;">{{ $ulasan->isi_ulasan }}</p>
                        <small style="color:#bbb;">{{ $ulasan->created_at->format('Y-m-d H:i:s') }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center"><p class="text-muted">Belum ada testimoni.</p></div>
            @endforelse
        </div>
    </div>
</section>

@endsection
