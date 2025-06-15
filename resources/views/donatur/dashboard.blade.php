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
            <h1>Halo, {{ Auth::user()->name }}!</h1>
            <div class="actions">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="main-area">
                <div class="summary-card">
                    <h3>Ringkasan Akun Anda</h3>
                    <p>Total Donasi: <strong>Rp {{ number_format($totalDonasi, 0, ',', '.') }}</strong></p>
                    <p>Jumlah Program yang Didukung: <strong>{{ $jumlahCampaign }} Program</strong></p>
                    <p>Ulasan yang Dikirim: <strong>{{ $jumlahUlasan }} Ulasan</strong></p>
                </div>

                <h2>Program yang Anda Dukung</h2>
                @if($programDidukung->isEmpty())
                    <p>Anda belum mendukung program apapun. <a href="{{ route('campaigns.index') }}">Mulai berdonasi sekarang!</a></p>
                @else
                    <ul class="program-list">
                        @foreach ($programDidukung as $donasi)
                            <li>
                                <a href="#">{{ $donasi->campaign->title ?? 'Program Dihapus' }}</a> - 
                                <span>Total Donasi: Rp {{ number_format($donasi->total_donasi_per_campaign, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="sidebar">
                <h2>Navigasi Cepat</h2>
                <a href="{{ route('donatur.history') }}" class="btn btn-primary" style="margin-bottom: 10px; display: block;">Riwayat Donasi Saya</a>
                <a href="{{ route('donatur.reviews') }}" class="btn btn-info" style="display: block;">Ulasan Saya</a>
            </div>
        </div>
    </div>
</body>
</html>