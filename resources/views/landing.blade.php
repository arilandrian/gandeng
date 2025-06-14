<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GANDENG - Aplikasi Sosial untuk Kemitraan (SDG 17)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">GANDENG</a>
            <div class="nav-links">
                <a href="#home">Beranda</a>
                <a href="#about">Tentang Kami</a>
                <a href="#features">Keunggulan</a>
                <a href="#programs">Program</a>
                <a href="#" class="login-btn">Masuk</a>
                <a href="#" class="join-btn">Gabung Sekarang</a>
            </div>
            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Bersama Wujudkan Kemitraan untuk Masa Depan Berkelanjutan</h1>
                <p>GANDENG menghubungkan individu, organisasi, dan komunitas untuk mencapai Tujuan Pembangunan Berkelanjutan (SDG) melalui kolaborasi nyata.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">Gabung Sekarang</a>
                    <a href="#programs" class="btn-secondary">Lihat Program</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="People collaborating">
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="about" class="about">
        <div class="container">
            <h2>Tentang GANDENG</h2>
            <p class="section-description">GANDENG adalah platform kolaborasi sosial yang mendukung pencapaian SDG 17 (Kemitraan untuk Mencapai Tujuan) dengan menghubungkan berbagai pihak untuk beraksi bersama.</p>
            
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Kolaborasi</h3>
                    <p>Kami percaya kemitraan adalah kunci untuk menciptakan perubahan berkelanjutan.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Transparansi</h3>
                    <p>Setiap kontribusi dan dampak dilaporkan secara terbuka dan akuntabel.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h3>Dampak Nyata</h3>
                    <p>Fokus pada solusi praktis yang memberikan manfaat langsung bagi masyarakat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan -->
    <section id="features" class="features">
        <div class="container">
            <h2>Keunggulan GANDENG</h2>
            <p class="section-description">Platform kami dirancang untuk memudahkan Anda berpartisipasi dalam berbagai inisiatif sosial.</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3>Donasi Beragam</h3>
                    <p>Tidak hanya uang, Anda bisa menyumbang waktu, keahlian, atau barang.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-file-alt"></i>
                    <h3>Pelaporan Real-time</h3>
                    <p>Pantau perkembangan setiap program yang Anda dukung secara transparan.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-star"></i>
                    <h3>Ulasan Donatur</h3>
                    <p>Baca pengalaman nyata dari donatur dan penerima manfaat sebelumnya.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-search"></i>
                    <h3>Pencarian Cerdas</h3>
                    <p>Temukan kampanye yang sesuai dengan minat dan lokasi Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section id="programs" class="programs">
        <div class="container">
            <h2>Program Unggulan</h2>
            <p class="section-description">Dukung berbagai inisiatif sosial yang sedang berjalan.</p>
            
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-image">
                        <img src="https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Education program">
                        <div class="progress-bar">
                            <div class="progress" style="width: 75%;"></div>
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Pendidikan untuk Semua</h3>
                        <p class="organization">Yayasan Peduli Pendidikan</p>
                        <div class="program-details">
                            <div class="target">
                                <span>Target: Rp 250jt</span>
                                <span>Terkumpul: Rp 187jt</span>
                            </div>
                            <a href="#" class="btn-small">Dukung</a>
                        </div>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-image">
                        <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Environment program">
                        <div class="progress-bar">
                            <div class="progress" style="width: 45%;"></div>
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Penghijauan Kota</h3>
                        <p class="organization">Komunitas Hijau Lestari</p>
                        <div class="program-details">
                            <div class="target">
                                <span>Target: Rp 150jt</span>
                                <span>Terkumpul: Rp 67.5jt</span>
                            </div>
                            <a href="#" class="btn-small">Dukung</a>
                        </div>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-image">
                        <img src="https://images.unsplash.com/photo-1579684453423-f84349ef60b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Health program">
                        <div class="progress-bar">
                            <div class="progress" style="width: 90%;"></div>
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Kesehatan Pedesaan</h3>
                        <p class="organization">Rumah Sehat Indonesia</p>
                        <div class="program-details">
                            <div class="target">
                                <span>Target: Rp 180jt</span>
                                <span>Terkumpul: Rp 162jt</span>
                            </div>
                            <a href="#" class="btn-small">Dukung</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="view-all">
                <a href="#" class="btn-secondary">Lihat Semua Program</a>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="testimonials">
        <div class="container">
            <h2>Apa Kata Mereka?</h2>
            <p class="section-description">Testimoni dari mereka yang telah menggunakan GANDENG.</p>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Melalui GANDENG, saya bisa menemukan program yang benar-benar sesuai dengan passion saya untuk membantu pendidikan anak-anak."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah Wijaya">
                        <div>
                            <h4>Sarah Wijaya</h4>
                            <span>Donatur Rutin</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Transparansi laporan di GANDENG membuat kami yakin bahwa donasi kami benar-benar sampai kepada yang membutuhkan."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Budi Santoso">
                        <div>
                            <h4>Budi Santoso</h4>
                            <span>Relawan</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Sebagai komunitas, GANDENG membantu kami mendapatkan dukungan dari berbagai pihak untuk program lingkungan kami."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dewi Kurnia">
                        <div>
                            <h4>Dewi Kurnia</h4>
                            <span>Penggerak Komunitas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Akhir -->
    <section class="final-cta">
        <div class="container">
            <h2>Siap Membuat Perubahan Bersama?</h2>
            <p>Bergabunglah dengan ribuan orang dan organisasi yang telah menciptakan dampak positif melalui GANDENG.</p>
            <a href="#" class="btn-primary">Gabung Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>GANDENG</h3>
                    <p>Platform kolaborasi sosial untuk mencapai Tujuan Pembangunan Berkelanjutan (SDGs) melalui kemitraan.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h3>Navigasi</h3>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#features">Keunggulan</a></li>
                        <li><a href="#programs">Program</a></li>
                        <li><a href="#">Masuk</a></li>
                        <li><a href="#">Gabung</a></li>
                    </ul>
                </div>
                
                <div class="footer-contact">
                    <h3>Kontak Kami</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Pembangunan No.17, Jakarta</li>
                        <li><i class="fas fa-phone"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope"></i> hello@gandeng.org</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 GANDENG. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>