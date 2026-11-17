
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Resto & Coffee Shop')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --forest: #244b3d;
            --forest-dark: #18382d;
            --cream: #f7f5ef;
            --paper: #fffefa;
            --accent: #c58b5b;
            --ink: #26332d;
            --muted: #7a847d;
            --line: #e9e7df;
            --mint: #eaf2ec;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--cream);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-size: .95rem;
            min-height: 100vh;
        }

        .navbar {
            background: var(--forest-dark);
            padding: .95rem 0;
            box-shadow: 0 8px 28px #18382d18;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.28rem;
            font-weight: 700;
            letter-spacing: .1px;
        }

        .brand-mark {
            display: inline-grid;
            place-items: center;
            width: 37px;
            height: 37px;
            border-radius: 12px;
            background: #ffffff18;
            margin-right: 9px;
            color: #e8c7a4;
        }

        .nav-link {
            color: #e7eee8 !important;
            border-radius: 10px;
            padding: .62rem .85rem !important;
            font-size: .9rem;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #ffffff16;
            color: #fff !important;
        }

        main.container {
            max-width: 1160px;
        }

        .page-head {
            margin: 1.5rem 0 1.65rem;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: .7rem;
            font-weight: 700;
            color: var(--accent);
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            color: var(--forest-dark);
            font-weight: 700;
            letter-spacing: -.4px;
        }

        .lead-copy {
            color: var(--muted);
            font-size: .95rem;
        }

        .card {
            background: var(--paper);
            border: 1px solid #eeece5;
            border-radius: 20px;
            box-shadow: 0 10px 28px #26332d08;
        }

        .card-soft {
            background: linear-gradient(135deg, #fffefa, #f3f6f0);
        }

        .btn {
            border-radius: 11px;
            font-weight: 600;
            padding: .65rem 1rem;
            transition: transform .18s, box-shadow .18s;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--forest);
            border-color: var(--forest);
            box-shadow: 0 5px 12px #244b3d18;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: var(--forest-dark);
            border-color: var(--forest-dark);
        }

        .btn-outline-primary {
            color: var(--forest);
            border-color: #cbd8ce;
        }

        .btn-outline-primary:hover {
            background: var(--forest);
            border-color: var(--forest);
        }

        .btn-light {
            background: #f1f1eb;
            border-color: #f1f1eb;
            color: #49534c;
        }

        /* Tombol aksi dashboard */
        .btn-dashboard {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 17px;
            border: 1px solid #cbd8ce;
            border-radius: 12px;
            background: var(--paper);
            color: var(--forest);
            font-family: 'DM Sans', sans-serif;
            font-size: .88rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .btn-dashboard:hover {
            background: var(--forest);
            border-color: var(--forest);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px #244b3d20;
        }

        .btn-dashboard:focus-visible {
            outline: 3px solid #a9c2b1;
            outline-offset: 3px;
        }

        .text-accent {
            color: var(--accent);
        }

        .stat-number {
            font-size: 1.9rem;
            font-weight: 700;
            color: var(--forest-dark);
            letter-spacing: -1px;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: var(--mint);
            font-size: 1.25rem;
        }

        .table {
            --bs-table-bg: transparent;
            margin-bottom: 0;
        }

        .table thead th {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: #758078;
            border-bottom: 1px solid var(--line);
            font-weight: 700;
            padding: 1rem .85rem;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 1rem .85rem;
            border-color: #f0eee8;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: 0;
        }

        .table tbody tr:hover {
            --bs-table-bg: #faf9f4;
        }

        .badge-category {
            background: #edf3ed;
            color: var(--forest);
            font-weight: 600;
            border-radius: 50px;
            padding: .45rem .7rem;
        }

        .price {
            font-weight: 700;
            color: var(--forest);
        }

        .form-label {
            font-weight: 600;
            color: #38463d;
            font-size: .88rem;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border-color: #e1e3da;
            padding: .75rem .9rem;
            background-color: var(--paper);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #88a995;
            box-shadow: 0 0 0 .22rem #244b3d13;
        }

        .form-text {
            color: var(--muted);
        }

        .menu-visual {
            height: 135px;
            border-radius: 15px;
            background: linear-gradient(145deg, #f4e7d7, #f5f0e5);
            display: grid;
            place-items: center;
            font-size: 3.6rem;
        }

        .menu-tile {
            height: 100%;
            transition: transform .2s, box-shadow .2s;
        }

        .menu-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px #26332d10;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
            color: var(--muted);
        }

        .empty-icon {
            font-size: 2.5rem;
            margin-bottom: .75rem;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            padding: .6rem 0;
            color: #657168;
        }

        .summary-line strong {
            color: var(--ink);
        }

        .summary-total {
            border-top: 1px dashed #d8ddd5;
            margin-top: .4rem;
            padding-top: 1rem;
            font-size: 1.12rem;
        }

        .alert {
            border: 0;
            border-radius: 14px;
        }

        .pagination {
            gap: 4px;
        }

        .page-link {
            border: 0;
            border-radius: 9px !important;
            color: var(--forest);
        }

        .page-item.active .page-link {
            background: var(--forest);
        }

        footer {
            color: #89928a;
            font-size: .8rem;
            padding-bottom: 1.5rem !important;
        }

        .hero-panel {
            background: linear-gradient(120deg, #1c4032, #315b49);
            border-radius: 24px;
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero-panel:after {
            content: '☕';
            position: absolute;
            right: 4%;
            top: -25%;
            font-size: 10rem;
            opacity: .08;
            transform: rotate(-12deg);
            pointer-events: none;
        }

        .hero-panel .page-title {
            color: #fff;
        }

        .hero-panel p {
            color: #dce7de;
        }

        .section-label {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--muted);
        }

        @media (max-width: 767px) {
            .hero-panel {
                padding: 1.5rem;
            }

            .page-head {
                margin-top: 1rem;
            }

            .table tbody td {
                padding: .8rem .65rem;
            }

            .navbar-brand {
                font-size: 1.08rem;
            }

            .btn-dashboard {
                white-space: normal;
                text-align: center;
            }
        }

        @media print {
            .navbar,
            footer,
            .no-print,
            .btn {
                display: none !important;
            }

            body {
                background: #fff;
            }

            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center"
               href="{{ route('dashboard') }}">
                <span class="brand-mark">☕</span>
                <span>Resto <span style="color:#d5a879">&amp;</span> Coffee</span>
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false"
                    aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <div class="navbar-nav ms-auto mt-3 mt-lg-0">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        ⌂ Dashboard
                    </a>

                    <a class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}"
                       href="{{ route('menu.index') }}">
                        ▦ Data Menu
                    </a>

                    <a class="nav-link {{ request()->routeIs('transaksi.create') ? 'active' : '' }}"
                       href="{{ route('transaksi.create') }}">
                        ＋ Transaksi Baru
                    </a>

                    <a class="nav-link {{ request()->routeIs('transaksi.index', 'transaksi.show') ? 'active' : '' }}"
                       href="{{ route('transaksi.index') }}">
                        ◷ Riwayat
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container pb-5 pt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✓ {{ session('success') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="container text-center py-3">
        Dibuat dengan ☕ · Resto &amp; Coffee Shop · Aplikasi Manajemen Sederhana
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
