<!-- resources/views/posts/create.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
