<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Organisasi - GANDENG</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600|Inter:400" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register-organization.css') }}">
</head>
<body>
    <div class="register-organization">
        <div class="container">
            <div class="register-card">
                <img class="arrow-left" alt="Arrow left" src="{{ asset('images/arrow-left.png') }}" />
                <h1 class="title">Daftar Organisasi</h1>
                <form>
                    <div class="form-group">
                        <label for="organization-name">Nama Organisasi</label>
                        <input type="text" id="organization-name" name="organization-name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Konfirmasi Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                    <div class="form-group">
                        <label for="organization-type">Jenis Organisasi</label>
                        <select id="organization-type" name="organization-type" required>
                            <option value="">Pilih jenis organisasi</option>
                            <option value="ngo">NGO</option>
                            <option value="foundation">Yayasan</option>
                            <option value="community">Komunitas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="organization-focus">Fokus Organisasi</label>
                        <input type="text" id="organization-focus" name="organization-focus" required>
                    </div>
                    <button type="submit" class="register-button">Daftar</button>
                </form>
                <p class="login-link">Sudah punya akun? <a href="#">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
</html>
