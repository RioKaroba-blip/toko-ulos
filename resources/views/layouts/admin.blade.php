<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Elizabeth Ulos')</title>
    <meta name="description" content="Admin Dashboard - Elizabeth Ulos">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #D2691E;
            --sidebar-width: 260px;
        }
        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; margin: 0; padding: 0; min-height: 100vh; }
        .sidebar { position: fixed; top: 0; left: 0; height: 100vh; width: var(--sidebar-width); background: linear-gradient(180deg, var(--primary-color) 0%, #5D2E0C 100%); color: white; padding-top: 20px; z-index: 1000; overflow-y: auto; box-shadow: 2px 0 10px rgba(0,0,0,0.1); }
        .sidebar-brand { font-size: 1.5rem; font-weight: 700; padding: 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 10px; }
        .sidebar-menu { list-style: none; padding: 0; margin: 0; }
        .sidebar-menu li { margin: 0; }
        .sidebar-menu a { display: flex; align-items: center; padding: 14px 20px; color: rgba(255,255,255,0.75); text-decoration: none; transition: all 0.3s; border-left: 3px solid transparent; font-size: 0.95rem; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background-color: rgba(255,255,255,0.15); color: white; border-left-color: var(--secondary-color); }
        .sidebar-menu i { margin-right: 12px; width: 20px; text-align: center; }
        .main-content { margin-left: var(--sidebar-width); padding: 25px 30px; min-height: 100vh; background-color: #f8f9fa; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 15px rgba(0,0,0,0.05); margin-bottom: 20px; overflow: hidden; }
        .card-header { background-color: white; border-bottom: 1px solid #eee; padding: 18px 20px; font-weight: 600; }
        .card-body { padding: 20px; }
        .stat-card { border-radius: 12px; padding: 24px; color: white; height: 100%; position: relative; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .stat-card::before { content: ''; position: absolute; top: -50%; right: -50%; width: 100%; height: 100%; background: rgba(255,255,255,0.1); border-radius: 50%; }
        .stat-card i { font-size: 2.5rem; opacity: 0.9; position: relative; z-index: 1; }
        .stat-card .number { font-size: 2.2rem; font-weight: 700; margin-top: 10px; position: relative; z-index: 1; }
        .stat-card p { margin: 0; font-size: 0.9rem; opacity: 0.9; position: relative; z-index: 1; }
        .stat-card a { color: white; opacity: 0.8; font-size: 0.85rem; position: relative; z-index: 1; }
        .stat-card a:hover { opacity: 1; text-decoration: underline; }
        .bg-primary-custom { background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); }
        .bg-success-custom { background: linear-gradient(135deg, #28a745 0%, #20c997 100%); }
        .bg-warning-custom { background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%); }
        .bg-info-custom { background: linear-gradient(135deg, #6f42c1 0%, #17a2b8 100%); }
        .table { margin-bottom: 0; }
        .table thead th { background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 14px 15px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .table tbody td { padding: 14px 15px; vertical-align: middle; color: #495057; }
        .table tbody tr:hover { background-color: #f8f9fa; }
        .table-hover tbody tr:hover { background-color: #f1f3f5; }
        .btn-primary { background-color: var(--primary-color); border-color: var(--primary-color); }
        .btn-primary:hover { background-color: var(--secondary-color); border-color: var(--secondary-color); }
        .btn { border-radius: 6px; padding: 8px 16px; font-weight: 500; transition: all 0.3s; }
        .btn-sm { padding: 5px 10px; font-size: 0.85rem; }
        .top-navbar { background-color: white; padding: 15px 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 25px; margin-left: var(--sidebar-width); border-bottom: 1px solid #eee; }
        .top-navbar h4 { margin: 0; color: var(--primary-color); font-weight: 600; }
        .badge { padding: 5px 10px; font-weight: 500; font-size: 0.8rem; }
        .alert { border-radius: 8px; border: none; }
        .alert-success { background-color: #d1e7dd; color: #0f5132; }
        .form-control, .form-select { border-radius: 8px; padding: 10px 15px; border: 1px solid #ced4da; }
        .form-control:focus, .form-select:focus { border-color: var(--primary-color); box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.15); }
        .table tbody img { border: 2px solid #eee; }
        .action-buttons { display: flex; gap: 5px; }
        .action-buttons .btn { padding: 4px 8px; }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-gem me-2"></i>{{ Auth::user()->owner_name ?? 'Elizabeth Ulos' }}
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i>Produk
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>Kategori
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ulasan.index') }}" class="{{ request()->routeIs('admin.ulasan.*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>Ulasan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fas fa-user"></i>Profil Owner
                </a>
            </li>
            <li>
                <a href="{{ route('admin.password') }}" class="{{ request()->routeIs('admin.password') ? 'active' : '' }}">
                    <i class="fas fa-lock"></i>Ubah Password
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i>Lihat Website
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Top Navbar -->
    <div class="top-navbar d-flex justify-content-between align-items-center">
        <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
        <div class="d-flex align-items-center">
            <span class="me-3 text-muted">Welcome, {{ Auth::user()->name }}</span>
            @if(Auth::user()->owner_photo)
            <img src="{{ asset('upload/profile/' . Auth::user()->owner_photo) }}"
                 alt="Admin"
                 class="rounded-circle"
                 style="width:40px; height:40px; border:2px solid var(--primary-color); object-fit:cover;">
            @else
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=8B4513&color=fff"
                 alt="Admin"
                 class="rounded-circle"
                 style="width:40px; height:40px; border:2px solid var(--primary-color);">
            @endif
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
