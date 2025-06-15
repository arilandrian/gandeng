<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi - {{ $campaign->title }}</title>
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
                <a href="#"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('campaigns.index') }}"><i class="fas fa-search"></i> Jelajahi Program</a>
                <a href="#"><i class="fas fa-history"></i> Riwayat Donasi</a>
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

    <main class="donation-container">
        <div class="container">
            <div class="donation-header">
                <h1>Form Donasi untuk Program: <span>{{ $campaign->title }}</span></h1>
                <p>{{ $campaign->komunitas->nama_organisasi }}</p>
            </div>
            @if ($errors->any())
                <div class="alert-error">
                    <strong>Oops! Ada beberapa masalah dengan data yang Anda masukkan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="donation-form" method="POST" action="{{ route('donations.store') }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                <div class="form-section">
                    <h2><i class="fas fa-hand-holding-heart"></i> Jenis Donasi</h2>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="donation_type" value="money" id="radio_money"
                                {{ old('donation_type', 'money') == 'money' ? 'checked' : '' }}>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Donasi Uang</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="donation_type" value="goods" id="radio_goods"
                                {{ old('donation_type') == 'goods' ? 'checked' : '' }}>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Donasi Barang</span>
                        </label>
                    </div>
                </div>

                {{-- Bagian form donasi uang --}}
                <div class="donation-form-content" id="money-form-section">
                    <div class="form-section">
                        <h2><i class="fas fa-money-bill-wave"></i> Nominal Donasi</h2>
                        <div class="input-group">
                            <span class="input-prefix">Rp</span>
                            <input type="number" name="amount" id="nominal_amount_input"
                                placeholder="Masukkan nominal" value="{{ old('amount') }}">
                        </div>
                        @error('amount')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                        <div class="quick-amounts">
                            <button type="button" class="btn-quick-amount" data-nominal="25000">Rp 25.000</button>
                            <button type="button" class="btn-quick-amount" data-nominal="50000">Rp 50.000</button>
                            <button type="button" class="btn-quick-amount" data-nominal="100000">Rp 100.000</button>
                            <button type="button" class="btn-quick-amount" data-nominal="250000">Rp 250.000</button>
                            <button type="button" class="btn-quick-amount" data-nominal="500000">Rp 500.000</button>
                        </div>
                    </div>
                    <div class="form-section">
                        <h2><i class="fas fa-credit-card"></i> Metode Pembayaran</h2>
                        <select name="payment_method" id="payment_method_select">
                            <option value="" disabled selected>Pilih metode pembayaran</option>
                            @foreach ($paymentMethods as $code => $name)
                                <option value="{{ $code }}"
                                    {{ old('payment_method') == $code ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('payment_method')
                            <small style="color: red; margin-top: 5px; display: block;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Bagian form donasi barang --}}
                <div class="donation-form-content" id="goods-form-section" style="display: none;">
                    <div class="form-section">
                        <h2><i class="fas fa-box-open"></i> Informasi Barang</h2>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="item_name_input">Nama Barang</label> {{-- PERBAIKAN: Ubah ID --}}
                            <input type="text" id="item_name_input" name="item_name" value="{{ old('item_name') }}"
                                placeholder="Contoh: Buku bacaan anak">
                            @error('item_name')
                                <small style="color: red; margin-top: 5px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="item_quantity_input">Jumlah/Satuan</label> {{-- PERBAIKAN: Ubah ID --}}
                            <input type="text" id="item_quantity_input" name="item_quantity"
                                value="{{ old('item_quantity') }}" placeholder="Contoh: 10 buah">
                            @error('item_quantity')
                                <small style="color: red; margin-top: 5px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="item_description_input">Deskripsi Barang (opsional)</label> {{-- PERBAIKAN: Ubah ID --}}
                            <textarea id="item_description_input" name="item_description" placeholder="Deskripsikan kondisi barang, dll." rows="3">{{ old('item_description') }}</textarea>
                            @error('item_description')
                                <small style="color: red; margin-top: 5px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="item_photo_input">Foto Barang (opsional)</label> {{-- PERBAIKAN: Ubah ID --}}
                            <input type="file" id="item_photo_input" name="item_photo" class="form-control-file">
                            @error('item_photo')
                                <small style="color: red; margin-top: 5px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2><i class="fas fa-user-circle"></i> Data Diri Anda</h2>
                    <div class="form-group">
                        <label for="donatur_name">Nama Lengkap</label>
                        <input type="text" id="donatur_name" name="donatur_name"
                            value="{{ Auth::user()->name ?? '' }}" required>
                        @error('donatur_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="donatur_email">Alamat Email</label>
                        <input type="email" id="donatur_email" name="donatur_email"
                            value="{{ Auth::user()->email ?? '' }}" required>
                        @error('donatur_email')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="is_anonymous" name="is_anonymous" value="1"
                            {{ old('is_anonymous') ? 'checked' : '' }}>
                        <label for="is_anonymous">Sembunyikan nama saya (Donasi sebagai Anonim)</label>
                    </div>
                </div>

                <div class="form-section">
                    <h2><i class="fas fa-edit"></i> Catatan Tambahan <small>(opsional)</small></h2>
                    <textarea name="additional_notes" placeholder="Masukkan catatan atau pesan untuk komunitas..." rows="3">{{ old('additional_notes') }}</textarea>
                    @error('additional_notes')
                        <small style="color: red; margin-top: 5px; display: block;">{{ $message }}</small>
                    @enderror
                </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            const donationTypeRadios = document.querySelectorAll('input[name="donation_type"]');
            // PERBAIKAN: Gunakan ID yang benar sesuai HTML
            const moneyFields = document.getElementById('money-form-section'); 
            const goodsFields = document.getElementById('goods-form-section');

            function toggleDonationFields() {
                const selectedType = document.querySelector('input[name="donation_type"]:checked').value;

                if (selectedType === 'money') {
                    moneyFields.style.display = 'block';
                    goodsFields.style.display = 'none';

                    // Aktifkan semua input di bagian donasi uang
                    moneyFields.querySelectorAll('input, select, textarea').forEach(input => {
                        input.removeAttribute('disabled');
                    });
                    // Nonaktifkan semua input di bagian donasi barang
                    goodsFields.querySelectorAll('input, select, textarea').forEach(input => {
                        input.setAttribute('disabled', 'true');
                    });

                } else if (selectedType === 'goods') {
                    moneyFields.style.display = 'none';
                    goodsFields.style.display = 'block';

                    // Aktifkan semua input di bagian donasi barang
                    goodsFields.querySelectorAll('input, select, textarea').forEach(input => {
                        input.removeAttribute('disabled');
                    });
                    // Nonaktifkan semua input di bagian donasi uang
                    moneyFields.querySelectorAll('input, select, textarea').forEach(input => {
                        input.setAttribute('disabled', 'true');
                    });
                }
            }

            // Jalankan saat halaman pertama kali dimuat untuk menetapkan status awal
            toggleDonationFields();

            // Tambahkan event listener untuk setiap perubahan pada radio button
            donationTypeRadios.forEach(radio => {
                radio.addEventListener('change', toggleDonationFields);
            });
        });

        // JavaScript untuk Nominal Buttons (ini sudah benar)
        document.querySelectorAll('.quick-amounts button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.quick-amounts button').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('nominal_amount_input').value = this.dataset.nominal;
            });
        });
    </script>
</body>

</html>