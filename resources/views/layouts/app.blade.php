<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BantuIN')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BantuIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ (Auth::user() ? route('user.index') : Auth::guard('admins')->user()) ? route('admin.dashboard') : route('helper.dashboard') }}">Home</a>
                    </li>
                    
                    @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.create-task') }}">Request Helper</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.list-task') }}">List Request</a>
                        </li>

                        <li class="nav-item">
                            <form action="{{route('user.logout')}}" method="post">
                                @csrf
                                <button class="nav-link" href="{{ route('user.logout') }}">Logout</button>
                            </form>
                        </li>
                    @elseif (Auth::guard('admins')->user())
                        <li class="nav-item">
                            <form action="{{route('admin.logout')}}" method="post">
                                @csrf
                                <button class="nav-link" href="{{ route('admin.logout') }}">Logout</button>
                            </form>
                        </li>
                    @elseif (Auth::guard('helpers')->user())
                        <li class="nav-item">
                            <form action="{{route('helper.logout')}}" method="post">
                                @csrf
                                <button class="nav-link" href="{{ route('helper.logout') }}">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>

    <footer class="bg-light text-center py-3 mt-5">
        <p class="mb-0">© 2024 BantuIN. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>
</html>
