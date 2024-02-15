@extends('layouts.main')

@section('content')
    <h2>User Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Email Verified At: {{ $user->email_verified_at }}</p>
        </div>
    </div>

    <h2>User Posts</h2>
    @if($user->posts->count() > 0)
        @foreach($user->posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ $post->body }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>No posts available for this user.</p>
    @endif
@endsection
