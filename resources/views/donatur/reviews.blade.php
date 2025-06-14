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
    <link rel="stylesheet" href="{{ asset('css/donatur-reviews.css') }}">
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
                <a href="{{ route('donatur.donation_history') }}"><i class="fas fa-history"></i> Riwayat Donasi</a>
                <a href="{{ route('donatur.reviews_history') }}" class="active"><i class="fas fa-star"></i> Ulasan Saya</a>
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

    <main class="review-container">
        <div class="container">
            <div class="review-header">
                <h1><i class="fas fa-star"></i> Beri Ulasan terhadap Program Sosial</h1>
                <p>Bagikan pengalaman Anda dalam mendukung program-program sosial ini</p>
            </div>

            <div class="program-list">
                <div class="program-card">
                    <div class="program-info">
                        <h3>Penghijauan Kota Kendari</h3>
                        <div class="program-meta">
                            <span><i class="fas fa-users"></i> Komunitas Hijau Lestari</span>
                            <span><i class="fas fa-calendar-alt"></i> Donasi: 15 Jan 2023</span>
                        </div>
                    </div>
                    <button class="btn-review" data-program-id="1">Beri Ulasan</button>

                    <form class="review-form" id="review-form-1" style="display: none;" method="POST" action="">
                        @csrf
                        <input type="hidden" name="program_id" value="1">
                        <input type="hidden" name="rating" id="rating-input-1" value="0">
                        <div class="rating" data-program-id="1">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <div class="form-group">
                            <textarea name="review_text" placeholder="Bagaimana pengalaman Anda mendukung program ini?"></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Kirim Ulasan</button>
                    </form>
                </div>

                <div class="program-card">
                    <div class="program-info">
                        <h3>Bantuan Pendidikan Anak Nelayan</h3>
                        <div class="program-meta">
                            <span><i class="fas fa-users"></i> Yayasan Peduli Pendidikan</span>
                            <span><i class="fas fa-calendar-alt"></i> Donasi: 22 Mar 2023</span>
                        </div>
                    </div>

                    <div class="existing-review">
                        <div class="review-header">
                            <div class="rating">
                                <span class="star active">★</span>
                                <span class="star active">★</span>
                                <span class="star active">★</span>
                                <span class="star active">★</span>
                                <span class="star">★</span>
                            </div>
                            <span class="review-date"><i class="fas fa-calendar-alt"></i> 25 Mar 2023</span>
                        </div>
                        <div class="review-content">
                            <p>Program ini sangat bermanfaat untuk anak-anak nelayan. Saya senang bisa berkontribusi meskipun jumlahnya tidak besar.</p>
                        </div>
                    </div>
                    </div>

                <div class="program-card">
                    <div class="program-info">
                        <h3>Kesehatan Pedesaan</h3>
                        <div class="program-meta">
                            <span><i class="fas fa-users"></i> Rumah Sehat Indonesia</span>
                            <span><i class="fas fa-calendar-alt"></i> Donasi: 5 Mei 2023</span>
                        </div>
                    </div>
                    <button class="btn-review" data-program-id="3">Beri Ulasan</button>

                    <form class="review-form" id="review-form-3" style="display: none;" method="POST" action="">
                        @csrf
                        <input type="hidden" name="program_id" value="3">
                        <input type="hidden" name="rating" id="rating-input-3" value="0">
                        <div class="rating" data-program-id="3">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <div class="form-group">
                            <textarea name="review_text" placeholder="Bagaimana pengalaman Anda mendukung program ini?"></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Kirim Ulasan</button>
                    </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle review form visibility
            document.querySelectorAll('.btn-review').forEach(button => {
                button.addEventListener('click', function() {
                    const programCard = this.closest('.program-card');
                    const reviewForm = programCard.querySelector('.review-form');
                    const existingReview = programCard.querySelector('.existing-review');

                    if (reviewForm) {
                        reviewForm.style.display = reviewForm.style.display === 'none' ? 'block' : 'none';
                        // Hide existing review if form is shown (optional)
                        if (existingReview) {
                            existingReview.style.display = reviewForm.style.display === 'none' ? 'block' : 'none';
                        }
                        this.textContent = (reviewForm.style.display === 'none') ? 'Beri Ulasan' : 'Sembunyikan Form';
                    }
                });
            });

            // Star rating functionality
            document.querySelectorAll('.rating').forEach(ratingContainer => {
                const stars = ratingContainer.querySelectorAll('.star');
                const programId = ratingContainer.dataset.programId;
                const ratingInput = document.getElementById(`rating-input-${programId}`);

                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        const value = parseInt(this.dataset.value);
                        ratingInput.value = value; // Update hidden input value

                        stars.forEach(s => {
                            if (parseInt(s.dataset.value) <= value) {
                                s.classList.add('active');
                            } else {
                                s.classList.remove('active');
                            }
                        });
                    });
                });
            });
        });
    </script>
</body>
</html>