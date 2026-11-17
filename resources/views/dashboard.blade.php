
@extends('layouts.app')

@section('title', 'Dashboard | Resto & Coffee Shop')

@section('content')

{{-- Sambutan dashboard --}}
<div class="hero-panel mb-4">
    <div class="eyebrow mb-2" style="color:#e5bc93">
        Selamat datang di
    </div>

    <h1 class="page-title h2 mb-2">
        Resto & Coffee Shop
    </h1>

    <p class="mb-4">
        Kelola menu, layani pesanan, dan pantau transaksi harian dengan lebih mudah.
    </p>

    <a href="{{ route('transaksi.create') }}" class="btn btn-light">
        ＋ Mulai Transaksi
    </a>
</div>

{{-- Statistik dashboard --}}
<div class="row g-3 mb-4">

    {{-- Jumlah menu --}}
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-secondary small mb-2">
                        Jumlah Menu
                    </div>
                    <div class="stat-number">
                        {{ $jumlahMenu }}
                    </div>
                </div>

                <div class="stat-icon">🍽️</div>
            </div>

            <div class="mt-4">
                <a href="{{ route('menu.index') }}" class="btn-dashboard">
                    ▦ Kelola Katalog <span>→</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Total transaksi --}}
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-secondary small mb-2">
                        Total Transaksi
                    </div>
                    <div class="stat-number">
                        {{ $jumlahTransaksi }}
                    </div>
                </div>

                <div class="stat-icon">🧾</div>
            </div>

            <div class="mt-4">
                <a href="{{ route('transaksi.index') }}" class="btn-dashboard">
                    ◷ Lihat Riwayat <span>→</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Pendapatan hari ini --}}
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-secondary small mb-2">
                        Pendapatan Hari Ini
                    </div>

                    <div class="stat-number" style="font-size:1.55rem">
                        Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                    </div>
                </div>

                <div class="stat-icon">📈</div>
            </div>

            <span class="small text-secondary mt-4">
                Berdasarkan transaksi hari ini
            </span>
        </div>
    </div>

</div>

{{-- Daftar transaksi terbaru --}}
<div class="card p-3 p-md-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="section-label">
                Aktivitas terbaru
            </div>

            <h2 class="h5 page-title mt-1 mb-0">
                Transaksi terbaru
            </h2>
        </div>

        <a href="{{ route('transaksi.index') }}" class="btn-dashboard">
            Lihat Semua <span>→</span>
        </a>
    </div>

    @if ($transaksiTerbaru->isEmpty())

        <div class="empty-state">
            <div class="empty-icon">☕</div>

            <h3 class="h5 page-title">
                Belum ada transaksi
            </h3>

            <p class="mb-3">
                Yuk, mulai catat pesanan pertama dari pelanggan.
            </p>

            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                ＋ Buat Transaksi
            </a>
        </div>

    @else

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Total Belanja</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transaksiTerbaru as $transaksi)
                        <tr>
                            <td>
                                <span class="badge-category">
                                    #{{ $transaksi->id }}
                                </span>
                            </td>

                            <td>
                                {{ $transaksi->tanggal->format('d/m/Y H:i') }}
                            </td>

                            <td class="price">
                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </td>

                            <td class="text-end">
                                <a
                                    class="btn btn-sm btn-outline-primary"
                                    href="{{ route('transaksi.show', $transaksi) }}"
                                >
                                    Detail →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

</div>

@endsection
