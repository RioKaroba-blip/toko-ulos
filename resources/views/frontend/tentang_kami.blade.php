@extends('layouts.frontend')

@section('title', 'Tentang Kami - Elizabeth Ulos')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="font-display">Tentang Kami</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Sejarah -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4">
<img src="{{ asset('build/assets/elisabeth.jpg') }}" 
                     alt="Sejarah Elizabeth Ulos" 
                     class="img-fluid rounded shadow w-100"
                     style="max-height: 280px; object-fit: cover; object-position: top;">
            </div>
            <div class="col-lg-6 offset-lg-1">
                <h2 class="font-display mb-4">Sejarah Toko</h2>
                <p class="lead">Elizabeth Ulos didirikan dengan misi melestarikan kekayaan budaya Batak melalui busana adat tradisional.</p>
                <p>Selama bertahun-tahun, kami telah menjadi tujuan utama bagi masyarakat yang mencari busana adat berkualitas tinggi. Kami bekerja langsung dengan pengrajin ulos dan songket terbaik di Sumatra Utara untuk memastikan setiap produk yang kami tawarkan adalah karya autentik dengan kualitas terbaik.</p>
                <p>Perjalanan kami dimulai dari sebuah toko kecil di Pematangsiantar, dan kini telah berkembang menjadi toko busana adat terpercaya yang melayani pelanggan dari seluruh Indonesia.</p>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <i class="fas fa-bullseye fa-3x text-primary"></i>
                        </div>
                        <h3 class="font-display text-center mb-3">Visi</h3>
                        <p class="text-center">Menjadi toko busana adat terpercaya yang melestarikan dan memperkenalkan kekayaan budaya Sumatra Utara kepada seluruh Indonesia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <i class="fas fa-tasks fa-3x text-primary"></i>
                        </div>
                        <h3 class="font-display text-center mb-3">Misi</h3>
                        <ul class="text-left">
                            <li>Menyediakan produk busana adat berkualitas tinggi</li>
                            <li>Membantu pengrajin lokal meningkatkan ekonomi</li>
                            <li>Melestarikan tradisi budaya Batak</li>
                            <li>Memberikan pelayanan terbaik kepada pelanggan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jam Operasional -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Jam Operasional</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><strong>Senin - Jumat</strong></td>
                                    <td class="text-end">08:00 - 21:00 WIB</td>
                                </tr>
                                <tr>
                                    <td><strong>Sabtu</strong></td>
                                    <td class="text-end">09:00 - 22:00 WIB</td>
                                </tr>
                                <tr>
                                    <td><strong>Minggu</strong></td>
                                    <td class="text-end">10:00 - 20:00 WIB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lokasi -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Lokasi Kami</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-4">
                        <h5 class="mb-3"><i class="fas fa-map-marker-alt text-primary me-2"></i>Alamat Toko</h5>
                        <p>Elizabeth Ulos<br>
                        Jl. P. Boraha No. XX<br>
                        Pematangsiantar, Sumatra Utara<br>
                        Indonesia</p>
                        
                        <h5 class="mb-3 mt-4"><i class="fas fa-phone text-primary me-2"></i>Kontak</h5>
                        <p>
                            WhatsApp: +62 812 3456 7890<br>
                            Email: info@elizabethulos.com
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.447856398!2d99.0685!3d2.9597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwNTcnMjguNCJTIDk5wrA0MScxMi42IkVyaWViZXRoIFVsb3M!5e0!3m2!1sid!2sid!4v1234567890!5m2!1sid!2sid" 
                                width="100%" 
                                height="300" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profil Owner -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Profil Owner</h2>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 text-center mb-4">
                <img src="https://via.placeholder.com/300x300?text=Owner" 
                     alt="Profil Owner" 
                     class="img-fluid rounded-circle shadow"
                     style="width: 250px; height: 250px; object-fit: cover;">
            </div>
            <div class="col-lg-6">
                <h3 class="font-display">Elizabeth Turnip</h3>
                <p class="lead text-muted">Founder & Owner</p>
                <p>Sebagai founder Elizabeth Ulos, saya berkomitmen untuk melestarikan warisan budaya bangsa melalui busana adat tradisional. Dengan dukungan tim yang professional, kami siap memberikan yang terbaik bagi pelanggan.</p>
                <div class="social-links mt-3">
                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

