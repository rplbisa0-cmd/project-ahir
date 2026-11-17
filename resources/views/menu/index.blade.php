```blade
@extends('layouts.app')

@section('title', 'Katalog Menu | Resto & Coffee Shop')

@section('content')
<style>
    .catalog-header {
        background: linear-gradient(135deg, #174b38, #36765a);
        color: white;
        border-radius: 22px;
        padding: 30px;
        margin-bottom: 25px;
    }

    .catalog-header .eyebrow {
        color: #d5eadb;
    }

    .catalog-header .page-title {
        color: white;
    }

    .catalog-header .lead-copy {
        color: #e0eee4;
    }

    .menu-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #e9eee9;
        border-radius: 18px;
        background: white;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(28, 70, 48, .12);
    }

    .menu-photo {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        background: #f0f3ed;
    }

    .menu-placeholder {
        height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #edf3e9, #f8f2e7);
        color: #467456;
        font-size: 46px;
    }

    .menu-placeholder span {
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .menu-card-body {
        padding: 18px;
    }

    .menu-category {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        background: #edf5ed;
        color: #2f6847;
        font-size: 12px;
        font-weight: 600;
    }

    .menu-price {
        color: #247447;
        font-size: 19px;
        font-weight: 750;
    }

    .menu-description {
        min-height: 42px;
        color: #788078;
        font-size: 13px;
        line-height: 1.6;
    }

    .menu-actions {
        display: flex;
        gap: 8px;
        padding-top: 14px;
        border-top: 1px solid #edf0eb;
    }

    .menu-actions .btn {
        flex: 1;
    }

    .catalog-stat {
        height: 100%;
        padding: 20px;
        border: 1px solid #e9eee9;
        border-radius: 16px;
        background: white;
    }

    .empty-catalog {
        padding: 55px 20px;
        text-align: center;
    }

    .empty-catalog-icon {
        font-size: 55px;
        margin-bottom: 12px;
    }
</style>

<div class="catalog-header">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <div class="eyebrow mb-2">RESTO & COFFEE SHOP</div>
            <h1 class="page-title h2 mb-2">Katalog Menu</h1>
            <p class="lead-copy mb-0">
                Kelola menu favorit pelanggan, mulai dari makanan hingga minuman.
            </p>
        </div>

        <a href="{{ route('menu.create') }}"
           class="btn btn-light fw-semibold">
            ＋ Tambah Menu
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Tutup"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Tutup"></button>
    </div>
@endif

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="catalog-stat">
            <div class="text-secondary small mb-2">Total menu terdaftar</div>
            <div class="h3 fw-bold mb-0">{{ $menus->total() }}</div>
            <div class="text-secondary small mt-1">Menu dalam katalog</div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="catalog-stat">
            <div class="text-secondary small mb-2">Kategori menu</div>
            <div class="h5 fw-bold mb-0">🍽️ Makanan &nbsp; ☕ Minuman</div>
            <div class="text-secondary small mt-2">Pilihan untuk pelanggan</div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <div>
        <div class="section-label">DAFTAR KATALOG</div>
        <h2 class="h4 page-title mt-1 mb-0">Pilihan Menu</h2>
    </div>

    <span class="badge-category">
        {{ $menus->total() }} menu
    </span>
</div>

<div class="row g-4">
    @forelse ($menus as $menu)
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="menu-card">

                @if ($menu->gambar && file_exists(public_path('storage/' . $menu->gambar)))
                    <img
                        src="{{ asset('storage/' . $menu->gambar) }}"
                        alt="Foto {{ $menu->nama }}"
                        class="menu-photo"
                        loading="lazy"
                    >
                @else
                    <div class="menu-placeholder">
                        {{ $menu->kategori === 'Minuman' ? '☕' : '🍽️' }}
                        <span>Foto menu belum tersedia</span>
                    </div>
                @endif

                <div class="menu-card-body">
                    <span class="menu-category">
                        {{ $menu->kategori === 'Minuman' ? '☕' : '🍽️' }}
                        {{ $menu->kategori }}
                    </span>

                    <h3 class="h5 fw-bold mt-3 mb-2">
                        {{ $menu->nama }}
                    </h3>

                    <div class="menu-price mb-2">
                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                    </div>

                    <p class="menu-description mb-3">
                        {{ $menu->deskripsi ?: 'Nikmati pilihan menu spesial dari kami.' }}
                    </p>

                    <div class="menu-actions">
                        <a href="{{ route('menu.edit', $menu) }}"
                           class="btn btn-sm btn-outline-primary">
                            ✏️ Edit
                        </a>

                        <form
                            action="{{ route('menu.destroy', $menu) }}"
                            method="POST"
                            class="flex-fill"
                            onsubmit="return confirm('Yakin ingin menghapus menu ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger w-100">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="catalog-stat empty-catalog">
                <div class="empty-catalog-icon">🥐</div>
                <h3 class="h4 page-title">Belum ada menu</h3>
                <p class="text-secondary">
                    Tambahkan menu pertama untuk mulai mengisi katalog resto kamu.
                </p>
                <a href="{{ route('menu.create') }}" class="btn btn-primary">
                    ＋ Tambah Menu Pertama
                </a>
            </div>
        </div>
    @endforelse
</div>

@if ($menus->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $menus->links() }}
    </div>
@endif

@endsection
```
