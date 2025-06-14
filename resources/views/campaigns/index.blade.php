<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kampanye GANDENG</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('css/campaigns.css') }}" rel="stylesheet" />
    </head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">GANDENG</a>
            <div class="navbar-menu">
                <a href="#" class="active">Jelajahi Program</a>
                <a href="#">Riwayat Donasi</a>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1>Program Sosial</h1>
            <p>Temukan program sosial yang ingin Anda dukung</p>
        </div>
    </div>

    <div class="container">
        <div class="search-section">
            <div class="search-filter">
                <input type="text" placeholder="Cari nama program atau komunitas...">
                <select>
                    <option selected>Semua Kategori</option>
                    <option value="pendidikan">Pendidikan</option>
                    <option value="kesehatan">Kesehatan</option>
                    <option value="lingkungan">Lingkungan</option>
                    <option value="kemanusiaan">Kemanusiaan</option>
                </select>
                <select>
                    <option selected>Semua Lokasi</option>
                    <option value="kendari">Kendari</option>
                    <option value="jakarta">Jakarta</option>
                    </select>
            </div>
        </div>

        <div class="grid-container">
            {{-- Contoh Kartu Kampanye 1 --}}
            <div class="campaign-card">
                <div class="campaign-image" style="background-image: url('https://via.placeholder.com/600x400/ADD8E6/FFFFFF?text=Pendidikan+Anak');"></div>
                <div class="campaign-content">
                    <h3>Beasiswa Anak Yatim Sultra</h3>
                    <div class="organization">Oleh Komunitas Harapan Bangsa</div>
                    <div class="meta-info">
                        <span class="category">Pendidikan</span>
                        <span class="location">Kendari</span>
                    </div>
                    <div class="progress-container">
                        <div class="progress-info">
                            <span>Terkumpul: Rp 15.000.000</span>
                            <span>75%</span>
                        </div>
                        <div class="progress-bar-fill">
                            <div class="progress-fill" style="width: 75%;"></div>
                        </div>
                        <div class="target">Target: Rp 20.000.000</div>
                    </div>
                    <div class="time-left"><i class="far fa-clock"></i> Tersisa 30 Hari</div>
                    <div class="action-buttons">
                        <a href="#" class="btn btn-detail">Lihat Detail</a>
                        <a href="#" class="btn btn-donate">Donasi Sekarang</a>
                    </div>
                </div>
            </div>

            {{-- Contoh Kartu Kampanye 2 --}}
            <div class="campaign-card">
                <div class="campaign-image" style="background-image: url('https://via.placeholder.com/600x400/FFA07A/FFFFFF?text=Bencana+Alam');"></div>
                <div class="campaign-content">
                    <h3>Bantu Korban Bencana Alam Sulawesi</h3>
                    <div class="organization">Oleh Yayasan Peduli Sesama</div>
                    <div class="meta-info">
                        <span class="category">Kemanusiaan</span>
                        <span class="location">Sulawesi Tenggara</span>
                    </div>
                    <div class="progress-container">
                        <div class="progress-info">
                            <span>Terkumpul: Rp 62.000.000</span>
                            <span>62%</span>
                        </div>
                        <div class="progress-bar-fill">
                            <div class="progress-fill" style="width: 62%;"></div>
                        </div>
                        <div class="target">Target: Rp 100.000.000</div>
                    </div>
                    <div class="time-left"><i class="far fa-clock"></i> Tersisa 45 Hari</div>
                    <div class="action-buttons">
                        <a href="#" class="btn btn-detail">Lihat Detail</a>
                        <a href="#" class="btn btn-donate">Donasi Sekarang</a>
                    </div>
                </div>
            </div>

            {{-- Contoh Kartu Kampanye 3 --}}
            <div class="campaign-card">
                <div class="campaign-image" style="background-image: url('https://via.placeholder.com/600x400/90EE90/FFFFFF?text=Penghijauan');"></div>
                <div class="campaign-content">
                    <h3>Penghijauan Kota Kendari</h3>
                    <div class="organization">Oleh Green Earth Community</div>
                    <div class="meta-info">
                        <span class="category">Lingkungan</span>
                        <span class="location">Kendari</span>
                    </div>
                    <div class="progress-container">
                        <div class="progress-info">
                            <span>Terkumpul: Rp 7.050.000</span>
                            <span>47%</span>
                        </div>
                        <div class="progress-bar-fill">
                            <div class="progress-fill" style="width: 47%;"></div>
                        </div>
                        <div class="target">Target: Rp 15.000.000</div>
                    </div>
                    <div class="time-left"><i class="far fa-clock"></i> Tersisa 20 Hari</div>
                    <div class="action-buttons">
                        <a href="#" class="btn btn-detail">Lihat Detail</a>
                        <a href="#" class="btn btn-donate">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>