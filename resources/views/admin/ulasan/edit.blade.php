@extends('layouts.admin')

@section('title', 'Edit Ulasan - Admin Elizabeth Ulos')
@section('page-title', 'Edit Ulasan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.ulasan.update', $ulasan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" 
                       id="nama_pengirim" name="nama_pengirim" value="{{ old('nama_pengirim', $ulasan->nama_pengirim) }}" required>
                @error('nama_pengirim')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $ulasan->email) }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="isi_ulasan" class="form-label">Ulasan</label>
                <textarea class="form-control @error('isi_ulasan') is-invalid @enderror" 
                          id="isi_ulasan" name="isi_ulasan" rows="5" required>{{ old('isi_ulasan', $ulasan->isi_ulasan) }}</textarea>
                @error('isi_ulasan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" 
                        id="status" name="status" required>
                    <option value="tampil" {{ $ulasan->status == 'tampil' ? 'selected' : '' }}>Tampil</option>
                    <option value="sembunyi" {{ $ulasan->status == 'sembunyi' ? 'selected' : '' }}>Sembunyi</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Ulasan
                </button>
                <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
