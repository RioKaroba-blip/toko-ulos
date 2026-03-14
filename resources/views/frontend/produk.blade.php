@extends('layouts.frontend')

@section('title', 'Produk - Elizabeth Ulos')

@section('content')
<!-- No page header as requested -->

<!-- Filter Kategori -->
<section class="py-4">
    <div class="container">
                <!-- Search Form -->
                <div class="row mb-4">
                    <div class="col-md-6 offset-md-3">
                        <form method="GET" action="{{ route('frontend.produk') }}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari produk ulos..." value="{{ request('search') }}" id="searchInput">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <script>
                                document.getElementById('searchInput').addEventListener('input', function() {
                                    if (this.value.length > 2) {
                                        window.location.href = '{{ route('frontend.produk') }}?search=' + encodeURIComponent(this.value);
                                    }
                                });
                            </script>
                        </form>
                    </div>
                </div>

                <!-- Horizontal Filter Buttons -->
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <div class="btn-group" role="group">
                            <a href="{{ route('frontend.produk') }}" class="btn btn-maroon {{ !request('kategori') ? 'active' : '' }}">
                                Semua
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('frontend.produk', ['kategori' => $kat->id]) }}" class="btn btn-maroon {{ request('kategori') == $kat->id ? 'active' : '' }}">
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
                            'link' => route('frontend.detail', $p->id)
                        ])
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

