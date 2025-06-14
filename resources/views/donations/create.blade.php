<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi - GANDENG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/donation-form.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('landing') }}" class="logo">
                <span class="logo-text">GANDENG</span>
            </a>
            <div class="nav-links">
                <a href="#"><i class="fas fa-home"></i> Dashboard</a> <a href="{{ route('campaigns.index') }}"><i class="fas fa-search"></i> Jelajahi Program</a>
                <a href="#"><i class="fas fa-history"></i> Riwayat Donasi</a> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <main class="donation-container">
        <div class="container">
            <div class="donation-header">
                <h1>Form Donasi untuk Program: <span>Penghijauan Kota Kendari</span></h1>
                <p>Komunitas Hijau Lestari - Sulawesi Tenggara</p>
            </div>

            {{-- <form class="donation-form" method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data"> --}}
                @csrf <div class="form-section">
                    <h2><i class="fas fa-hand-holding-heart"></i> Jenis Donasi</h2>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="donation_type" value="money" id="radio_money" checked onchange="toggleDonationForms()">
                            <span class="radio-custom"></span>
                            <span class="radio-label">Donasi Uang</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="donation_type" value="goods" id="radio_goods" onchange="toggleDonationForms()">
                            <span class="radio-custom"></span>
                            <span class="radio-label">Donasi Barang</span>
                        </label>
                    </div>
                </div>

                <div class="donation-form-content" id="money-form-section">
                    <div class="form-section">
                        <h2><i class="fas fa-money-bill-wave"></i> Nominal Donasi</h2>
                        <div class="input-group">
                            <span class="input-prefix">Rp</span>
                            <input type="number" name="nominal_amount" id="nominal_amount_input" placeholder="Masukkan nominal" required>
                        </div>
                        <div class="quick-amounts">
                            <button type="button" data-nominal="50000">Rp50.000</button>
                            <button type="button" data-nominal="100000">Rp100.000</button>
                            <button type="button" data-nominal="250000">Rp250.000</button>
                            <button type="button" data-nominal="500000">Rp500.000</button>
                        </div>
                    </div>

                    <div class="form-section">
                        <h2><i class="fas fa-credit-card"></i> Metode Pembayaran</h2>
                        <select name="payment_method" id="payment_method_select" required>
                            <option value="" disabled selected>Pilih metode pembayaran</option>
                            <option value="bca">Transfer Bank - BCA</option>
                            <option value="bri">Transfer Bank - BRI</option>
                            <option value="mandiri">Transfer Bank - Mandiri</option>
                            <option value="gopay">e-Wallet - GoPay</option>
                            <option value="ovo">e-Wallet - OVO</option>
                            <option value="dana">e-Wallet - DANA</option>
                        </select>
                    </div>
                </div>

                <div class="donation-form-content" id="goods-form-section" style="display: none;">
                    <div class="form-section">
                        <h2><i class="fas fa-box-open"></i> Informasi Barang</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="item-name">Nama Barang</label>
                                <input type="text" id="item-name" name="item_name" placeholder="Contoh: Buku bacaan anak">
                            </div>
                            <div class="form-group">
                                <label for="item-quantity">Jumlah/Satuan</label>
                                <input type="text" id="item-quantity" name="item_quantity" placeholder="Contoh: 10 buah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="item-desc">Deskripsi Barang <small>(opsional)</small></label>
                            <textarea id="item-desc" name="item_description" rows="3" placeholder="Deskripsikan kondisi dan spesifikasi barang"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="item-photo">Foto Barang <small>(opsional)</small></label>
                            <input type="file" id="item-photo" name="item_photo" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2><i class="fas fa-edit"></i> Catatan Tambahan <small>(opsional)</small></h2>
                    <textarea name="additional_notes" placeholder="Masukkan catatan atau pesan untuk komunitas..." rows="3"></textarea>
                </div>

                <div class="form-footer">
                    <div class="form-reminder">
                        <i class="fas fa-info-circle"></i>
                        <p>Setelah mengirimkan donasi, Anda akan menerima konfirmasi melalui email terdaftar.</p>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Donasi
                    </button>
                </div>
            </form>
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
                        <li><i class="fas fa-envelope"></i> donasi@gandeng.org</li>
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
        // JavaScript untuk toggle form Donasi Uang / Donasi Barang
        function toggleDonationForms() {
            const moneyForm = document.getElementById('money-form-section');
            const goodsForm = document.getElementById('goods-form-section');
            const radioMoney = document.getElementById('radio_money');

            if (radioMoney.checked) {
                moneyForm.style.display = 'block';
                goodsForm.style.display = 'none';
                // Atur atribut 'required' untuk input yang aktif
                document.getElementById('nominal_amount_input').setAttribute('required', 'required');
                document.getElementById('payment_method_select').setAttribute('required', 'required');

                document.getElementById('item-name').removeAttribute('required');
                document.getElementById('item-quantity').removeAttribute('required');
            } else {
                moneyForm.style.display = 'none';
                goodsForm.style.display = 'block';
                // Atur atribut 'required' untuk input yang aktif
                document.getElementById('nominal_amount_input').removeAttribute('required');
                document.getElementById('payment_method_select').removeAttribute('required');

                document.getElementById('item-name').setAttribute('required', 'required');
                document.getElementById('item-quantity').setAttribute('required', 'required');
            }
        }

        // JavaScript untuk Nominal Buttons
        document.querySelectorAll('.quick-amounts button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.quick-amounts button').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('nominal_amount_input').value = this.dataset.nominal;
            });
        });

        // Inisialisasi form saat DOM dimuat
        document.addEventListener('DOMContentLoaded', function() {
            toggleDonationForms();
        });
    </script>
</body>
</html>