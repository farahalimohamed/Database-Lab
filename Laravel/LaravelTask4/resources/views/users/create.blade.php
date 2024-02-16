@extends('layouts.main')

@section('content')
    <h2>Create User</h2>
    
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>
    </form>
@endsection
