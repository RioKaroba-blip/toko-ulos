@extends('layouts.admin')
@section('title', 'Tambah Produk - Admin Elizabeth Ulos')
@section('page-title', 'Tambah Produk')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Form Tambah Produk</span>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                               name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Nama produk" required>
                        @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ old('kategori') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Harga (Rp)</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                       name="harga" value="{{ old('harga') }}" placeholder="500000" required>
                                @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                  name="deskripsi" rows="5" placeholder="Deskripsi produk...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_laris" name="is_laris" value="1">
                        <label class="form-check-label" for="is_laris">Tandai sebagai Produk Laris</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Utama</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                               name="gambar" accept="image/*" onchange="previewImage(this, 'preview-gambar')">
                        @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <img id="preview-gambar" src="#" alt="Preview" class="img-thumbnail mt-2" style="display:none; width:100%; border-radius:8px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Slide 1</label>
                        <input type="file" class="form-control" name="slide1" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Slide 2</label>
                        <input type="file" class="form-control" name="slide2" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Slide 3</label>
                        <input type="file" class="form-control" name="slide3" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function previewImage(input, previewId) {
    var preview = document.getElementById(previewId);
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection