<div class="card card-produk shadow-sm border p-3 mx-auto" style="max-width: 280px; border-radius: 8px;">
    <div class="text-center mb-3">
        <div class="position-relative mx-auto" style="width: 220px; height: 260px;">
            <img src="{{ $image }}" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover; border: 1px solid #ddd; border-radius: 8px;">
        </div>
    </div>
    <h5 class="card-title text-center mb-3" style="font-size: 1rem; line-height: 1.3;">{{ Str::limit($nama_produk ?? 'Produk Premium', 28) }}</h5>
    <hr class="my-2" style="border-color: #dee2e6;">
    <div class="text-center">
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="harga fw-bold fs-4" style="color: red; white-space: nowrap;">Rp {{ number_format($harga, 0, ',', '.') }}</span>
            </div>
            <div class="d-flex gap-1 w-100">
                <a href="https://wa.me/6281234567890?text=Saya ingin pesan {{ urlencode($nama_produk ?? '') }}" 
                   class="btn btn-pesan flex-fill px-3 py-2" target="_blank" style="background: #2e8b57 !important; color: white !important; border-radius: 4px !important; font-size: 0.85rem; font-weight: 500; box-shadow: 0 1px 3px rgba(0,0,0,0.15); height: 38px; display: flex; align-items: center; justify-content: center;">
                    Pesan
                </a>
                <a href="{{ $link }}" class="btn btn-detail flex-fill px-3 py-2 ms-1" style="background: #2d6cdf !important; color: white !important; border-radius: 4px !important; font-size: 0.85rem; font-weight: 500; box-shadow: 0 1px 3px rgba(0,0,0,0.15); height: 38px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa fa-info-circle me-1" style="font-size: 0.75rem;"></i>Detail
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.card-produk {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.btn-pesan, .btn-detail {
    font-size: 0.8rem;
    font-weight: 500;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}
</style>
