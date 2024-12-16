@extends('layouts.app')

@section('title', 'Add Helper')

@section('content')
    <h1 class="mt-5">Add New Helper</h1>

    <!-- Form Section -->
    <form action="{{ route('admin.store-helper') }}" method="POST" class="mt-4">
        @csrf
        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Helper Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter helper's name" required>
        </div>

        <!-- Phone Field -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" minlength="10" maxlength="13" placeholder="Enter unique phone number" required>
        </div>

        <!-- NIK Field -->
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" id="nik" name="nik" class="form-control" minlength="16" maxlength="16" placeholder="Enter unique NIK" required>
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" minlength="6" maxlength="16" placeholder="Enter a secure password" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Helper</button>
    </form>

    <!-- Back to Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
@endsection
