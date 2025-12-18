<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home | Sistem Informasi</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">SEKP</a>

        <div class="d-flex">
            @auth
                <a href="/{{ auth()->user()->role }}" class="btn btn-success me-2">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light">
                    Login
                </a>
            @endauth
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Selamat Datang di Sistem Informasi</h1>
        <p class="lead mb-4">
            Sistem terintegrasi untuk Admin, Manager, Karyawan, dan User
        </p>

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                Login Sekarang
            </a>
        @endguest
    </div>
</section>

<!-- INFO ROLE -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Admin</h5>
                        <p class="card-text">
                            Mengelola user dan sistem
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Manager</h5>
                        <p class="card-text">
                            Monitoring dan laporan
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Karyawan</h5>
                        <p class="card-text">
                            Absensi dan jobdesk
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>
                        <p class="card-text">
                            Akses informasi umum
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-light text-center py-3">
    <small>
        © {{ date('Y') }} SEKP | Tugas Web Programming
    </small>
</footer>

</body>
</html>
