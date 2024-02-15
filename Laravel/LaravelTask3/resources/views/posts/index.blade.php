@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h1>All Posts</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text"><small class="text-muted">Posted by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</small></p>

                            <div class="btn-group" role="group">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm mr-2">Update</a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}
    </div>
@endsection
