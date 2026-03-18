@extends('layouts.frontend')
@section('title', 'Produk - Elizabeth Ulos')
@section('content')

<section class="py-4" style="background:#f8f8f8; border-bottom:1px solid #eee;">
    <div class="container">
        <h1 style="font-family:'Playfair Display',serif; color:#6B1A1A; font-size:2rem; margin-bottom:5px;">Produk Kami</h1>
        <p style="color:#888; margin:0;">Temukan koleksi ulos terbaik dari Elizabeth Ulos</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form method="GET" action="{{ route('produk') }}" id="searchForm">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama produk..." value="{{ request('search') }}" id="searchInput" style="border-color:#ddd;">
                        <button class="btn" type="submit" style="background:#6B1A1A; color:white; border-color:#6B1A1A;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 text-center">
                <a href="{{ route('produk') }}" class="btn me-2 mb-2 {{ !request('kategori') ? 'btn-active-filter' : 'btn-outline-filter' }}"
                   style="{{ !request('kategori') ? 'background:#6B1A1A; color:white; border:2px solid #6B1A1A;' : 'background:white; color:#6B1A1A; border:2px solid #6B1A1A;' }} border-radius:25px; padding:8px 22px; font-weight:500; text-decoration:none;">
                    Semua
                </a>
                @foreach($kategori as $kat)
                <a href="{{ route('produk', ['kategori' => $kat->id]) }}" class="btn me-2 mb-2"
                   style="{{ request('kategori') == $kat->id ? 'background:#6B1A1A; color:white; border:2px solid #6B1A1A;' : 'background:white; color:#6B1A1A; border:2px solid #6B1A1A;' }} border-radius:25px; padding:8px 22px; font-weight:500; text-decoration:none;">
                    {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>

        <div class="row">
            @forelse($produk as $p)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div style="border-radius:10px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.08); background:white; transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="position:relative; overflow:hidden;">
                        <img src="{{ $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/400x300' }}"
                             style="width:100%; height:220px; object-fit:cover;" alt="{{ $p->nama_produk }}">
                        @if($p->is_laris)
                        <span style="position:absolute; top:10px; left:10px; background:#FFD700; color:#6B1A1A; font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;">LARIS</span>
                        @endif
                    </div>
                    <div style="padding:15px;">
                        <span style="background:#f5e6e6; color:#6B1A1A; font-size:0.75rem; padding:3px 10px; border-radius:20px;">{{ $p->kategori->nama_kategori ?? 'Ulos' }}</span>
                        <h6 style="font-weight:700; margin:10px 0 5px; font-size:0.95rem;">{{ $p->nama_produk }}</h6>
                        <p style="color:#6B1A1A; font-weight:600; margin-bottom:12px;">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('detail_produk', $p->id) }}" style="flex:1; text-align:center; background:#6B1A1A; color:white; padding:8px; border-radius:5px; text-decoration:none; font-size:0.85rem;">Detail</a>
                            <a href="https://wa.me/6285277669222?text=Saya ingin pesan {{ urlencode($p->nama_produk) }}" target="_blank" style="flex:1; text-align:center; background:#25D366; color:white; padding:8px; border-radius:5px; text-decoration:none; font-size:0.85rem;">Pesan</a>
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

        @if(method_exists($produk, 'links'))
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $produk->links() }}
            </div>
        </div>
        @endif
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