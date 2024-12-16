@extends('layouts.app')

@section('title', 'User Homepage')

@section('content')
    {{-- <p>{{ Auth::user()->role }}</p> --}}
    <h1 class="mt-5">Selamat Datang di BantuIN</h1>
    <p>Kami siap membantu kebutuhan Anda dengan jasa bantu terbaik.</p>
    <a href="{{ Auth::user() ? route('user.create-task') : route('login') }}" class="btn btn-primary">{{ Auth::user() ? 'Request Helper Sekarang' : 'Login Sekarang' }}</a>
@endsection
