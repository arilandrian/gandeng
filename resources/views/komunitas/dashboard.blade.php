<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Komunitas - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/komunitas-dashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('komunitas.dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="#"><i class="fas fa-plus-circle"></i> Buat Program</a>
                <a href="#"><i class="fas fa-list-alt"></i> Program Saya</a>
                <a href="#"><i class="fas fa-chart-line"></i> Laporan Anggaran</a>
                <a href="#"><i class="fas fa-comments"></i> Ulasan Donatur</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <main class="dashboard-container">
        <div class="container">
            <div class="dashboard-header">
                <h1><i class="fas fa-chart-bar"></i> Dashboard Komunitas</h1>
                <p>Pantau kinerja program sosial Anda dan kelola donasi yang diterima</p>
            </div>

            <div class="summary-cards">
                <div class="summary-card">
                    <i class="fas fa-hands-helping"></i>
                    <div class="card-content">
                        <h3>Total Program Aktif</h3>
                        <span class="number">3</span>
                    </div>
                </div>
                <div class="summary-card">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div class="card-content">
                        <h3>Total Donasi Diterima</h3>
                        <span class="number">Rp 12.500.000</span>
                    </div>
                </div>
                <div class="summary-card">
                    <i class="fas fa-star-half-alt"></i>
                    <div class="card-content">
                        <h3>Rating Rata-rata</h3>
                        <span class="number">4.7 <i class="fas fa-star"></i></span>
                    </div>
                </div>
            </div>

            <section class="recent-donations">
                <h2>Donasi Terbaru</h2>
                <div class="donation-list">
                    <div class="donation-item">
                        <div class="donation-info">
                            <h3>Donatur Anonim</h3>
                            <p>Rp 500.000</p>
                        </div>
                        <span class="donation-date">15 Jun 2023</span>
                    </div>
                    <div class="donation-item">
                        <div class="donation-info">
                            <h3>Budi Santoso</h3>
                            <p>Rp 250.000</p>
                        </div>
                        <span class="donation-date">14 Jun 2023</span>
                    </div>
                    <div class="donation-item">
                        <div class="donation-info">
                            <h3>Siti Aminah</h3>
                            <p>Rp 100.000</p>
                        </div>
                        <span class="donation-date">13 Jun 2023</span>
                    </div>
                    </div>
                <a href="#" class="btn-primary">Lihat Semua Donasi</a>
            </section>

            <section class="program-statistics">
                <h2>Statistik Program</h2>
                <div class="program-stats-grid">
                    <div class="program-stat-card">
                        <h3>Penghijauan Kota Kendari</h3>
                        <div class="stat-item">
                            <i class="fas fa-bullhorn"></i>
                            <span>Target Donasi: Rp 10.000.000</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Terkumpul: Rp 7.500.000</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-percentage"></i>
                            <span>75% Tercapai</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Berakhir: 30 Jun 2023</span>
                        </div>
                    </div>
                    <div class="program-stat-card">
                        <h3>Bantuan Pendidikan Anak Nelayan</h3>
                        <div class="stat-item">
                            <i class="fas fa-bullhorn"></i>
                            <span>Target Donasi: 50 Paket Alat Tulis</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Terkumpul: 35 Paket</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-percentage"></i>
                            <span>70% Tercapai</span>
                        </div>
                         <div class="stat-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Berakhir: 15 Jul 2023</span>
                        </div>
                    </div>
                    </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="{{ route('landing') }}" class="logo">
                        <span class="logo-text">GANDENG</span>
                    </a>
                    <p>Platform kolaborasi sosial untuk Sulawesi Tenggara</p>
                </div>
                <div class="footer-links">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> donatur@gandeng.org</li>
                        <li><i class="fas fa-phone"></i> (0401) 123 4567</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 GANDENG. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');

            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('show');
            });
        });
    </script>
</body>
</html>