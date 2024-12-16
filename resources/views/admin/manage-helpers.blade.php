@extends('layouts.app')

@section('title', 'Manage Helpers')

@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="mt-5">Manage Helpers</h1>
        <a href="{{ route('admin.add-helpers') }}" class="btn btn-primary" style="height: max-content;">Registrasi Helper</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Phone</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($helpers as $index => $helper)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $helper->name }}</td>
                    <td>{{ $helper->nik }}</td>
                    <td>{{ $helper->phone }}</td>
                    <td>
                        <a href="{{route('admin.edit-helper', $helper->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('admin.delete-helper', $helper->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
