<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kampanye - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Tautan ke CSS global Anda -->
    <link rel="stylesheet" href="{{ asset('css/create-campaign.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('komunitas.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('komunitas.my_programs') }}"><i class="fas fa-project-diagram"></i> Program Saya</a>
                <a href="{{ route('komunitas.create_campaign') }}" class="active"><i class="fas fa-plus-circle"></i> Buat Kampanye</a>
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

    <!-- Main Content -->
    <main class="form-container">
        <div class="container">
            <div class="form-header">
                <h1><i class="fas fa-plus-circle"></i> Formulir Pembuatan Kampanye Program Sosial</h1>
                <p>Isi detail program sosial yang ingin Anda galang dana</p>
            </div>

            <form class="campaign-form" method="POST" action="{{ route('komunitas.campaigns.store') }}" enctype="multipart/form-data">
                @csrf <!-- Laravel CSRF token for security -->

                <!-- Program Name -->
                <div class="form-group">
                    <label for="program-name">Nama Program</label>
                    <input type="text" id="program-name" name="program_name" placeholder="Contoh: Penghijauan Kota Kendari" required>
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="education">Pendidikan</option>
                        <option value="health">Kesehatan</option>
                        <option value="environment">Lingkungan</option>
                        <option value="humanitarian">Kemanusiaan</option>
                    </select>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">Lokasi Program</label>
                    <input type="text" id="location" name="location" placeholder="Contoh: Kendari, Sulawesi Tenggara" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Deskripsi Program</label>
                    <textarea id="description" name="description" rows="6" placeholder="Jelaskan secara detail tentang program Anda, tujuan, manfaat, dan rencana pelaksanaan..." required></textarea>
                </div>

                <!-- Target & Dates -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="target">Target Dana (Rp)</label>
                        <input type="number" id="target" name="target_fund" placeholder="Contoh: 15000000" required>
                    </div>
                    <div class="form-group">
                        <label for="start-date">Tanggal Mulai</label>
                        <input type="date" id="start-date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end-date">Tanggal Berakhir</label>
                        <input type="date" id="end-date" name="end_date" required>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="form-group">
                    <label for="image">Unggah Gambar Program</label>
                    <div class="file-upload">
                        <input type="file" id="image" name="program_image" accept="image/*" required>
                        <label for="image" class="upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Pilih file gambar</span>
                        </label>
                        <div class="file-info">Format: JPG/PNG (max 2MB)</div>
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="form-footer">
                    <div class="form-note">
                        <i class="fas fa-info-circle"></i>
                        <p>Setelah diajukan, kampanye akan ditinjau oleh admin sebelum dipublikasikan.</p>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Ajukan Kampanye
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
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
                        <li><a href="#">Panduan Kampanye</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Bantuan</h3>
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
</body>
</html>