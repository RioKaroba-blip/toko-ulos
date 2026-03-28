@extends('layouts.frontend')
@section('title', 'Produk - Elizabeth Ulos')
@section('content')

<section class="py-4" style="background:#f8f8f8;border-bottom:1px solid #eee;">
    <div class="container text-center">
        <h1 style="font-family:'Playfair Display',serif;font-size:2rem;margin-bottom:5px;">Produk Kami</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form method="GET" action="{{ route('produk') }}" id="searchForm">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama Produk..." value="{{ request('search') }}" id="searchInput" style="border-color:#ddd;">
                        <button class="btn" type="submit" style="background:#6B1A1A;color:white;border-color:#6B1A1A;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 text-center">
                <a href="{{ route('produk') }}" class="btn me-2 mb-2"
                   style="{{ !request('kategori') ? 'background:#6B1A1A;color:white;' : 'background:white;color:#6B1A1A;' }} border:2px solid #6B1A1A;border-radius:25px;padding:8px 22px;font-weight:500;text-decoration:none;">Semua</a>
                @foreach($kategori as $kat)
                <a href="{{ route('produk', ['kategori' => $kat->id]) }}" class="btn me-2 mb-2"
                   style="{{ request('kategori') == $kat->id ? 'background:#6B1A1A;color:white;' : 'background:white;color:#6B1A1A;' }} border:2px solid #6B1A1A;border-radius:25px;padding:8px 22px;font-weight:500;text-decoration:none;">{{ $kat->nama_kategori }}</a>
                @endforeach
            </div>
        </div>
        <div class="row">
            @forelse($produk as $p)
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                <div style="border-radius:10px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.08);background:white;transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="position:relative;">
                        <img src="{{ $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/400x300' }}"
                             style="width:100%;height:220px;object-fit:cover;" alt="{{ $p->nama_produk }}">
                        @if($p->is_laris)
                        <span style="position:absolute;top:10px;left:10px;background:#FFD700;color:#6B1A1A;font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:20px;">LARIS</span>
                        @endif
                    </div>
                    <div style="padding:15px;">
                        <h6 style="font-weight:700;margin:0 0 4px;font-size:0.95rem;">{{ $p->nama_produk }}</h6>
                        <hr style="margin:8px 0;">
                        <p style="color:#6B1A1A;font-weight:600;margin-bottom:12px;font-size:0.9rem;">Rp{{ number_format($p->harga, 0, ',', '.') }}</p>
                        <div style="display:flex;gap:8px;">
                            <a href="https://wa.me/6285277669222?text=Saya ingin pesan {{ urlencode($p->nama_produk) }}" target="_blank"
                               style="flex:1;text-align:center;background:#25D366;color:white;padding:8px;border-radius:5px;text-decoration:none;font-size:0.82rem;font-weight:500;">Pesan</a>
                            <a href="{{ route('detail_produk', $p->id) }}"
                               style="flex:1;text-align:center;background:#1a73e8;color:white;padding:8px;border-radius:5px;text-decoration:none;font-size:0.82rem;font-weight:500;">Detail Produk <i class="fas fa-info-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-search fa-4x text-muted mb-3"></i>
                <p class="text-muted">Produk tidak ditemukan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
let searchTimeout;
document.getElementById('searchInput').addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        if (this.value.length >= 3 || this.value.length === 0) {
            document.getElementById('searchForm').submit();
        }
    }, 500);
});
</script>
@endsection
