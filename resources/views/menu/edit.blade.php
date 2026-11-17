
@extends('layouts.app')

@section('title', 'Edit Menu | Resto & Coffee Shop')

@section('content')

<div class="page-head">
    <div class="eyebrow mb-2">Katalog menu</div>

    <h1 class="page-title h2 mb-2">Edit Menu</h1>

    <p class="lead-copy mb-0">
        Perbarui informasi dan foto makanan atau minuman kamu.
    </p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4 p-md-5">

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="stat-icon">✏️</div>

                <div>
                    <h2 class="h5 page-title mb-1">
                        Edit Informasi Menu
                    </h2>

                    <p class="text-secondary small mb-0">
                        Ubah informasi sesuai kebutuhan.
                    </p>
                </div>
            </div>

            <form
                action="{{ route('menu.update', $menu) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                @include('menu._form', [
                    'menu' => $menu,
                    'tombol' => 'Simpan Perubahan'
                ])

            </form>

        </div>
    </div>
</div>

@endsection
