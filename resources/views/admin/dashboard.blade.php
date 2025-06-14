<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-icon">G</span>
                <span class="logo-text">ANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="#"><i class="fas fa-check-circle"></i> Validasi Kampanye</a> <a href="#"><i class="fas fa-users-cog"></i> Kelola Pengguna</a> <a href="#"><i class="fas fa-chart-bar"></i> Statistik Sistem</a> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <main class="admin-dashboard-container">
        <div class="container">
            <div class="admin-header">
                <h1><i class="fas fa-cogs"></i> Selamat Datang, Admin!</h1>
                <p>Pantau dan kelola seluruh aktivitas platform GANDENG</p>
            </div>

            <div class="summary-cards-admin">
                <div class="summary-card-admin campaigns">
                    <i class="fas fa-bullhorn icon"></i>
                    <span class="value">125</span>
                    <span class="label">Total Kampanye</span>
                </div>
                <div class="summary-card-admin donations">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <span class="value">Rp 500 Jt</span>
                    <span class="label">Total Donasi Terkumpul</span>
                </div>
                <div class="summary-card-admin users">
                    <i class="fas fa-users icon"></i>
                    <span class="value">1.500</span>
                    <span class="label">Total Pengguna Aktif</span>
                </div>
                <div class="summary-card-admin pending">
                    <i class="fas fa-clock icon"></i>
                    <span class="value">7</span>
                    <span class="label">Kampanye Menunggu Validasi</span>
                </div>
            </div>

            <section class="section-content">
                <div class="section-header-admin">
                    <h2><i class="fas fa-clipboard-list"></i> Kampanye Terbaru</h2>
                    <a href="#" class="btn-view-all">Lihat Semua Kampanye</a>
                </div>
                <div class="admin-table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Judul Kampanye</th>
                                <th>Komunitas</th>
                                <th>Status</th>
                                <th>Tanggal Ajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Program Literasi Anak Papua</td>
                                <td>Yayasan Pustaka Ceria</td>
                                <td><span class="status-badge pending">Menunggu Validasi</span></td>
                                <td>01 Jun 2025</td>
                                <td>
                                    <a href="#" class="btn-table-action approve">Setujui</a>
                                    <a href="#" class="btn-table-action reject">Tolak</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Bantuan Sembako Korban Banjir</td>
                                <td>Relawan Peduli Sesama</td>
                                <td><span class="status-badge active">Aktif</span></td>
                                <td>28 Mei 2025</td>
                                <td>
                                    <a href="#" class="btn-table-action">Lihat Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Penanaman Mangrove Pesisir</td>
                                <td>Komunitas Lestari Lingkungan</td>
                                <td><span class="status-badge completed">Selesai</span></td>
                                <td>20 Mei 2025</td>
                                <td>
                                    <a href="#" class="btn-table-action">Lihat Laporan</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="section-content">
                <div class="section-header-admin">
                    <h2><i class="fas fa-users"></i> Pengguna Terbaru</h2>
                    <a href="#" class="btn-view-all">Lihat Semua Pengguna</a>
                </div>
                <div class="admin-table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Donatur Baru 1</td>
                                <td>donatur1@example.com</td>
                                <td>Donatur</td>
                                <td>05 Jun 2025</td>
                                <td><a href="#" class="btn-table-action">Lihat Profil</a></td>
                            </tr>
                            <tr>
                                <td>Komunitas XYZ</td>
                                <td>komunitasxyz@example.com</td>
                                <td>Komunitas</td>
                                <td>03 Jun 2025</td>
                                <td><a href="#" class="btn-table-action">Lihat Profil</a></td>
                            </tr>
                            <tr>
                                <td>Donatur Lama 2</td>
                                <td>donatur2@example.com</td>
                                <td>Donatur</td>
                                <td>30 Mei 2025</td>
                                <td><a href="#" class="btn-table-action">Lihat Profil</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="{{ route('landing') }}" class="logo">
                        <span class="logo-icon">G</span>
                        <span class="logo-text">ANDENG</span>
                    </a>
                    <p>Platform kolaborasi sosial untuk Sulawesi Tenggara</p>
                </div>
                <div class="footer-links">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="#">Admin Docs</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Bantuan</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> admin@gandeng.org</li>
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
        // JavaScript untuk menu toggle pada navbar (dari styles.css)
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');

            if (menuToggle && navLinks) {
                menuToggle.addEventListener('click', () => {
                    navLinks.classList.toggle('show');
                });
            }
        });
    </script>
</body>
</html>