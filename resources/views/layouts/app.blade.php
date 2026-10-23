<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Lowongan Kerja') | KarirKita</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <style>
        :root { --ink:#14213d; --paper:#f5f6f8; --teal:#0f766e; --amber:#b45309; }
        body { background: var(--paper); color: var(--ink); }
        .navbar-brand { font-weight: 700; letter-spacing: .2px; }
        .btn-teal { background: var(--teal); color:#fff; border:0; }
        .btn-teal:hover { background:#115e59; color:#fff; }
        .text-teal { color: var(--teal) !important; }
        .salary { color: var(--amber); font-weight: 600; }
        .job-card { border: 1px solid #e3e6eb; border-radius: .6rem; }
        .job-card img { height: 150px; object-fit: cover; border-radius: .6rem .6rem 0 0; }
        .hero { background: linear-gradient(90deg, rgba(20,33,61,.92) 40%, rgba(20,33,61,.55)),
                url('{{ asset('assets/images/hero.svg') }}') center/cover; color:#fff; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background:var(--ink)">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('jobs.index') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" width="30" height="30">
                KarirKita
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}"
                           href="{{ route('jobs.index') }}">Daftar Lowongan</a>
                    </li>
                    @foreach (['Full-time', 'Remote', 'Magang'] as $t)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobs.index', ['type' => $t]) }}">{{ $t }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    @yield('hero')

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="border-top py-4 mt-4 bg-white">
        <div class="container small text-muted d-flex flex-wrap justify-content-between">
            <span>&copy; {{ date('Y') }} KarirKita &middot; UTS Rekayasa Web-Julianto &middot; Universitas Pamulang</span>
            <span>Portal Lowongan Kerja</span>
        </div>
    </footer>

    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
