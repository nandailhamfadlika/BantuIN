@extends('layouts.app')

@section('title', 'Login Helper')

@section('content')
    <h1 class="mt-5">Login Helper</h1>
    <form action="{{ route('helper.auth') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik')}}" maxlength="16" required>
            @error('nik')
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
        <a href="{{route('login')}}">Login sebagai user</a>
    </form>
@endsection
