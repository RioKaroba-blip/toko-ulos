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
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/600x600' }}" 
                             alt="{{ $produk->nama_produk }}" 
                             class="img-fluid w-100"
                             id="mainImage">
                    </div>
                </div>
                
                <!-- Thumbnail Gallery -->
                @if($produk->slide1 || $produk->slide2 || $produk->slide3)
                <div class="row mt-3 g-2">
                    @if($produk->gambar)
                    <div class="col-3">
                        <img src="{{ asset('upload/produk/'.$produk->gambar) }}" 
                             alt="Thumbnail" 
                             class="img-thumbnail cursor-pointer w-100"
                             onclick="changeImage('{{ asset('upload/produk/'.$produk->gambar) }}')">
                    </div>
                    @endif
                    @if($produk->slide1)
                    <div class="col-3">
                        <img src="{{ asset('upload/produk/'.$produk->slide1) }}" 
                             alt="Slide 1" 
                             class="img-thumbnail cursor-pointer w-100"
                             onclick="changeImage('{{ asset('upload/produk/'.$produk->slide1) }}')">
                    </div>
                    @endif
                    @if($produk->slide2)
                    <div class="col-3">
                        <img src="{{ asset('upload/produk/'.$produk->slide2) }}" 
                             alt="Slide 2" 
                             class="img-thumbnail cursor-pointer w-100"
                             onclick="changeImage('{{ asset('upload/produk/'.$produk->slide2) }}')">
                    </div>
                    @endif
                    @if($produk->slide3)
                    <div class="col-3">
                        <img src="{{ asset('upload/produk/'.$produk->slide3) }}" 
                             alt="Slide 3" 
                             class="img-thumbnail cursor-pointer w-100"
                             onclick="changeImage('{{ asset('upload/produk/'.$produk->slide3) }}')">
                    </div>
                    @endif
                </div>
                @endif
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <span class="category-badge mb-2 d-inline-block">{{ $produk->kategori->nama_kategori }}</span>
                <h1 class="font-display mb-3">{{ $produk->nama_produk }}</h1>
                <h2 class="price-text mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h2>
                
                <div class="mb-4">
                    <h5>Deskripsi Produk</h5>
                    <p class="text-muted">{{ $produk->deskripsi ?: 'Deskripsi produk belum tersedia.' }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>Informasi Tambahan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Produk Original</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Kualitas Terjamin</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Bisa Cod / Transfer</li>
                    </ul>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20{{ urlencode($produk->nama_produk) }}" 
                       class="btn btn-success btn-lg" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i>Pesan via WhatsApp
                    </a>
                    <a href="{{ route('frontend.produk') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Produk
                    </a>
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

