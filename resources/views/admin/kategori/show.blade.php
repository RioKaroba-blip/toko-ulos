@extends('layouts.admin')

@section('title', 'Detail Kategori - Admin Elizabeth Ulos')
@section('page-title', 'Detail Kategori')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>{{ $kategori->nama_kategori }}</h3>
        <p class="text-muted">Jumlah Produk: {{ $kategori->produk->count() }}</p>
        
        <hr>
        
        <h5>Daftar Produk dalam Kategori ini:</h5>
        @if($kategori->produk->count() > 0)
        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori->produk as $p)
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
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-muted">Belum ada produk dalam kategori ini.</p>
        @endif
        
        <div class="mt-3">
            <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
</div>
@endsection
