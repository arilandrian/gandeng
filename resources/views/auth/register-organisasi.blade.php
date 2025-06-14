<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Organisasi - GANDENG</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="register-container">
        <div class="header">
            <a href="{{ route('landing') }}" class="text-decoration-none back-arrow">&leftarrow;</a>
            <h4 class="text-center">Daftar Akun Baru</h4>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.komunitas') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_organisasi" class="form-label">Nama Organisasi</label>
                <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi"
                    value="{{ old('nama_organisasi') }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap (Penanggung Jawab)</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                    value="{{ old('nomor_telepon') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <div class="mb-3">
                <label for="kategori_organisasi" class="form-label">Kategori Organisasi</label>
                <select class="form-select" id="kategori_organisasi" name="kategori_organisasi" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Pendidikan" {{ old('kategori_organisasi') == 'Pendidikan' ? 'selected' : '' }}>
                        Pendidikan</option>
                    <option value="Kesehatan" {{ old('kategori_organisasi') == 'Kesehatan' ? 'selected' : '' }}>
                        Kesehatan</option>
                    <option value="Lingkungan" {{ old('kategori_organisasi') == 'Lingkungan' ? 'selected' : '' }}>
                        Lingkungan</option>
                    <option value="Sosial" {{ old('kategori_organisasi') == 'Sosial' ? 'selected' : '' }}>Sosial
                    </option>
                    <option value="Kemanusiaan" {{ old('kategori_organisasi') == 'Kemanusiaan' ? 'selected' : '' }}>
                        Kemanusiaan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="document_path" class="form-label">Upload Dokumen Pendukung (PDF)</label>
                <input type="file" class="form-control" id="document_path" name="document_path" accept=".pdf">
                <div class="form-text">Maksimal ukuran file: 2MB</div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms" required>
                <label class="form-check-label" for="agree_terms">Saya menyatakan data yang saya berikan benar</label>
            </div>

            <button type="submit" class="btn btn-gandeng w-100">Daftar</button>
        </form>
    </div>
</body>

</html>
