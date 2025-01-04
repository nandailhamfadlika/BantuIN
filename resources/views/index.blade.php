<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BantuIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-service {
            width: 100%;
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
            padding: 15px;
        }
        .service-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .promo-box {
            height: 100px;
            border: 2px dashed #ddd;
            border-radius: 10px;
            text-align: center;
            line-height: 100px;
        }
        .nav-item {
            text-align: center;
        }
        .nav-link {
            color: black;
        }
        .horizontal-scroll {
            overflow-x: auto;
            white-space: nowrap;
        }
        .horizontal-scroll .card {
            display: inline-block;
            width: 150px;
            margin-right: 10px;
        }
        .horizontal-scroll .promo-box {
            display: inline-block;
            width: 150px;
            margin-right: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="fw-bold">Bantu<span class="text-danger">IN</span></h1>
        @if (Auth::user())
            <p>Halo <strong>{{ Auth::user()->name }}</strong><br>Kamu lagi perlu apa hari ini?</p>
        @else
        <p>Anda belum login, silakan login terlebih dahulu</p>
        @endif
        {{-- <p>Halo <span class="fw-bold">Honne Doe</span><br>Kamu lagi perlu apa hari ini?</p> --}}

        {{-- <div class="card mb-4">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <img src="placeholder.png" alt="Jenis Jasa" style="width: 50px; height: 50px;">
                </div>
                <div class="flex-grow-1">
                    <h5 class="mb-0">Jenis Jasa</h5>
                    <p class="mb-0 text-muted">Rp100.000 - Rp150.000</p>
                </div>
                <div>
                    <img src="avatar.png" alt="John Doe" class="rounded-circle" style="width: 50px; height: 50px;">
                    <p class="mb-0 text-center text-muted">Helper</p>
                </div>
            </div>
        </div> --}}

        <h5 class="fw-bold">Ada yang Bisa Kami Bantu?</h5>
        <div class="row text-center mb-4">
            <div class="col-6 col-md-3 mb-3">
                <button class="card-service bg-white" onclick="window.location.href='{{ Auth::user() ? route('user.create-task') : route('login') }}'">
                    <div class="service-icon">🛍️</div>
                    <p>Jasa Belanja</p>
                </button>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <button class="card-service bg-white" onclick="window.location.href='{{ Auth::user() ? route('user.create-task') : route('login') }}'">
                    <div class="service-icon">🧹</div>
                    <p>Jasa Kebersihan</p>
                </button>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <button class="card-service bg-white" onclick="window.location.href='{{ Auth::user() ? route('user.create-task') : route('login') }}'">
                    <div class="service-icon">🌼</div>
                    <p>Jasa Berkebun</p>
                </button>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <button class="card-service bg-white" onclick="window.location.href='{{ Auth::user() ? route('user.create-task') : route('login') }}'">
                    <div class="service-icon">🍳</div>
                    <p>Jasa Masak</p>
                </button>
            </div>
            <div class=" col-6 col-md-3 mb-3">
                <button class="card-service bg-white" onclick="window.location.href='{{ Auth::user() ? route('user.create-task') : route('login') }}'">
                    <div class="service-icon">🛠️</div>
                    <p>Jasa Bantuan</p>
                </button>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <button class="card-service bg-white " onclick="window.location.href='{{ Auth::user() ? route('user.create-task') : route('login') }}'">
                    <div class="service-icon">🔍</div>
                    <p>Lainnya</p>
                </button>
            </div>
        </div>

        <h5 class="fw-bold">Promo</h5>
        <div class="horizontal-scroll mb-4">
            <div class="promo-box">Poster</div>
            <div class="promo-box">Poster</div>
            <div class="promo-box">Poster</div>
        </div>
    </div>

    <nav class="navbar navbar-light bg-white border-top fixed-bottom">
        <div class="container-fluid d-flex justify-content-around">
            <a href="#" class="nav-link">
                <div class="nav-item">
                    <span>🏠</span>
                    <p>Beranda</p>
                </div>
            </a>
            <a href="{{ route('user.list-task') }}" class="nav-link">
                <div class="nav-item">
                    <span>📜</span>
                    <p>Riwayat</p>
                </div>
            </a>
            <form action="{{route('user.logout')}}" method="post">
                @csrf
                <div class="nav-item">

                    <button class="nav-link" href="{{ route('user.logout') }}">👤<br>Logout</button>
                </div>
            </form>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
