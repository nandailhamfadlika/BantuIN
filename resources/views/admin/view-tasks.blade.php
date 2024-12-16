@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <h1 class="mt-5">Task List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tugas</th>
                <th>Nama Pemberi Tugas</th>
                <th>Deskripsi</th>
                <th>Nama Helper</th>
                <th>Rating</th>
                <th>Deskripsi Rating</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $index => $task)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->task_description }}</td>
                <td>{{ $task->helper_name }}</td>
                <td>{{ $task->rating }}</td>
                <td>{{ $task->review_description }}</td>
                <td>
                    @if ($task->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif ($task->status == 'in_progress')
                        <span class="badge bg-info">In Progress</span>
                    @else
                        <span class="badge bg-success">Completed</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
