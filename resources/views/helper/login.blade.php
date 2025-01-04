@extends('layouts.app')

@section('title', 'Login Helper')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset('logo.jpeg')}}" alt="Logo" class="img-fluid mb-4" style="width:80px">
                    <h5 class="card-title">Masuk Ke Bantuln</h5>
                    <p class="text-muted">Helper</p>
                    <form method="POST" action="{{ route('helper.auth') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik')}}" maxlength="16" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-white w-100">Login</button>
                        <div class="mt-3">
                            <a href="{{ route('login') }}" class="text-muted">Masuk sebagai client</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection