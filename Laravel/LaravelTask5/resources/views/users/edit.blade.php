@extends('layouts.main')

@section('content')
    <h2>Edit User</h2>
    
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection
