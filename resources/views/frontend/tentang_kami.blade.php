@extends('layouts.frontend')
@section('title', 'Tentang Kami - Elizabeth Ulos')
@section('content')

<section>
    <div id="heroCarouselTentang" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarouselTentang" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarouselTentang" data-bs-slide-to="1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/Toba_Batak.jpg') }}" class="d-block w-100" style="height:500px;object-fit:cover;" loading="lazy">
                <div class="carousel-caption d-none d-md-block" style="text-align:left;bottom:40px;left:60px;right:auto;">
                    <h1 style="font-family:'Playfair Display',serif;font-size:2.5rem;font-weight:700;">Selamat Datang Di Halaman Tentang Toko</h1>
                    <p style="opacity:0.85;font-size:0.9rem;">Berisi Informasi Menarik Dari Toko Yang Kami Sajikan Mulai Dari Partonun, Hingga Detail Toko</p>
                    <div style="display:flex;gap:15px;margin-top:20px;">
                        <a href="{{ route('produk') }}" style="background:#6B1A1A;color:white;padding:12px 28px;border-radius:4px;text-decoration:none;font-weight:500;">Menjadi Penjelajah</a>
                        <a href="#tentang" style="background:transparent;color:white;border:2px solid white;padding:12px 28px;border-radius:4px;text-decoration:none;font-weight:500;">Lihat Tentang Toko</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/hero.jpg') }}" class="d-block w-100" style="height:500px;object-fit:cover;" loading="lazy">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="font-family:'Playfair Display',serif;font-size:2.5rem;font-weight:700;">Elizabeth Ulos</h1>
                    <p>Toko ulos tradisional Batak terbaik</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarouselTentang" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarouselTentang" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<section id="tentang" class="py-5">
    <div class="container">
        <h2 style="text-align:center;font-family:'Playfair Display',serif;font-size:2rem;margin-bottom:20px;">Partonun Elizabeth Ulos</h2>
        <p style="text-align:center;color:#555;max-width:800px;margin:0 auto 40px;line-height:1.8;">
            Partonun Adalah Penjaga Budaya Yang Bekerja Demi Kelangsungan Warisan Budaya, Menjaga Filosofi Hidup Orang Batak, Serta Kemahiran Tradisional Tenun Tradisional Adalah Salah Satu Bidang Di Mana Pengetahuan Berharga Diwariskan Dari Para Ibu Ke Anak-Anak Perempuan Mereka Secara Turun-Temurun. Dan Saat Ini Dengan Dedikasinya Yang Luar Biasa Dalam Menjaga Dan Mempromosikan Budaya Batak Melalui Seni Tenun Ulos, Elizabeth Ulos Telah Membantu Memastikan Bahwa Warisan Budaya Yang Berharga Ini Akan Terus Hidup Dan Diperkaya Untuk Generasi Mendatang. Perannya Sebagai Penjaga Budaya Memberikan Inspirasi Bagi Kita Semua Untuk Menghargai Dan Melindungi Warisan Budaya Yang Ada Di Masyarakat Kita
        </p>
        <div class="row justify-content-center">
            @foreach($featuredProducts->take(2) as $produk)
            <div class="col-md-5 mb-4">
                <div style="border-radius:10px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.1);">
                    <img src="{{ $produk->gambar ? asset('upload/produk/'.$produk->gambar) : 'https://via.placeholder.com/400x300' }}"
                         style="width:100%;height:220px;object-fit:cover;" alt="{{ $produk->nama_produk }}">
                    <div style="padding:20px;">
                        <h5 style="font-family:'Playfair Display',serif;font-weight:700;">{{ $produk->nama_produk }}</h5>
                        <p style="color:#666;font-size:0.9rem;">{{ $produk->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section style="background:url('{{ asset('images/Toba_Batak.jpg') }}') center/cover no-repeat;position:relative;padding:80px 0;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.65);"></div>
    <div class="container" style="position:relative;">
        <h2 style="color:white;font-family:'Playfair Display',serif;font-size:2.5rem;font-weight:700;margin-bottom:15px;">Detail Toko<br>Elizabeth Ulos</h2>
        <p style="color:rgba(255,255,255,0.85);font-size:1rem;">Memuat Informasi Yang Dapat Kita Ketahui<br>Secara Spesifik</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div style="display:flex;gap:15px;align-items:flex-start;">
                    <i class="fas fa-question-circle fa-2x" style="color:#333;margin-top:4px;"></i>
                    <div>
                        <h5 style="font-weight:700;margin-bottom:10px;">Sejarah Singkat</h5>
                        <p style="color:#666;font-size:0.9rem;line-height:1.7;">Elizabeth Ulos Pertama Sekali Berdiri Pada Tahun 2018. Nama Elizabeth Ulos Sendiri Diambil Dari Nama Putri Bungsu Owner Yaitu Elizabeth. Sedangkan Ulos Sendiri Diambil Dari Jenis Produk Yang Diperjualbelikan Pada Toko Ini.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div style="display:flex;gap:15px;align-items:flex-start;">
                    <i class="fas fa-clock fa-2x" style="color:#333;margin-top:4px;"></i>
                    <div>
                        <h5 style="font-weight:700;margin-bottom:10px;">Jam Operasional</h5>
                        <p style="color:#666;font-size:0.9rem;line-height:1.7;">Jam Operasional Pada Toko Elizabeth Ulos Ialah Dari Jam 08.00 WIB S/D 22.00 WIB Pada Hari Senin Sampai Sabtu. Sedangkan Pada Hari Minggu, Elizabeth Ulos Tidak Beroperasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div style="display:flex;gap:15px;align-items:flex-start;">
                    <i class="fas fa-map-marker-alt fa-2x" style="color:#333;margin-top:4px;"></i>
                    <div>
                        <h5 style="font-weight:700;margin-bottom:10px;">Lokasi</h5>
                        <p style="color:#666;font-size:0.9rem;line-height:1.7;">Elizabeth Ulos Adalah UMKM Yang Berlokasi Di Desa Sirongit, Sitoluama, Kabupaten Toba Samosir, Sumatera Utara.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
