@extends('layouts.app')

@section('title', 'Dashboard Helper')

@section('content')
    <h1 class="mt-5">Dashboard Helper</h1>

    <!-- Available Tasks Section -->
    <h2>Available Tasks</h2>
    @if ($tasks->isEmpty())
        <p class="text-muted">No tasks available at the moment.</p>
    @else
        <ul class="list-group mb-4">
            @foreach ($tasks as $task)
                <li class="list-group-item">
                    <h5>{{ $task->task_name }}</h5>
                    <p>{{ $task->task_description }}</p>
                    <p><strong>Location:</strong> {{ $task->location }}</p>
                    <p><strong>Price Range:</strong> {{ number_format($task->price_range) }}</p>
                    <p><strong>Jangka Waktu:</strong> {{ $task->task_time_range }}</p>
                    <form action="{{ route('helper.confirm-task', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Confirm Task</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Ongoing Tasks Section -->
    <h2>Ongoing Tasks</h2>
    @if ($activeTasks->isEmpty())
        <p class="text-muted">No ongoing tasks.</p>
    @else
        <ul class="list-group mb-4">
            @foreach ($activeTasks as $task)
                <li class="list-group-item">
                    <h5>{{ $task->task_name }}</h5>
                    <p>{{ $task->task_description }}</p>
                    <form action="{{ route('helper.complete-task', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Mark as Completed</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Ongoing Tasks Section -->
    <h2>Completed Tasks</h2>
    @if ($completedTasks->isEmpty())
        <p class="text-muted">No completed tasks.</p>
    @else
        <ul class="list-group mb-4">
            @foreach ($completedTasks as $task)
                <li class="list-group-item">
                    <h5>{{ $task->task_name }}</h5>
                    <p>{{ $task->task_description }}</p>
                    <p><strong>Price Range:</strong> {{ number_format($task->price_range) }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
