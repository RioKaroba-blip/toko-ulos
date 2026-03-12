@extends('layouts.admin')

@section('title', 'Detail Produk - Admin Elizabeth Ulos')
@section('page-title', 'Detail Produk')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                @if($produk->gambar)
                <img src="{{ asset('upload/produk/'.$produk->gambar) }}" 
                     alt="{{ $produk->nama_produk }}" 
                     class="img-fluid rounded">
                @else
                <img src="https://via.placeholder.com/400x400" 
                     alt="No Image" 
                     class="img-fluid rounded">
                @endif
            </div>
            <div class="col-md-7">
                <h3>{{ $produk->nama_produk }}</h3>
                <span class="badge bg-primary">{{ $produk->kategori->nama_kategori }}</span>
                @if($produk->is_laris)
                <span class="badge bg-success">Produk Laris</span>
                @endif
                
                <h4 class="mt-3 text-primary">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                
                <div class="mt-4">
                    <h5>Deskripsi</h5>
                    <p>{{ $produk->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
        </div>
</div>
@endsection
