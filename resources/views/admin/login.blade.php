@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <h1 class="mt-5">Login Admin</h1>
    <form action="{{ route('admin.auth') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required>
            @error('name')
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
    </form>
@endsection
