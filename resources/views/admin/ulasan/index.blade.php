@extends('layouts.admin')
@section('title', 'Kelola Ulasan - Admin Elizabeth Ulos')
@section('page-title', 'Kelola Ulasan')
@section('content')
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
                        <th>Nama Pengirim</th>
                        <th>Email</th>
                        <th>Ulasan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ulasan as $index => $u)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $u->nama_pengirim }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ Str::limit($u->isi_ulasan, 50) }}</td>
                        <td>
                            @if($u->gambar)
                            <img src="{{ asset('upload/ulasan/'.$u->gambar) }}" style="width:45px;height:45px;object-fit:cover;border-radius:50%;">
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($u->status == 'tampil')
                            <span class="badge bg-success">Tampil</span>
                            @else
                            <span class="badge bg-secondary">Sembunyi</span>
                            @endif
                        </td>
                        <td>{{ $u->created_at->format('d M Y') }}</td>
                        <td>
                            @if($u->status == 'sembunyi')
                            <form action="{{ route('admin.ulasan.tampilkan', $u->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Tampilkan ulasan ini?')">
                                    <i class="fas fa-check"></i> Tampilkan
                                </button>
                            </form>
                            @else
                            <form action="{{ route('admin.ulasan.sembunyikan', $u->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Sembunyikan ulasan ini?')">
                                    <i class="fas fa-eye-slash"></i> Sembunyikan
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.ulasan.destroy', $u->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus ulasan ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada ulasan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
