@extends('layouts.main')

@section('content')
    <h2>Create User</h2>
    
    <form action="{{ route('users.store') }}" method="post" class="pb-5">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>
    </form>
    <a href="{{route('auth.google')}}" method="get">
        <button class="btn btn-primary">Sign In With Google</button>
    </a>
@endsection
