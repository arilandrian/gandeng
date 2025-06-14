<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Donatur GANDENG</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/register-donatur.css') }}" rel="stylesheet" />
    </head>

<body>
    <div class="register-container">
        <div class="header">
            <a href="{{ route('login') }}" class="text-decoration-none back-arrow">&leftarrow;</a>
            <h4 class="text-center">Daftar Akun Baru</h4>
        </div>

        <form method="POST" action="{{ route('register.donatur') }}">
            @csrf <div class="mb-3">
                <label for="donatur_name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="donatur_name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="donatur_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="donatur_email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="donatur_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="donatur_password" name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="donatur_confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="donatur_confirm_password" name="password_confirmation" required>
                </div>

            <div class="mb-3">
                <label for="donatur_domicile" class="form-label">Pilihan Domisili</label>
                <select class="form-select" id="donatur_domicile" name="domicile" required>
                    <option value="">Pilih Domisili</option>
                    <option value="Kendari" {{ old('domicile') == 'Kendari' ? 'selected' : '' }}>Kendari</option>
                    </select>
                @error('domicile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms" required>
                <label class="form-check-label" for="agree_terms">Saya setuju dengan <a href="#">Syarat & Ketentuan</a></label>
            </div>

            <button type="submit" class="btn btn-gandeng w-100">Daftar</button>

            <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>