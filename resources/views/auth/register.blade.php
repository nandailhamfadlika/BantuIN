@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container text-center" style="max-width: 80%;">
    <h1 class="mx-5">Register</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input placeholder="Nama" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark w-100 mb-3">Register</button>
    </form>
    <p class="mb-1">sudah punya akun? <a href="{{route('login')}}" class="text-decoration-none">masuk</a></p>
</div>
</div>
    @endsection
    