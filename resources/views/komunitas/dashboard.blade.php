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
    {{-- Jika Anda memiliki CSS tambahan untuk dashboard yang ingin dipisah, tambahkan di sini --}}
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('komunitas.dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('komunitas.create-campaign') }}"><i class="fas fa-plus-circle"></i> Buat Program</a>
                <a href="{{ route('komunitas.my-programs') }}"><i class="fas fa-list-alt"></i> Program Saya</a>
                <a href="{{ route('komunitas.donations.index') }}"><i class="fas fa-donate"></i> Donasi Masuk</a>
                <a href="{{ route('komunitas.budget-report') }}"><i class="fas fa-chart-line"></i> Laporan Anggaran</a>
                <a href="{{ route('komunitas.donor-reviews') }}"><i class="fas fa-comments"></i> Ulasan Donatur</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                {{-- Nama Komunitas dinamis --}}
                <h1>Halo, Komunitas <span>{{ $komunitas->nama_organisasi }}</span></h1>
                <p>Selamat datang di dashboard komunitas pelaksana GANDENG</p>
            </div>

            <div class="stats-summary"> {{-- Menggunakan kelas stats-summary sesuai CSS --}}
                <div class="stat-card">
                    <i class="fas fa-hands-helping stat-icon"></i>
                    <div class="stat-content">
                        <h3>Total Program Aktif</h3>
                        <p class="number">{{ $totalActivePrograms }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-hand-holding-usd stat-icon"></i>
                    <div class="stat-content">
                        <h3>Total Donasi Diterima</h3>
                        {{-- Menggunakan number_format untuk format mata uang --}}
                        <p class="number">Rp {{ number_format($totalDonationAmount, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="stat-card highlight"> {{-- Menambahkan highlight sesuai gambar --}}
                    <i class="fas fa-star-half-alt stat-icon"></i>
                    <div class="stat-content">
                        <h3>Rating Rata-rata</h3>
                        <p class="number">{{ $averageRating }} <i class="fas fa-star"></i></p>
                    </div>
                </div>
            </div>

            <div class="action-section"> {{-- Menggunakan kelas action-section sesuai CSS --}}
                <a href="{{ route('komunitas.create-campaign') }}" class="btn-create">
                    <i class="fas fa-plus-circle"></i> Buat Kampanye Baru
                </a>
            </div>

            <section class="program-section"> {{-- Menggunakan program-section sesuai CSS --}}
                <h2><i class="fas fa-list-alt"></i> Program Saya</h2> {{-- Ubah judul --}}
                <div class="program-grid"> {{-- Menggunakan program-grid sesuai CSS --}}
                    @forelse($myPrograms as $program)
                        <div class="program-card">
                            {{-- Status program --}}
                            <span class="program-status {{ $program->status === 'active' ? 'active' : 'completed' }}">
                                {{ ucfirst($program->status) }}
                            </span>
                            <div class="program-content">
                                <h3>{{ $program->title }}</h3>
                                <div class="program-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> {{ $program->location }}</span>
                                    <span><i class="fas fa-tag"></i> {{ $program->category }}</span>
                                </div>

                                {{-- Progress Donasi --}}
                                @php
                                    $currentAmount = $program->donations
                                        ->where('status', 'completed')
                                        ->where('donation_type', 'money')
                                        ->sum('amount');
                                    $targetAmount = $program->target_amount; // Asumsi target_amount ada di model Campaign
                                    $progressPercentage =
                                        $targetAmount > 0 ? ($currentAmount / $targetAmount) * 100 : 0;
                                    $progressPercentage = min(100, round($progressPercentage)); // Batasi hingga 100%
                                @endphp
                                <div
                                    class="program-progress {{ $program->status === 'completed' ? 'completed' : '' }}">
                                    <div class="progress-info">
                                        <span>Terkumpul: Rp {{ number_format($currentAmount, 0, ',', '.') }}</span>
                                        <span>Target: Rp {{ number_format($targetAmount, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: {{ $progressPercentage }}%;"></div>
                                    </div>
                                    <div class="progress-percent">{{ $progressPercentage }}% Tercapai</div>
                                </div>

                                <div class="program-actions">
                                    {{-- Link ke Laporan Anggaran (jika ada) --}}
                                    <a href="{{ route('komunitas.budget-report', ['campaign_slug' => $program->slug]) }}"
                                        class="btn-manage">
                                        <i class="fas fa-file-invoice-dollar"></i> Kelola Laporan
                                    </a>
                                    {{-- Link ke Detail Kampanye --}}
                                    <a href="{{ route('campaigns.show', $program->slug) }}" class="btn-detail">
                                        <i class="fas fa-info-circle"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Anda belum memiliki program/kampanye yang terdaftar.</p>
                        <a href="{{ route('komunitas.create-campaign') }}" class="btn-primary"
                            style="margin-top: 20px;">
                            Buat Program Pertama Anda
                        </a>
                    @endforelse
                </div>
            </section>

            {{-- Hapus bagian recent-donations ini dari dashboard --}}
            {{-- <section class="recent-donations">
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
                <a href="{{ route('komunitas.donations.index') }}" class="btn-primary">Lihat Semua Donasi</a>
            </section> --}}

        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>GANDENG</h3>
                    <p>Platform kolaborasi sosial untuk mencapai Tujuan Pembangunan Berkelanjutan (SDGs) melalui
                        kemitraan.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="footer-links">
                    <h3>Link Cepat</h3>
                    <ul>
                        <li><a href="{{ route('landing') }}">Beranda</a></li>
                        <li><a href="{{ route('campaigns.index') }}">Program</a></li>
                        <li><a href="{{ route('komunitas.create-campaign') }}">Buat Program</a></li>
                        <li><a href="{{ route('komunitas.my-programs') }}">Program Saya</a></li>
                        <li><a href="{{ route('komunitas.donations.index') }}">Donasi Masuk</a></li>
                    </ul>
                </div>

                <div class="footer-contact">
                    <h3>Kontak Kami</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Sulawesi Tenggara, Kendari</li>
                        <li><i class="fas fa-phone"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope"></i> hello@gandeng.org</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 GANDENG. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                </div>
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
