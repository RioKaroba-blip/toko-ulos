@extends('layouts.admin')

@section('title', 'Dashboard - Admin Elizabeth Ulos')
@section('page-title', 'Dashboard')

@section('content')
<!-- Statistics Cards Row -->
<div class="row mb-4 g-3">
    <!-- Jumlah Produk -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card bg-primary-custom h-100 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 small">Jumlah Produk</p>
                    <div class="number">{{ $jumlahProduk }}</div>
                </div>
                <i class="fas fa-box" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
            <a href="{{ route('admin.produk.index') }}" class="text-white text-decoration-none small d-block mt-2">
                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>

    <!-- Jumlah Kategori -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card bg-success-custom h-100 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 small">Jumlah Kategori</p>
                    <div class="number">{{ $jumlahKategori }}</div>
                </div>
                <i class="fas fa-tags" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
            <a href="{{ route('admin.kategori.index') }}" class="text-white text-decoration-none small d-block mt-2">
                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>

    <!-- Produk Laris -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card bg-warning-custom h-100 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 small">Produk Laris</p>
                    <div class="number">{{ $jumlahProdukLaris }}</div>
                </div>
                <i class="fas fa-fire" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
            <a href="{{ route('admin.produk.index') }}" class="text-white text-decoration-none small d-block mt-2">
                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>

    <!-- Jumlah Ulasan -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card bg-info-custom h-100 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 small">Ulasan (Tampil)</p>
                    <div class="number">{{ $jumlahUlasanTampil }}</div>
                </div>
                <i class="fas fa-comments" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
            <a href="{{ route('admin.ulasan.index') }}" class="text-white text-decoration-none small d-block mt-2">
                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</div>

<!-- Quick Actions Row -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Produk
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.kategori.create') }}" class="btn btn-success w-100 py-3">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Kategori
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.ulasan.index') }}" class="btn btn-info w-100 py-3 text-white">
                            <i class="fas fa-comments me-2"></i>Kelola Ulasan
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('home') }}" class="btn btn-warning w-100 py-3" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Data Row -->
<div class="row">
    <!-- Recent Products -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-box me-2"></i>Produk Terbaru</h5>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="80">Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $recentProduk = \App\Models\Produk::latest()->take(5)->get();
                            @endphp
                            @forelse($recentProduk as $p)
                            <tr>
                                <td>
                                    <img src="{{ $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/50' }}" 
                                         alt="{{ $p->nama_produk }}"
                                         style="width: 50px; height: 50px; object-fit: cover;"
                                         class="rounded">
                                </td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Belum ada produk</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Reviews -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-comments me-2"></i>Ulasan Terbaru</h5>
                <a href="{{ route('admin.ulasan.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Ulasan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $recentUlasan = \App\Models\Ulasan::latest()->take(5)->get();
                            @endphp
                            @forelse($recentUlasan as $u)
                            <tr>
                                <td>{{ $u->nama_pengirim }}</td>
                                <td>{{ Str::limit($u->isi_ulasan, 30) }}</td>
                                <td>
                                    @if($u->status == 'tampil')
                                    <span class="badge bg-success">Tampil</span>
                                    @else
                                    <span class="badge bg-secondary">Sembunyi</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Belum ada ulasan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

