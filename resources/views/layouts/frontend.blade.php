<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Elizabeth Ulos - Busana Adat Sumatra Utara')</title>
    <meta name="description" content="Elizabeth Ulos - Toko Busana Adat Terpercaya dari Sumatra Utara">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #6B1A1A;
            --accent-color: #FFD700;
            --text-dark: #1a1a1a;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
        }
        /* Navbar */
        .top-navbar {
            background: #fff;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .top-navbar .brand {
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 1px;
            color: #111;
            text-decoration: none;
        }
        .top-navbar .logo-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .top-navbar .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 6px 14px;
            border-radius: 4px;
            transition: all 0.2s;
        }
        .top-navbar .nav-links a:hover {
            color: var(--primary-color);
        }
        .top-navbar .nav-links a.active {
            background: var(--primary-color);
            color: white !important;
        }
        /* Footer */
        .main-footer {
            background: #1a1a1a;
            color: white;
            padding: 50px 0 20px;
        }
        .main-footer .footer-brand {
            color: var(--accent-color);
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .main-footer .footer-phone {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0 5px;
        }
        .main-footer .footer-email a {
            color: #ccc;
            text-decoration: none;
        }
        .main-footer .footer-sosmed-label {
            color: var(--accent-color);
            font-weight: 600;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .main-footer .sosmed-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            text-decoration: none;
        }
        .main-footer .sosmed-icons a:hover {
            color: var(--accent-color);
        }
        .main-footer hr {
            border-color: rgba(255,255,255,0.2);
            margin-top: 30px;
        }
        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #8B2020;
            border-color: #8B2020;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Navigation -->
    <nav class="top-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <!-- Logo + Brand -->
            <a href="{{ route('home') }}" class="d-flex align-items-center brand text-decoration-none">
                <img src="{{ asset('build/assets/logo.png') }}" class="logo-img" alt="Logo"
                     onerror="this.style.display='none'">
                ELIZABETH ULOS
            </a>
            <!-- Nav Links -->
            <div class="nav-links d-flex align-items-center gap-1">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('tentang_kami') }}" class="{{ request()->routeIs('tentang_kami') ? 'active' : '' }}">Tentang Kami</a>
                <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">Produk</a>
                <a href="{{ route('ulasan') }}" class="{{ request()->routeIs('ulasan') ? 'active' : '' }}">Ulasan</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login Admin</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p class="footer-brand">ELIZABETH ULOS</p>
                    <p class="footer-phone">+62 852-7766-9222</p>
                    <p class="footer-email">
                        <a href="mailto:ElizabethUloss@gmail.com">ElizabethUloss@gmail.com</a>
                    </p>
                    <p class="footer-sosmed-label">Temukan Lebih Banyak Pada Media Sosial Kami :</p>
                    <div class="sosmed-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <iframe
                        src="https://maps.google.com/maps?q=2.362750,99.129306&output=embed"
                        width="100%"
                        height="200"
                        style="border:0; border-radius:8px;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
            <hr>
            <p style="text-align:center; color:#aaa; margin:0;">© {{ date('Y') }} All Rights Reserved</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>