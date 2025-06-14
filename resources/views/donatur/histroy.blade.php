<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Donasi - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/donatur-history.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('donatur.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('campaigns.index') }}"><i class="fas fa-search"></i> Jelajahi Program</a>
                <a href="{{ route('donatur.donation_history') }}" class="active"><i class="fas fa-history"></i> Riwayat Donasi</a>
                <a href="{{ route('donatur.reviews_history') }}"><i class="fas fa-star"></i> Riwayat Ulasan Saya</a>
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

    <main class="history-container">
        <div class="container">
            <div class="history-header">
                <h1><i class="fas fa-history"></i> Riwayat Donasi Anda</h1>
                <p>Daftar lengkap donasi yang telah Anda berikan</p>
            </div>

            <div class="donation-history">
                <div class="donation-card">
                    <div class="donation-info">
                        <h3>Penghijauan Kota Kendari</h3>
                        <div class="donation-meta">
                            <span><i class="fas fa-calendar-alt"></i> 15 Jan 2023</span>
                            <span><i class="fas fa-tag"></i> Lingkungan</span>
                        </div>
                        <div class="donation-details">
                            <div class="detail-item">
                                <span>Jenis Donasi</span>
                                <strong>Uang</strong>
                            </div>
                            <div class="detail-item">
                                <span>Nilai Donasi</span>
                                <strong>Rp 100.000</strong>
                            </div>
                            <div class="detail-item">
                                <span>Status</span>
                                <strong class="status delivered">Tersalurkan</strong>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('campaigns.show') }}" class="btn-detail">Lihat Program</a>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h3>Bantuan Pendidikan Anak Nelayan</h3>
                        <div class="donation-meta">
                            <span><i class="fas fa-calendar-alt"></i> 22 Mar 2023</span>
                            <span><i class="fas fa-tag"></i> Pendidikan</span>
                        </div>
                        <div class="donation-details">
                            <div class="detail-item">
                                <span>Jenis Donasi</span>
                                <strong>Barang</strong>
                            </div>
                            <div class="detail-item">
                                <span>Nilai Donasi</span>
                                <strong>5 paket alat tulis</strong>
                            </div>
                            <div class="detail-item">
                                <span>Status</span>
                                <strong class="status received">Diterima</strong>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('campaigns.show') }}" class="btn-detail">Lihat Program</a>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h3>Kesehatan Pedesaan</h3>
                        <div class="donation-meta">
                            <span><i class="fas fa-calendar-alt"></i> 5 Mei 2023</span>
                            <span><i class="fas fa-tag"></i> Kesehatan</span>
                        </div>
                        <div class="donation-details">
                            <div class="detail-item">
                                <span>Jenis Donasi</span>
                                <strong>Uang</strong>
                            </div>
                            <div class="detail-item">
                                <span>Nilai Donasi</span>
                                <strong>Rp 250.000</strong>
                            </div>
                            <div class="detail-item">
                                <span>Status</span>
                                <strong class="status processing">Diproses</strong>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('campaigns.show') }}" class="btn-detail">Lihat Program</a>
                </div>
            </div>

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
</body>
</html>