<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Bantuln</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container text-center" style="max-width: 80%;">
        <img src="{{asset('logo.jpeg')}}" alt="Logo" class="mb-4" style="width: 80px;">
        <h1 class="h4 mb-4">Masuk Ke Bantuln</h1>
        {{-- <div class="mt-4">
            <button class="btn btn-outline-dark w-100 mb-3 d-flex align-items-center justify-content-center">
                <img src="https://img.icons8.com/color/16/google-logo.png" alt="Google Logo" class="me-2">
                Masuk dengan Google
            </button>
        </div> --}}
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </div>
        </form>
        <p class="mb-1">Belum punya akun? <a href="{{route('register')}}" class="text-decoration-none">Daftar</a></p>
        <a href="{{route('helper.login')}}">Login sebagai helper</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
