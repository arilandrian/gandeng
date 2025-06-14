<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'GANDENG')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    
    <style>
        :root {
            --primary-color: #002D72;
            --secondary-color: #4DB6AC;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700 !important;
            font-size: 1.5rem !important;
            color: var(--primary-color) !important;
        }
        .footer {
            background-color: #00214d; /* Sedikit lebih gelap dari primary untuk kontras */
            color: white;
            padding: 40px 0 20px 0;
            font-size: 0.9rem;
        }
        .footer h5 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #fff;
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer a:hover {
            color: var(--secondary-color);
        }
        .btn-primary {
             background-color: var(--primary-color);
             border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #001f4d; /* Warna primary lebih gelap */
            border-color: #001f4d;
        }
    </style>
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('landing') }}">
                        GANDENG
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('campaigns.index') }}">Jelajahi Program</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                                </li>
                                <li class="nav-item ms-2">
                                    <a class="btn btn-primary" href="{{ route('register.choice') }}" role="button">Gabung Sekarang</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @if(Auth::user()->role == 'donatur')
                                            <a class="dropdown-item" href="{{ route('donatur.dashboard') }}">Dashboard Saya</a>
                                        @elseif(Auth::user()->role == 'komunitas')
                                            <a class="dropdown-item" href="{{ route('komunitas.dashboard') }}">Dashboard Saya</a>
                                        @elseif(Auth::user()->role == 'admin')
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Saya</a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        <footer class="footer mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mb-4">
                        <h5>GANDENG</h5>
                        <p class="text-white-50">Platform kolaborasi sosial untuk mencapai Tujuan Pembangunan Berkelanjutan (SDGs) melalui kemitraan.</p>
                    </div>
                    <div class="col-md-2 offset-md-1 mb-4">
                        <h5>Navigasi</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('landing') }}">Beranda</a></li>
                            <li><a href="{{ route('campaigns.index') }}">Program</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5>Kontak</h5>
                        <ul class="list-unstyled text-white-50">
                            <li><i class="fas fa-map-marker-alt me-2"></i> Kendari, Sulawesi Tenggara</li>
                            <li><i class="fas fa-envelope me-2"></i> hello@gandeng.org</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center text-white-50 pt-3 mt-3 border-top border-secondary">
                    &copy; {{ date('Y') }} GANDENG. All Rights Reserved.
                </div>
            </div>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>