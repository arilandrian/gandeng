<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donatur - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/donatur-dashboard.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">GANDENG</a>
            <div class="nav-links">
                <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('campaigns.index') }}"><i class="fas fa-search"></i> Jelajahi Program</a>
                <a href="{{ route('donatur.history') }}"><i class="fas fa-history"></i> Riwayat Donasi</a>
                <a href="{{ route('donatur.reviews') }}"><i class="fas fa-star"></i> Ulasan Saya</a>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="dashboard-container">
        <div class="container">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <h1>Selamat datang, <span>{{ Auth::user()->name }}</span>!</h1>
                <p>Terima kasih telah berkontribusi dalam program-program sosial melalui GANDENG</p>
            </section>

            <!-- Stats Summary -->
            <section class="stats-summary">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Total Donasi</h3>
                        <p>Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Program Didukung</h3>
                        <p>{{ $jumlahCampaign }} Program</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Ulasan Dikirim</h3>
                        <p>{{ $jumlahUlasan }} Ulasan</p>
                    </div>
                </div>
            </section>

            <!-- Supported Programs -->
            <section class="program-section">
                <div class="section-header">
                    <h2><i class="fas fa-heart"></i> Program yang Pernah Didukung</h2>
                </div>
                
                @if($programDidukung->isEmpty())
                    <p class="no-programs">Anda belum mendukung program apapun. <a href="{{ route('campaigns.index') }}">Mulai berdonasi sekarang!</a></p>
                @else
                    <table class="program-table">
                        <thead>
                            <tr>
                                @foreach($programDidukung->take(3) as $program)
                                    <th>{{ $program->campaign->title ?? 'Program Dihapus' }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($programDidukung->take(3) as $program)
                                    <td>
                                        <div class="program-name">{{ $program->campaign->organization->name ?? 'Organisasi Tidak Diketahui' }}</div>
                                        <div class="program-location"><i class="fas fa-map-marker-alt"></i> {{ $program->campaign->location ?? 'Lokasi Tidak Diketahui' }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach($programDidukung->take(3) as $program)
                                    <td>
                                        <div class="program-date">{{ $program->tanggal_donasi_terakhir->format('d M Y') }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach($programDidukung->take(3) as $program)
                                    <td>
                                        <div class="donation-amount">Rp {{ number_format($program->total_donasi_per_campaign, 0, ',', '.') }} (Uang)</div>
                                        <div class="status">Selesai</div>
                                        <div class="action-buttons">
                                            <a href="{{ route('campaigns.show', $program->campaign_id) }}" class="btn btn-detail"><i class="fas fa-info-circle"></i> Lihat Detail</a>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                @endif
            </section>

            <!-- Recommended Programs -->
            <section class="program-section">
                <div class="section-header">
                    <h2><i class="fas fa-lightbulb"></i> Rekomendasi Program Lainnya</h2>
                </div>
                
                <div class="recommended-programs">
                    <!-- Sample recommended programs - in a real app these would come from the controller -->
                    <div class="program-card">
                        <h3>Beasiswa Anak Yatim</h3>
                        <p class="program-org"><i class="fas fa-building"></i> Yayasan Pintar Harapan</p>
                        <p class="program-location"><i class="fas fa-map-marker-alt"></i> Kendari, Sulawesi Tenggara</p>
                        <div class="donation-types">
                            <span class="donation-type">Uang</span>
                        </div>
                        <div class="action-buttons">
                            <a href="#" class="btn btn-donate"><i class="fas fa-donate"></i> Donasi Sekarang</a>
                            <a href="#" class="btn btn-detail"><i class="fas fa-info-circle"></i> Detail</a>
                        </div>
                    </div>
                    
                    <div class="program-card">
                        <h3>Kebun Komunitas</h3>
                        <p class="program-org"><i class="fas fa-building"></i> Gerakan Earth Foundation</p>
                        <p class="program-location"><i class="fas fa-map-marker-alt"></i> Kendari, Sulawesi Tenggara</p>
                        <div class="donation-types">
                            <span class="donation-type">Barang</span>
                            <span class="donation-type">Tenaga</span>
                        </div>
                        <div class="action-buttons">
                            <a href="#" class="btn btn-donate"><i class="fas fa-donate"></i> Donasi Sekarang</a>
                            <a href="#" class="btn btn-detail"><i class="fas fa-info-circle"></i> Detail</a>
                        </div>
                    </div>
                    
                    <div class="program-card">
                        <h3>Deteksi Stunting</h3>
                        <p class="program-org"><i class="fas fa-building"></i> Sekolah Sehat Bangsa</p>
                        <p class="program-location"><i class="fas fa-map-marker-alt"></i> Jakarta</p>
                        <div class="donation-types">
                            <span class="donation-type">Uang</span>
                            <span class="donation-type">Barang</span>
                        </div>
                        <div class="action-buttons">
                            <a href="#" class="btn btn-donate"><i class="fas fa-donate"></i> Donasi Sekarang</a>
                            <a href="#" class="btn btn-detail"><i class="fas fa-info-circle"></i> Detail</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        // Mobile menu toggle functionality
        document.querySelector('.menu-toggle')?.addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>
</html>