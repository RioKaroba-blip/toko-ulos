<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Elizabeth Ulos - Busana Adat Sumatra Utara')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #6B1A1A; --accent: #FFD700; }
        body { font-family: 'Poppins', sans-serif; color: #333; margin: 0; }
        .top-navbar { background:#fff; padding:10px 0; border-bottom:1px solid #eee; position:sticky; top:0; z-index:999; }
        .navbar-logo { width:45px; height:45px; border-radius:50%; object-fit:cover; margin-right:10px; border:2px solid var(--primary); }
        .navbar-brand-text { font-weight:700; font-size:1rem; letter-spacing:1px; color:#111; }
        .nav-links a { text-decoration:none; color:#333; font-weight:500; font-size:0.9rem; padding:6px 14px; border-radius:4px; transition:all 0.2s; }
        .nav-links a:hover { color:var(--primary); }
        .nav-links a.active { background:var(--primary); color:white !important; border-radius:4px; }
        .main-footer { background:#1a1a1a; color:white; padding:50px 0 20px; }
        .footer-brand { color:var(--accent); font-weight:700; font-size:1rem; margin-bottom:8px; }
        .footer-desc { color:#aaa; font-size:0.85rem; margin-bottom:15px; line-height:1.6; }
        .footer-phone { font-size:1.8rem; font-weight:700; margin:10px 0 5px; }
        .footer-email a { color:#ccc; text-decoration:none; font-size:0.9rem; }
        .footer-sosmed-label { color:var(--accent); font-weight:600; margin-top:15px; margin-bottom:10px; font-size:0.9rem; }
        .sosmed-icons a { color:white; font-size:1.4rem; margin-right:12px; text-decoration:none; }
        .sosmed-icons a:hover { color:var(--accent); }
        .main-footer hr { border-color:rgba(255,255,255,0.15); margin-top:30px; }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="top-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('upload/profile/Ellipse.png') }}" class="navbar-logo" alt="Logo"
                     onerror="this.src='https://ui-avatars.com/api/?name=E&background=6B1A1A&color=fff'">
                <span class="navbar-brand-text">ELIZABETH ULOS</span>
            </a>
            <div class="nav-links d-flex align-items-center gap-1">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('tentang_kami') }}" class="{{ request()->routeIs('tentang_kami') ? 'active' : '' }}">Tentang Kami</a>
                <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">Produk</a>
                <a href="{{ route('ulasan') }}" class="{{ request()->routeIs('ulasan') ? 'active' : '' }}">Ulasan</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dasbor Admin</a>
                @else
                    <a href="{{ route('login') }}">Login Admin</a>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p class="footer-brand">ELIZABETH ULOS</p>
                    <p class="footer-desc">Toko Yang Menyediakan Berbagai Ulos Yang Dapat Dibeli Dan Menyediakan Layanan Pemesanan Dari Luar Pulau</p>
                    <p class="footer-phone">+62 852-7766-9222</p>
                    <p class="footer-email"><a href="mailto:ElizabethUloss@gmail.com">ElizabethUloss@gmail.com</a></p>
                    <p class="footer-sosmed-label">Temukan Lebih Banyak Pada Media Sosial Kami :</p>
                    <div class="sosmed-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <iframe src="https://maps.google.com/maps?q=2.362750,99.129306&output=embed"
                        width="100%" height="220" style="border:0;border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <hr>
            <p style="text-align:center;color:#aaa;margin:0;font-size:0.85rem;">© {{ date('Y') }} All Rights Reserved</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
