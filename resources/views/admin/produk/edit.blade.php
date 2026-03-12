@extends('layouts.admin')

@section('title', 'Edit Produk - Admin Elizabeth Ulos')
@section('page-title', 'Edit Produk')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" 
                               id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select @error('kategori') is-invalid @enderror" 
                                        id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ $produk->kategori_id == $kat->id ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga (Rp)</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                                       id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" required>
                                @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_laris" name="is_laris" value="1" {{ $produk->is_laris ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_laris">Tandai sebagai Produk Laris</label>
                    </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" name="gambar" accept="image/*" onchange="previewImage(this, 'preview-gambar')">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($produk->gambar)
                        <img id="preview-gambar" src="{{ asset('upload/produk/'.$produk->gambar) }}" alt="Preview" class="img-thumbnail mt-2" style="width: 100%;">
                        @else
                        <img id="preview-gambar" src="#" alt="Preview" class="img-thumbnail mt-2" style="display: none; width: 100%;">
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="slide1" class="form-label">Slide 1</label>
                        <input type="file" class="form-control" id="slide1" name="slide1" accept="image/*">
                        @if($produk->slide1)
                        <small class="text-muted">File saat ini: {{ $produk->slide1 }}</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="slide2" class="form-label">Slide 2</label>
                        <input type="file" class="form-control" id="slide2" name="slide2" accept="image/*">
                        @if($produk->slide2)
                        <small class="text-muted">File saat ini: {{ $produk->slide2 }}</small>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="slide3" class="form-label">Slide 3</label>
                        <input type="file" class="form-control" id="slide3" name="slide3" accept="image/*">
                        @if($produk->slide3)
                        <small class="text-muted">File saat ini: {{ $produk->slide3 }}</small>
                        @endif
                    </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Produk
                </button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
function previewImage(input, previewId) {
    var preview = document.getElementById(previewId);
    var file = input.files[0];
    var reader = new FileReader();
    
    if (file) {
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
