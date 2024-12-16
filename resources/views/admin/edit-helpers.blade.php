@extends('layouts.app')

@section('title', 'Edit Helper')

@section('content')
    <h1 class="mt-5">Edit Helper</h1>

    <!-- Form Section -->
    <form action="{{ route('admin.update-helper', $helper->id) }}" method="POST" class="mt-4">
        @csrf
        
        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Helper Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $helper->name) }}" 
                placeholder="Enter helper's name" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phone Field -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input 
                type="text" 
                id="phone" 
                name="phone" 
                class="form-control @error('phone') is-invalid @enderror" 
                value="{{ old('phone', $helper->phone) }}" 
                minlength="10" maxlength="13" 
                placeholder="Enter phone number" 
                required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- NIK Field -->
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input 
                type="text" 
                id="nik" 
                name="nik" 
                class="form-control @error('nik') is-invalid @enderror" 
                value="{{ old('nik', $helper->nik) }}" 
                minlength="16" maxlength="16" 
                placeholder="Enter NIK" 
                required>
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                minlength="6" maxlength="16" 
                placeholder="Leave blank if unchanged">
            <small class="text-muted">Leave blank if you don't want to change the password.</small>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update Helper</button>
    </form>

    <!-- Back to Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
@endsection
