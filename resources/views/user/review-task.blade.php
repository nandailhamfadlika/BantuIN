@extends('layouts.app')

@section('title', 'Review Helper')

@section('content')
    <h1 class="mt-5">Review Helper</h1>
    <form action="{{ route('user.review-store', $task->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Kepuasan Pelanggan (1-5)</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="agreed_price" class="form-label">Harga yang Telah Disepakati</label>
            <input type="text" class="form-control" id="agreed_price" name="agreed_price" placeholder="Contoh: 100000" required>
        </div>
        <div class="mb-3">
            <label for="review_description" class="form-label">Deskripsi Review</label>
            <textarea class="form-control" id="review_description" name="review_description" rows="3" placeholder="Detail review"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim Review</button>
    </form>
@endsection
