<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donatur - GANDENG</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donatur-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="donatur-dashboard">
        <div class="dashboard-header">
            {{-- <h1>Halo, {{ Auth::user()->name }}!</h1> --}}
            <div class="actions">
                <a href="#">Edit Profil</a>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="main-area">
                <div class="summary-card">
                    <h3>Ringkasan Donasi Anda</h3>
                    <p>Total Donasi: Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                    <p>Jumlah Program yang Didukung: {{ $jumlahProgram }}</p>
                    <p>Ulasan yang Dikirim: {{ $jumlahUlasan }}</p>
                </div>

                <h2>Program yang Anda Dukung</h2>
                <ul class="program-list">
                    @foreach ($programDidukung as $program)
                        <li>
                            <a href="#">{{ $program->nama }}</a> - Rp {{ number_format($program->jumlah_donasi, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar">
                <h2>Rekomendasi Program</h2>
                <div class="program-recommendations">
                    <p>Belum ada rekomendasi saat ini.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>