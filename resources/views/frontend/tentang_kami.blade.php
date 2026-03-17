@extends('layouts.frontend')

@section('title', 'Tentang Kami - Elizabeth Ulos')

@section('content')
<!-- Hero Carousel -->
<section class="hero-section text-center p-0">
    <div id="heroCarouselTentang" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarouselTentang" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarouselTentang" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/Toba_Batak.jpg') }}" class="d-block w-100" alt="Busana Adat Toba" style="height: 500px; object-fit: cover;" loading="lazy">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 font-display mb-4">Selamat Datang</h1>
                    <p class="lead mb-4">Di Halaman Tentang Toko Elizabeth Ulos</p>
                    <a href="{{ route('produk') }}" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-gem me-2"></i>Produk Unggulan
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/hero.jpg') }}" class="d-block w-100" alt="Ulos Tradisional" style="height: 500px; object-fit: cover;" loading="lazy">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 font-display mb-4">Elizabeth Ulos</h1>
                    <p class="lead mb-4">Toko ulos tradisional Batak terbaik</p>
                    <a href="#tentang" class="btn btn-outline-light btn-lg px-5">
                        <i class="fas fa-eye me-2"></i>Lihat Tentang Toko
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarouselTentang" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarouselTentang" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="font-display mb-4 section-title">Partonun Elizabeth Ulos</h2>
                <p class="lead mb-0">
                    Kami adalah toko ulos yang menyediakan berbagai jenis ulos tradisional Batak dengan kualitas terbaik. 
                    Ulos dibuat langsung oleh pengrajin berpengalaman dengan teknik tenun tradisional yang menjaga nilai budaya.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Produk Unggulan -->
@if(isset($featuredProducts) && $featuredProducts->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Produk Unggulan</h2>
        <div class="row justify-content-center">
            @foreach($featuredProducts->take(2) as $produk)
            <div class="col-lg-5 col-md-6 mb-4">
                @include('components.product-card', [
                    'image' => $produk->gambar ? asset('upload/produk/' . $produk->gambar) : 'https://via.placeholder.com/400x300',
                    'nama_produk' => $produk->nama_produk,
                    'harga' => $produk->harga,
                    'kategori' => $produk->kategori->nama_kategori ?? 'Ulos',
                    'link' => route('detail_produk', $produk->id),
                    'is_laris' => $produk->is_laris
                ])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Detail Toko -->
<section class="py-5" style="background-color: #333; color: white;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="font-display mb-4">Detail Toko Elizabeth Ulos</h2>
                <p class="lead mb-0">
                    Toko Elizabeth Ulos menyediakan berbagai jenis ulos dengan kualitas terbaik yang dibuat langsung 
                    oleh pengrajin tradisional Batak.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Info Boxes -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body py-5">
                        <i class="fas fa-crown fa-3x text-primary mb-3"></i>
                        <h4 class="font-display">Produk Unggulan</h4>
                        <p class="text-muted">Ulos berkualitas terbaik dari pengrajin tradisional.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body py-5">
                        <i class="fas fa-star fa-3x text-warning mb-3"></i>
                        <h4 class="font-display">Testimonial</h4>
                        <p class="text-muted">Banyak pelanggan puas dengan kualitas produk kami.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body py-5">
                        <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                        <h4 class="font-display">Lokasi</h4>
                        <p class="text-muted">Balige, Sumatera Utara.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection