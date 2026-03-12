@extends('layouts.frontend')

@section('title', 'Beranda - Elizabeth Ulos')

@section('content')
<!-- Hero Section with Carousel -->
<section class="hero-section text-center p-0">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('build/assets/Pakean adat.jpg') }}" class="d-block w-100" alt="Busana Adat Toba" style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 font-display mb-4">Keindahan Busana Adat Toba</h1>
                    <p class="lead mb-4">Koleksi eksklusif ulos, songket, dan sortali dari pengrajin terbaik Sumatra Utara</p>
                    <a href="{{ route('frontend.produk') }}" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-shopping-bag me-2"></i>Lihat Koleksi
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('build/assets/pasang batik.webp') }}" class="d-block w-100" alt="Batik Tradisional" style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 font-display mb-4">Keindahan Busana Adat Toba</h1>
                    <p class="lead mb-4">Koleksi eksklusif ulos, songket, dan sortali dari pengrajin terbaik Sumatra Utara</p>
                    <a href="{{ route('frontend.produk') }}" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-shopping-bag me-2"></i>Lihat Koleksi
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Produk Terlaris -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Produk Terlaris</h2>
        <div class="row">
            @forelse($produkLaris as $produk)
            <div class="col-md-4 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/300x250' }}" 
                         class="card-img-top" 
                         alt="{{ $produk->nama_produk }}">
                    <div class="card-body">
                        <span class="category-badge mb-2 d-inline-block">{{ $produk->kategori->nama_kategori }}</span>
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="price-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('frontend.detail', $produk->id) }}" class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk terlaris saat ini.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.produk') }}" class="btn btn-outline-primary btn-lg">
                Lihat Semua Produk <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Tentang Toko -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="font-display mb-4">Tentang Elizabeth Ulos</h2>
                <p class="lead">Kami adalah toko busana adat terpercaya yang berlokasi di Pematangsiantar, Sumatra Utara.</p>
                <p>Elizabeth Ulos hadir untuk melestarikan kekayaan budaya bangsa melalui koleksi ulos, songket, dan sortali authentic dari para pengrajin lokal. Setiap produk yang kami tawarkan dibuat dengan penuh dedikasi dan keahlian tradisi turun-temurun.</p>
                <a href="{{ route('frontend.tentang') }}" class="btn btn-primary">
                    Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Kategori Produk -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Kategori Produk</h2>
        <div class="row justify-content-center">
            @foreach($kategori as $kat)
            <div class="col-md-4 mb-3">
                <a href="{{ route('frontend.produk', ['kategori' => $kat->id]) }}" class="text-decoration-none">
                    <div class="card product-card text-center p-4">
                        <i class="fas fa-tshirt fa-3x text-primary mb-3"></i>
                        <h4>{{ $kat->nama_kategori }}</h4>
                        <p class="text-muted mb-0">Lihat Koleksi</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Apa Kata Customer</h2>
        <div class="row">
            @forelse($ulasanTampil as $ulasan)
            <div class="col-md-4 mb-4">
                <div class="testimonial-card">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $ulasan->nama_pengirim }}</h6>
                            <small class="text-muted">{{ $ulasan->created_at->format('d M Y') }}</small>
                        </div>
                    </div>
                    <p class="mb-0">"{{ $ulasan->isi_ulasan }}"</p>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada testimoni saat ini.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.ulasan') }}" class="btn btn-outline-primary">
                Lihat Semua Ulasan <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);">
    <div class="container text-center text-white">
        <h2 class="font-display mb-3">Punya Pertanyaan?</h2>
        <p class="mb-4">Hubungi kami untuk informasi lebih lanjut tentang produk kami</p>
        <a href="https://wa.me/6281234567890" class="btn btn-light btn-lg">
            <i class="fab fa-whatsapp me-2"></i>Hubungi Kami
        </a>
    </div>
</section>
@endsection

