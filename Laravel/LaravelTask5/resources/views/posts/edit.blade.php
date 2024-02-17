<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body" rows="5" required>{{ $post->body }}</textarea>
            </div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
