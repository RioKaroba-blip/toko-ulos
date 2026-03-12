@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin Elizabeth Ulos')
@section('page-title', 'Kelola Produk')

@section('content')
<div class="row mb-3">
    <div class="col-md-6">
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status Laris</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produk as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/50' }}" 
                                 alt="{{ $p->nama_produk }}"
                                 style="width: 50px; height: 50px; object-fit: cover;"
                                 class="rounded">
                        </td>
                        <td>{{ $p->nama_produk }}</td>
                        <td>{{ $p->kategori->nama_kategori }}</td>
                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td>
                            @if($p->is_laris)
                            <span class="badge bg-success">Laris</span>
                            @else
                            <span class="badge bg-secondary">Normal</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.produk.show', $p->id) }}" class="btn btn-sm btn-info text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada produk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
</div>
@endsection
