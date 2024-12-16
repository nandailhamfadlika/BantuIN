@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<h1 class="mb-4">Edit Task</h1>

<form action="{{ route('user.update-task', $task->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nama Anda</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="task_name" class="form-label">Nama Tugas</label>
        <input type="text" class="form-control @error('task_name') is-invalid @enderror" id="task_name" name="task_name" value="{{ old('task_name', $task->task_name) }}">
        @error('task_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="task_description" class="form-label">Deskripsi Tugas</label>
        <textarea class="form-control resize-nonePP @error('task_description') is-invalid @enderror" id="task_description" name="task_description">{{ old('task_description', $task->task_description) }}</textarea>
        @error('task_description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="task_time_range" class="form-label">Deadline Pengerjaan (dd-mm-yyyy hh:mm)</label>
        <input type="datetime-local" class="form-control @error('task_time_range') is-invalid @enderror" name="task_time_range" id="task_time_range" value="{{ old('task_time_range', $task->task_time_range ? \Carbon\Carbon::parse($task->task_time_range)->format('Y-m-d\TH:i') : '') }}">
        @error('task_time_range')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Lokasi</label>
        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $task->location) }}">
        @error('location')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price_range" class="form-label">Range Harga</label>
        <input type="range" class="form-range border rounded-pill  @error('price_range') is-invalid @enderror" id="price_range" name="price_range" min="10000" max="500000" step="5000" value="{{ old('price_range', $task->price_range) }}" oninput="updateLabel(this.value)">
            <!-- Value Label -->
            <span id="rangeValue" class="ms-3 fw-bold">Rp{{ number_format(old('price_range', $task->price_range)) }}</span>
        @error('price_range')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
    <a href="{{ route('user.list-task') }}" class="btn btn-secondary">Cancel</a>
</form>

@section('script')
    <script type="text/javascript">
         function updateLabel(value) {
            document.getElementById('rangeValue').textContent = "Rp" + new Intl.NumberFormat().format(parseInt(value));
        }
    </script>
@endsection

@endsection
