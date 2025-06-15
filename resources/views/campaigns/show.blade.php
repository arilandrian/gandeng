@extends('layouts.app')

@section('title', $campaign->title . ' - GANDENG')

@push('styles')
    {{-- Anda bisa membuat file css baru jika diperlukan --}}
    <style>
        .campaign-header { margin-bottom: 2rem; }
        .campaign-image { border-radius: 15px; max-height: 500px; width: 100%; object-fit: cover; }
        .organizer-info { display: flex; align-items: center; gap: 15px; margin-top: 1.5rem; }
        .organizer-logo { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; }
        .donation-card { background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
    </style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="campaign-header">
                <h1>{{ $campaign->title }}</h1>
                <div class="organizer-info">
                    <img src="https://ui-avatars.com/api/?name={{ $campaign->komunitas->nama_organisasi }}&background=0D8ABC&color=fff" alt="Logo Komunitas" class="organizer-logo">
                    <div>
                        <span class="d-block">Diselenggarakan oleh:</span>
                        <strong class="text-primary">{{ $campaign->komunitas->nama_organisasi }}</strong>
                    </div>
                </div>
            </div>

            <img src="{{ str_starts_with($campaign->image_url, 'http') ? $campaign->image_url : asset('storage/' . $campaign->image_url) }}" alt="{{ $campaign->title }}" class="img-fluid campaign-image mb-4">

            <h4 class="mt-5">Deskripsi Program</h4>
            <hr>
            <div class="description-content">
                {!! nl2br(e($campaign->description)) !!}
            </div>
        </div>

        <div class="col-lg-4">
            <div class="donation-card sticky-top" style="top: 100px;">
                <h5 class="mb-3">Dukung Program Ini</h5>
                <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $campaign->donation_percentage }}%;" aria-valuenow="{{ $campaign->donation_percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold small">Terkumpul</span>
                    <span class="fw-bold small">Target</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-success fw-bold">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                    <span class="text-muted">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                </div>

                <div class="d-grid">
                     <a href="{{ route('donations.create', $campaign) }}" class="btn btn-primary btn-lg">Donasi Sekarang</a>
                </div>

                <ul class="list-group list-group-flush mt-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Donatur
                        <span>- Orang</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Berakhir Dalam
                        <span>- Hari Lagi</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection