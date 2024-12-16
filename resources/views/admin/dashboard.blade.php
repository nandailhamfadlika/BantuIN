@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="mt-5">Dashboard Admin</h1>
    <div class="list-group">
        <a href="{{ route('admin.manage-users') }}" class="list-group-item list-group-item-action">Manage Users</a>
        <a href="{{ route('admin.manage-helpers') }}" class="list-group-item list-group-item-action">Manage Helpers</a>
        <a href="{{ route('admin.view-tasks') }}" class="list-group-item list-group-item-action">View Tasks</a>
    </div>
@endsection
