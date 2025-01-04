@extends('layouts.app')

@section('title', 'Daftar Tugas Anda')

@section('content')
    <h1 class="mt-5">Daftar Tugas Anda</h1>
    @if ($tasks->isEmpty())
        <p class="text-muted">Belum ada tugas yang Anda buat.</p>
        <a href="{{ route('user.create-task') }}" class="btn btn-primary">Buat Tugas Baru</a>
    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Tugas</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Nama Helper</th>
                    <th>Nomor Telepon Helper</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->task_description }}</td>
                        <td>
                            @if ($task->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($task->status == 'ongoing')
                                <span class="badge bg-info">In Progress</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif
                        </td>
                        <td>{{ @$task->helper_name ? $task->helper_name : 'Belum ada' }}</td>
                        <td>{{ @$task->helper_phone ? $task->helper_phone : 'Belum ada' }}</td>
                        <td>
                            @if ($task->status == 'pending')
                                <!-- Edit Task Button -->
                                <a href="{{ route('user.edit-task', $task->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <!-- Delete Task Button -->
                                <form action="{{ route('user.delete-task', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="task_id" value="{{$task->id}}">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                        Hapus
                                    </button>
                                </form>
                            @elseif ($task->status == 'in_progress')
                                <!-- Mark as Completed Button -->
                                <form action="{{ route('user.complete-task', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Tandai Selesai
                                    </button>
                                </form>
                            @elseif ($task->status == 'completed' && !$task->review_id)
                                <a href="{{route('user.review.create', $task->id)}}" class="btn btn-primary btn-sm">Berikan Review</a>
                            @else
                                <span class="text-muted">Tidak ada aksi tersedia</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <nav class="navbar navbar-light bg-white border-top fixed-bottom">
        <div class="container-fluid d-flex justify-content-around">
            <a href="{{ route('user.index') }}" class="nav-link">
                <div class="nav-item">
                    <span>🏠</span>
                    <p>Beranda</p>
                </div>
            </a>
            <a href="{{ route('user.list-task') }}" class="nav-link">
                <div class="nav-item">
                    <span>📜</span>
                    <p>Riwayat</p>
                </div>
            </a>
            <form action="{{route('user.logout')}}" method="post">
                @csrf
                <div class="nav-item">

                    <button class="nav-link" href="{{ route('user.logout') }}">👤<br>Logout</button>
                </div>
            </form>
        </div>
    </nav>
@endsection
