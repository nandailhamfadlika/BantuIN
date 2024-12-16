@extends('layouts.app') {{-- Replace with your actual layout name --}}

@section('content')
<div class="container">
    <h1>Add Review</h1>
    <form action="{{ route('user.review.store', $task->id) }}" method="POST">
        @csrf {{-- Add CSRF token for security --}}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="helper_id" value="{{$task->helper_id}}">
        <input type="hidden" name="task_id" value="{{$task->id}}">
        <div class="form-group">
            <label for="user_id">User</label>
            <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
        </div>
        
        <div class="form-group">
            <label for="helper_id">Helper</label>
            <input type="text" class="form-control" value="{{$task->helper_name}}" readonly>
        </div>
        
        <div class="form-group">
            <label for="task_id">Task</label>
            <input type="text" class="form-control" value="{{$task->task_name}}" readonly>
        </div>
                
        <div class="form-group">
            <label for="agreed_price">Agreed Price</label>
            <input type="text" name="agreed_price" id="agreed_price" class="form-control" value="{{number_format($task->price_range)}}" readonly required>
        </div>
        
        <div class="form-group">
            <label for="rating">Rating</label>
            <div class="d-flex align-items-center gap-2 justify-content-center">
                <input type="range" class="form-range border rounded-pill  @error('rating_range') is-invalid @enderror" id="rating_range" name="rating_range" min="1" max="5" value="{{ old('rating_range', 3) }}" oninput="updateLabel(this.value)">
                    <!-- Value Label -->
                    <span id="rangeValue" class="ms-3 fw-bold">3</span>
            </div>
            @error('rating_range')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="review_description">Review Description</label>
            <textarea name="review_description" id="review_description" class="form-control" rows="5"></textarea>
        </div>
        
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </div>
    </form>
</div>

@section('script')
    <script type="text/javascript">
         function updateLabel(value) {
            document.getElementById('rangeValue').textContent = value;
        }
    </script>
@endsection

@endsection
