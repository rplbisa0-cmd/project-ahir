
@extends('layouts.app')

@section('title', 'Tambah Menu | Resto & Coffee Shop')

@section('content')

<div class="page-head">
    <div class="eyebrow mb-2">Katalog menu</div>

    <h1 class="page-title h2 mb-2">
        Tambahkan menu baru
    </h1>

    <p class="lead-copy mb-0">
        Lengkapi detail menu agar siap ditampilkan di daftar.
    </p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4 p-md-5">

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="stat-icon">✨</div>

                <div>
                    <h2 class="h5 page-title mb-1">
                        Informasi menu
                    </h2>

                    <p class="text-secondary small mb-0">
                        Kolom bertanda wajib harus diisi.
                    </p>
                </div>
            </div>

            <form
                action="{{ route('menu.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                @include('menu._form', [
                    'tombol' => 'Simpan Menu'
                ])

            </form>

        </div>
    </div>
</div>

@endsection
