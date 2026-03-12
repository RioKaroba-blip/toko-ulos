@extends('layouts.admin')

@section('title', 'Tambah Kategori - Admin Elizabeth Ulos')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                       id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
                @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Kategori
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
