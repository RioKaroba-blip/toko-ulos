@extends('layouts.admin')
@section('title', 'Tambah Kategori - Admin Elizabeth Ulos')
@section('page-title', 'Tambah Kategori')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Form Tambah Kategori</span>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                       id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"
                       placeholder="Contoh: Ulos, Songket, SorTali" required>
                @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Simpan Kategori
            </button>
        </form>
    </div>
</div>
@endsection