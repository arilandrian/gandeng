<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Saya - GANDENG</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-programs.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('komunitas.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('komunitas.my_programs') }}" class="active"><i class="fas fa-project-diagram"></i> Program Saya</a>
                <a href="{{ route('komunitas.create_campaign') }}"><i class="fas fa-plus-circle"></i> Buat Kampanye</a>
                <a href="#"><i class="fas fa-chart-line"></i> Laporan Anggaran</a> <a href="#"><i class="fas fa-comments"></i> Ulasan Donatur</a> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <main class="dashboard-content">
        <div class="container">
            <header class="page-header">
                <div>
                    <h1>Program Saya</h1>
                    <p>Daftar kampanye yang telah Anda buat</p>
                </div>
                <a href="{{ route('komunitas.create_campaign') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Kampanye Baru</a>
            </header>

            <div class="programs-table">
                <div class="table-header">
                    <div class="col-title">Judul Program</div>
                    <div class="col-status">Status</div>
                    <div class="col-donation">Total Donasi</div>
                    <div class="col-date">Tanggal Mulai</div>
                    <div class="col-actions">Aksi</div>
                </div>

                <div class="table-row">
                    <div class="col-title">Sekolah Anak Pulau</div>
                    <div class="col-status">
                        <span class="status-badge ongoing">Berlangsung</span>
                    </div>
                    <div class="col-donation">Rp 3.500.000</div>
                    <div class="col-date">01 Mei 2025</div>
                    <div class="col-actions">
                        <a href="{{ route('campaigns.show') }}" class="btn btn-outline">Lihat Detail</a>
                        <a href="#" class="btn btn-outline">Edit</a>
                    </div>
                </div>

                <div class="table-row">
                    <div class="col-title">Air Bersih Desa Lemo</div>
                    <div class="col-status">
                        <span class="status-badge completed">Selesai</span>
                    </div>
                    <div class="col-donation">Rp 5.200.000</div>
                    <div class="col-date">20 Mar 2025</div>
                    <div class="col-actions">
                        <a href="{{ route('campaigns.show') }}" class="btn btn-outline">Lihat Detail</a>
                        <a href="#" class="btn btn-outline report">Lihat Laporan</a>
                    </div>
                </div>

                <div class="table-row">
                    <div class="col-title">Bantuan Medis Lansia</div>
                    <div class="col-status">
                        <span class="status-badge ongoing">Berlangsung</span>
                    </div>
                    <div class="col-donation">Rp 1.750.000</div>
                    <div class="col-date">10 Jun 2025</div>
                    <div class="col-actions">
                        <a href="{{ route('campaigns.show') }}" class="btn btn-outline">Lihat Detail</a>
                        <a href="#" class="btn btn-outline">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
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