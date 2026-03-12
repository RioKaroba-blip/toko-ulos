@extends('layouts.admin')

@section('title', 'Detail Ulasan - Admin Elizabeth Ulos')
@section('page-title', 'Detail Ulasan')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $ulasan->nama_pengirim }}</h4>
                <p class="text-muted">{{ $ulasan->email }}</p>
                
                <div class="mb-3">
                    <strong>Status:</strong>
                    @if($ulasan->status == 'tampil')
                    <span class="badge bg-success">Tampil</span>
                    @else
                    <span class="badge bg-secondary">Sembunyi</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <strong>Tanggal:</strong>
                    <p>{{ $ulasan->created_at->format('d M Y H:i') }}</p>
                </div>
                
                <div class="mb-3">
                    <strong>Ulasan:</strong>
                    <p>{{ $ulasan->isi_ulasan }}</p>
                </div>
                
                <div class="mt-3">
                    <a href="{{ route('admin.ulasan.edit', $ulasan->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            <div class="col-md-4">
                @if($ulasan->gambar)
                <img src="{{ asset('upload/ulasan/'.$ulasan->gambar) }}" alt="Foto Ulasan" class="img-fluid rounded">
                @else
                <p class="text-muted">Tidak ada foto</p>
                @endif
            </div>
    </div>
@endsection
