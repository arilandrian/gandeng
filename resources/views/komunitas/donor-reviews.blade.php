<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Donatur - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/komunitas-reviews.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('komunitas.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('komunitas.my_programs') }}"><i class="fas fa-project-diagram"></i> Program Saya</a>
                <a href="{{ route('komunitas.create_campaign') }}"><i class="fas fa-plus-circle"></i> Buat Kampanye</a>
                <a href="{{ route('komunitas.budget_report') }}"><i class="fas fa-file-invoice-dollar"></i> Laporan Anggaran</a>
                <a href="{{ route('komunitas.donor_reviews') }}" class="active"><i class="fas fa-star"></i> Ulasan Donatur</a>
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

    <main class="reviews-page">
        <div class="container">
            <header class="page-header">
                <h1>Ulasan Donatur</h1>
                <p>Pendapat dan pengalaman donatur terhadap berbagai kampanye sosial di platform ini.</p>
            </header>

            <div class="reviews-grid">
                <article class="review-card">
                    <div class="review-rating">★★★★☆</div>
                    <blockquote class="review-text">
                        "Program ini sangat bermanfaat dan transparan dalam pelaporan. Saya senang bisa membantu pendidikan anak-anak di daerah terpencil."
                    </blockquote>
                    <div class="review-meta">
                        <div class="review-author">oleh: A. Rahman</div>
                        <div class="review-program">untuk: Pendidikan Anak Pulau</div>
                        <div class="review-date">tanggal: 28 Mei 2025</div>
                    </div>
                </article>

                <article class="review-card">
                    <div class="review-rating">★★★★★</div>
                    <blockquote class="review-text">
                        "Pelaksanaan program sangat baik. Update rutin membuat saya yakin donasi digunakan dengan tepat. Akan dukung lagi program lainnya!"
                    </blockquote>
                    <div class="review-meta">
                        <div class="review-author">oleh: B. Santoso</div>
                        <div class="review-program">untuk: Air Bersih Desa Lemo</div>
                        <div class="review-date">tanggal: 15 Mei 2025</div>
                    </div>
                </article>

                <article class="review-card">
                    <div class="review-rating">★★★☆☆</div>
                    <blockquote class="review-text">
                        "Programnya bagus tapi komunikasi bisa lebih ditingkatkan. Saya sedikit kesulitan mendapatkan info perkembangan terakhir."
                    </blockquote>
                    <div class="review-meta">
                        <div class="review-author">oleh: C. Wijaya</div>
                        <div class="review-program">untuk: Bantuan Medis Lansia</div>
                        <div class="review-date">tanggal: 10 April 2025</div>
                    </div>
                </article>

                <article class="review-card">
                    <div class="review-rating">★★★★★</div>
                    <blockquote class="review-text">
                        "Sangat puas dengan program ini! Laporan keuangan sangat detail dan dampaknya langsung terlihat di lapangan."
                    </blockquote>
                    <div class="review-meta">
                        <div class="review-author">oleh: D. Putri</div>
                        <div class="review-program">untuk: Beasiswa Anak Yatim</div>
                        <div class="review-date">tanggal: 5 April 2025</div>
                    </div>
                </article>
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
                        <li><i class="fas fa-envelope"></i> komunitas@gandeng.org</li>
                        <li><i class="fas fa-phone"></i> (0401) 987 6543</li>
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