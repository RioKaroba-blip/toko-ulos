@extends('layouts.admin')

@section('title', 'Profil Owner - Admin Elizabeth Ulos')
@section('page-title', 'Profil Owner')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Edit Profil Owner</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="mb-3">
                        @if($user->owner_photo)
                        <img src="{{ asset('upload/profile/' . $user->owner_photo) }}" 
                             alt="Profil Owner" 
                             class="img-fluid rounded-circle mb-3"
                             style="width: 250px; height: 250px; object-fit: cover;"
                             id="preview-image">
                        @else
                        <img src="https://via.placeholder.com/250x250?text=Owner" 
                             alt="Profil Owner" 
                             class="img-fluid rounded-circle mb-3"
                             style="width: 250px; height: 250px; object-fit: cover;"
                             id="preview-image">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="owner_photo" class="form-label">Ganti Foto Profil</label>
                        <input type="file" class="form-control @error('owner_photo') is-invalid @enderror" 
                               id="owner_photo" name="owner_photo" accept="image/*">
                        @error('owner_photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: jpeg, png, jpg, gif, svg. Max: 2MB</small>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="owner_name" class="form-label">Nama Owner</label>
                        <input type="text" class="form-control @error('owner_name') is-invalid @enderror" 
                               id="owner_name" name="owner_name" 
                               value="{{ old('owner_name', $user->owner_name ?? 'Elizabeth Turnip') }}" required>
                        @error('owner_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="owner_bio" class="form-label">Bio / Deskripsi</label>
                        <textarea class="form-control @error('owner_bio') is-invalid @enderror" 
                                  id="owner_bio" name="owner_bio" rows="5">{{ old('owner_bio', $user->owner_bio ?? 'Founder & Owner Elizabeth Ulos') }}</textarea>
                        @error('owner_bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="owner_phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('owner_phone') is-invalid @enderror" 
                               id="owner_phone" name="owner_phone" 
                               value="{{ old('owner_phone', $user->owner_phone ?? '+62 812 3456 7890') }}">
                        @error('owner_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="owner_address" class="form-label">Alamat</label>
                        <textarea class="form-control @error('owner_address') is-invalid @enderror" 
                                  id="owner_address" name="owner_address" rows="3">{{ old('owner_address', $user->owner_address ?? 'Jl. P. Boraha, Pematangsiantar, Sumatra Utara') }}</textarea>
                        @error('owner_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Image preview
    document.getElementById('owner_photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
