@extends('layouts.frontend')

@section('title', $produk->nama_produk . ' - Elizabeth Ulos')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.produk') }}" class="text-decoration-none">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="product-box p-5 mb-5" style="background: #e8e8e8; border-top: 3px solid #7b2d2d; border-bottom: 3px solid #7b2d2d; display: flex; gap: 40px; align-items: start;">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : asset('upload/produk/1773286849.jpg') }}" 
                             alt="{{ $produk->nama_produk }}" 
                             style="width: 350px; border: 4px solid #1e90ff;">
                    </div>
                    
                    <!-- Product Info -->
                    <div class="product-info flex-grow-1" style="font-size: 14px;">
                        <h3 style="margin-top: 0; color: #7b2d2d;">Nama Produk:</h3>
                        <h4>{{ $produk->nama_produk }}</h4>
                        
                        <p><b>Deskripsi Produk:</b><br>{{ $produk->deskripsi ?: 'Ulos berkualitas tinggi dari pengrajin Batak tradisional.' }}</p>
                        
                        <p><b>Kategori Produk:</b><br>{{ $produk->kategori->nama_kategori ?? 'Ulos' }}</p>
                        
                        <p><b>Harga Produk:</b><br>
                        <span class="price" style="color: red; font-weight: bold; font-size: 20px;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                        </p>
                        
                        <div style="display: flex; gap: 10px;">
                            <a href="#" class="btn" style="background: #dc3545; padding: 12px 24px; border-radius: 4px; color: white; text-decoration: none;">Wishlist</a>
                            <a href="https://wa.me/6281234567890?text=Saya ingin pesan {{ urlencode($produk->nama_produk) }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}" 
                               class="btn" style="background: #198754; padding: 12px 24px; border-radius: 4px; color: white; text-decoration: none;" target="_blank">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Produk Laris Lainnya -->
@if($produkLaris->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Produk Lainnya</h2>
        <div class="row">
            @foreach($produkLaris as $p)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/300x250' }}" 
                         class="card-img-top" 
                         alt="{{ $p->nama_produk }}">
                    <div class="card-body">
                        <span class="category-badge mb-2 d-inline-block">{{ $p->kategori->nama_kategori }}</span>
                        <h5 class="card-title">{{ $p->nama_produk }}</h5>
                        <p class="price-text">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('frontend.detail', $p->id) }}" class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>
@endsection

