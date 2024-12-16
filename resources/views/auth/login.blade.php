@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1 class="mt-5">Login</h1>
    <form action="{{ route('auth') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{route('helper.login')}}">Login sebagai helper</a>
    </form>
@endsection
