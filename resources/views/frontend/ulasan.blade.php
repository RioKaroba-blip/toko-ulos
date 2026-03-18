@extends('layouts.frontend')
@section('title', 'Ulasan - Elizabeth Ulos')
@section('content')

<section class="py-4" style="background:#f8f8f8; border-bottom:1px solid #eee;">
    <div class="container">
        <h1 style="font-family:'Playfair Display',serif; color:#6B1A1A; font-size:2rem; margin-bottom:5px;">Ulasan Pelanggan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#6B1A1A; text-decoration:none;">Beranda</a></li>
                <li class="breadcrumb-item active">Ulasan</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div style="background:white; border-radius:12px; padding:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06); border-top:4px solid #6B1A1A;">
                    <h3 style="font-family:'Playfair Display',serif; color:#6B1A1A; margin-bottom:25px;">Tulis Ulasan Anda</h3>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('kirim-ulasan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-500">Nama Anda</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama lengkap" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email@contoh.com" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ulasan Anda</label>
                            <textarea class="form-control @error('ulasan') is-invalid @enderror" name="ulasan" rows="4" placeholder="Ceritakan pengalaman belanja Anda..." required></textarea>
                            @error('ulasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Foto (Opsional)</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" accept="image/*">
                            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" style="background:#6B1A1A; color:white; border:none; padding:12px 30px; border-radius:6px; font-weight:600; cursor:pointer;">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Ulasan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8f8f8;">
    <div class="container">
        <h2 style="text-align:center; font-family:'Playfair Display',serif; color:#6B1A1A; font-size:2rem; margin-bottom:10px;">Ulasan Pelanggan Kami</h2>
        <div style="width:60px; height:3px; background:#6B1A1A; margin:0 auto 40px;"></div>
        <div class="row">
            @forelse($ulasan as $u)
            <div class="col-md-6 mb-4">
                <div style="background:white; border-radius:10px; padding:20px; box-shadow:0 2px 10px rgba(0,0,0,0.06); border-left:4px solid #6B1A1A;">
                    <div style="display:flex; gap:15px; align-items:flex-start;">
                        @if($u->gambar)
                        <img src="{{ asset('upload/ulasan/'.$u->gambar) }}" style="width:55px; height:55px; object-fit:cover; border-radius:50%; flex-shrink:0;" alt="">
                        @else
                        <div style="width:55px; height:55px; background:#6B1A1A; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <span style="color:#FFD700; font-weight:700; font-size:1.2rem;">{{ strtoupper(substr($u->nama_pengirim, 0, 1)) }}</span>
                        </div>
                        @endif
                        <div style="flex:1;">
                            <h6 style="font-weight:700; margin-bottom:2px;">{{ $u->nama_pengirim }}</h6>
                            <small style="color:#999;">{{ $u->created_at->format('d M Y') }}</small>
                            <p style="margin:10px 0 0; color:#555; font-size:0.9rem; font-style:italic;">"{{ $u->isi_ulasan }}"</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-comments fa-4x text-muted mb-3 d-block"></i>
                <p class="text-muted">Belum ada ulasan saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection