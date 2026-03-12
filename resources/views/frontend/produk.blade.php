@extends('layouts.frontend')

@section('title', 'Produk - Elizabeth Ulos')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="font-display">Koleksi Produk</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Filter Kategori -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Filter Kategori</h5>
                        <div class="list-group">
                            <a href="{{ route('frontend.produk') }}" 
                               class="list-group-item list-group-item-action {{ !request('kategori') ? 'active' : '' }}">
                                Semua Produk
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('frontend.produk', ['kategori' => $kat->id]) }}" 
                               class="list-group-item list-group-item-action {{ request('kategori') == $kat->id ? 'active' : '' }}">
                                {{ $kat->nama_kategori }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                    @forelse($produk as $p)
                    <div class="col-md-4 mb-4">
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
                    @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-shopping-bag fa-4x text-muted mb-3"></i>
                        <p class="text-muted">Produk tidak ditemukan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

