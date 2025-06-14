<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghijauan Kota Kendari - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/detail-campaign.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('campaigns.index') }}"><i class="fas fa-search"></i> Jelajahi Program</a>
                <a href="#"><i class="fas fa-info-circle"></i> Tentang</a>
                <a href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
            </div>
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <header class="campaign-header">
        <div class="container">
            <div class="campaign-breadcrumb">
                <a href="{{ route('campaigns.index') }}">Program</a> / <a href="#">Lingkungan</a> / <span>Penghijauan Kota Kendari</span>
            </div>
            <h1>Penghijauan Kota Kendari</h1>
            <div class="campaign-meta">
                <a href="#" class="community-link">
                    <i class="fas fa-users"></i> Komunitas Hijau Lestari
                </a>
                <span class="location">
                    <i class="fas fa-map-marker-alt"></i> Kendari, Sulawesi Tenggara
                </span>
            </div>
        </div>
        <div class="campaign-banner">
            <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Penghijauan Kota Kendari">
        </div>
    </header>

    <main class="campaign-content">
        <div class="container">
            <div class="campaign-main">
                <section class="campaign-section">
                    <h2><i class="fas fa-info-circle"></i> Tentang Program</h2>
                    <p>Program penghijauan kota Kendari bertujuan untuk meningkatkan kualitas udara dan lingkungan hidup di wilayah perkotaan. Kami akan menanam 500 pohon pelindung di sepanjang jalan protokol dan area publik di Kota Kendari.</p>

                    <p>Dampak yang diharapkan:</p>
                    <ul>
                        <li>Mengurangi polusi udara di kawasan perkotaan</li>
                        <li>Menyediakan ruang terbuka hijau untuk masyarakat</li>
                        <li>Meningkatkan kesadaran lingkungan warga Kendari</li>
                        <li>Menjaga keseimbangan ekosistem perkotaan</li>
                    </ul>
                </section>

                <section class="campaign-section">
                    <h2><i class="fas fa-calendar-alt"></i> Waktu Pelaksanaan</h2>
                    <div class="timeline-grid">
                        <div class="timeline-item">
                            <h3>Mulai Penggalangan</h3>
                            <p>15 Januari 2023</p>
                        </div>
                        <div class="timeline-item">
                            <h3>Target Selesai</h3>
                            <p>30 April 2023</p>
                        </div>
                        <div class="timeline-item">
                            <h3>Penanaman Pohon</h3>
                            <p>Mei - Juni 2023</p>
                        </div>
                    </div>
                </section>

                <section class="campaign-section">
                    <h2><i class="fas fa-comment-alt"></i> Ulasan Donatur</h2>
                    <div class="testimonials">
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <p>"Sangat mendukung program penghijauan ini. Kota Kendari butuh lebih banyak ruang hijau untuk anak cucu kita nanti."</p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h4>Budi Santoso</h4>
                                    <span>Donatur, 20 Februari 2023</span>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <p>"Komunitas Hijau Lestari selalu transparan dalam laporan programnya. Saya percaya donasi akan digunakan dengan baik."</p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h4>Dewi Kurnia</h4>
                                    <span>Donatur, 5 Maret 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <aside class="campaign-sidebar">
                <div class="donation-card">
                    <h3>Progress Donasi</h3>
                    <div class="donation-progress">
                        <div class="progress-info">
                            <span>Terkumpul</span>
                            <span>Rp10.500.000</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 70%;"></div>
                        </div>
                        <div class="progress-target">
                            <span>Target: Rp15.000.000</span>
                            <span>70%</span>
                        </div>
                    </div>

                    <div class="donation-actions">
                        <a href="#" class="btn-donate money">
                            <i class="fas fa-money-bill-wave"></i> Donasi Uang
                        </a>
                        <a href="#" class="btn-donate goods">
                            <i class="fas fa-box-open"></i> Donasi Barang
                        </a>
                        <a href="#" class="btn-share" disabled>
                            <i class="fas fa-share-alt"></i> Bagikan Kampanye
                        </a>
                    </div>

                    <div class="campaign-info">
                        <div class="info-item">
                            <i class="fas fa-tag"></i>
                            <span>Kategori: Lingkungan</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marked-alt"></i>
                            <span>Lokasi: Sulawesi Tenggara</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-check"></i>
                            <span>Terakhir diperbarui: 10 Maret 2023</span>
                        </div>
                    </div>
                </div>
            </aside>
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
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> hello@gandeng.org</li>
                        <li><i class="fas fa-phone"></i> (0401) 123 4567</li>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Pendidikan No. 17, Kendari</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 GANDENG. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>