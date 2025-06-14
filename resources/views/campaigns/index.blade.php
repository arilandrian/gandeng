@extends('layouts.app')

{{-- Section untuk judul halaman, akan muncul di tab browser --}}
@section('title', 'Jelajahi Program - GANDENG')

{{-- Section untuk menambahkan file CSS khusus untuk halaman ini --}}
@push('styles')
    <link href="{{ asset('css/campaigns.css') }}" rel="stylesheet" />
@endpush

{{-- Section untuk konten utama halaman --}}
@section('content')
    <main>
        <div class="page-header">
            <h1>Program Sosial</h1>
            <p>Temukan program sosial yang ingin Anda dukung</p>
        </div>

        <div class="container">
            <div class="filter-section">
                <div class="filter-box">
                    <input type="text" placeholder="Cari nama program atau komunitas...">
                </div>
                <div class="filter-box">
                    <select>
                        <option>Semua Kategori</option>
                        <option>Pendidikan</option>
                        <option>Kemanusiaan</option>
                        <option>Lingkungan</option>
                    </select>
                </div>
                <div class="filter-box">
                    <select>
                        <option>Semua Lokasi</option>
                        <option>Kendari</option>
                        <option>Sulawesi Tenggara</option>
                    </select>
                </div>
            </div>

            <div class="campaign-grid">
                @forelse ($campaigns as $campaign)
                    <div class="campaign-card">
                        @if ($campaign->image_url)
                            <img src="{{ str_starts_with($campaign->image_url, 'http') ? $campaign->image_url : asset('storage/' . $campaign->image_url) }}"
                                class="card-img-top" alt="{{ $campaign->title }}">
                        @else
                            <div class="card-img-placeholder"></div>
                        @endif

                        <div class="card-body">
                            <h3 class="card-title">{{ $campaign->title }}</h3>
                            <p class="card-organization">{{ $campaign->komunitas->nama_organisasi ?? 'Komunitas GANDENG' }}
                            </p>

                            <div class="tags">
                                @if ($campaign->category == 'Pendidikan')
                                    <span class="tag tag-pendidikan">{{ $campaign->category }}</span>
                                @elseif($campaign->category == 'Kemanusiaan')
                                    <span class="tag tag-kemanusiaan">{{ $campaign->category }}</span>
                                @elseif($campaign->category == 'Lingkungan')
                                    <span class="tag tag-lingkungan">{{ $campaign->category }}</span>
                                @else
                                    <span class="tag tag-lainnya">{{ $campaign->category }}</span>
                                @endif
                                <span class="tag tag-lainnya">{{ $campaign->location }}</span>
                            </div>

                            <div class="progress-info">
                                <span class="amount">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                                <span class="percentage">{{ round($campaign->donation_percentage) }}%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $campaign->donation_percentage }}%;"
                                    aria-valuenow="{{ $campaign->donation_percentage }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <p class="target-info">Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                            </p>

                            <div class="time-left">
                                <i class="far fa-clock"></i>
                                <span>Sisa waktu penggalangan dana</span>
                            </div>

                            <div class="card-actions">
                                <a href="{{ route('campaigns.show')}}" class="btn-detail">Lihat
                                    Detail</a>
                                <a href="{{ route('campaigns.show') }}" class="btn-donate-now">Donasi
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center" style="grid-column: 1 / -1;">
                        <p>Belum ada program yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $campaigns->links() }}
            </div>

        </div>
    </main>
@endsection
