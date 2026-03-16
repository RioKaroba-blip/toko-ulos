@extends('layouts.frontend')
@section('title', 'Produk - Elizabeth Ulos')
@section('content')
<!-- Filter Kategori -->
<section class="py-4">
    <div class="container">
        <!-- Search Form -->
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form method="GET" action="{{ route('produk') }}" id="searchForm">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari produk ulos..." value="{{ request('search') }}" id="searchInput">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
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
            </div>
        </div>
        <!-- Horizontal Filter Buttons -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="btn-group" role="group">
                    <a href="{{ route('produk') }}" class="btn btn-primary {{ !request('kategori') ? 'active' : '' }}">
                        Semua
                    </a>
                    @foreach($kategori as $kat)
                    <a href="{{ route('produk', ['kategori' => $kat->id]) }}" class="btn btn-primary {{ request('kategori') == $kat->id ? 'active' : '' }}">
                        {{ $kat->nama_kategori }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Products Grid -->
        <div class="row">
            @forelse($produk as $p)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                @include('components.product-card', [
                    'image' => $p->gambar ? asset('upload/produk/'.$p->gambar) : 'https://via.placeholder.com/400x300',
                    'nama_produk' => $p->nama_produk,
                    'harga' => $p->harga,
                    'kategori' => $p->kategori->nama_kategori ?? 'Ulos',
                    'link' => route('detail_produk', $p->id)
                ])
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-search fa-4x text-muted mb-3"></i>
                <p class="text-muted">Produk tidak ditemukan.</p>
            </div>
            @endforelse
        </div>
        <!-- Pagination -->
        @if(method_exists($produk, 'links'))
        <div class="row mt-4">
            <div class="col-12">
                {{ $produk->links() }}
            </div>
        </div>
        @endif
    </div>
</section>
@endsection