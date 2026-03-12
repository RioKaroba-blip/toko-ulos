@extends('layouts.frontend')

@section('title', 'Ulasan - Elizabeth Ulos')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="font-display">Ulasan Customer</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ulasan</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Form Kirim Ulasan -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h3 class="font-display mb-4">Kirim Ulasan Anda</h3>
                        
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        <form action="{{ route('kirim-ulasan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Anda</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       id="nama" name="nama" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="ulasan" class="form-label">Ulasan Anda</label>
                                <textarea class="form-control @error('ulasan') is-invalid @enderror" 
                                          id="ulasan" name="ulasan" rows="5" required></textarea>
                                @error('ulasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Foto (Opsional)</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                       id="gambar" name="gambar" accept="image/*">
                                @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Ulasan
                            </button>
                        </form>
                    </div>
            </div>
    </div>
</section>

<!-- Daftar Ulasan -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Ulasan Customer</h2>
        <div class="row">
            @forelse($ulasan as $u)
            <div class="col-md-6 mb-4">
                <div class="testimonial-card">
                    <div class="d-flex align-items-start mb-3">
                        @if($u->gambar)
                        <img src="{{ asset('upload/ulasan/'.$u->gambar) }}" 
                             alt="{{ $u->nama_pengirim }}" 
                             class="rounded me-3"
                             style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                        <div class="bg-primary rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-user text-white fa-2x"></i>
                        </div>
                        @endif
                        <div>
                            <h6 class="mb-0">{{ $u->nama_pengirim }}</h6>
                            <small class="text-muted">{{ $u->created_at->format('d M Y') }}</small>
                        </div>
                    <p class="mb-0">"{{ $u->isi_ulasan }}"</p>
                </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                <p class="text-muted">Belum ada ulasan saat ini.</p>
            </div>
            @endforelse
        </div>
</section>
@endsection
