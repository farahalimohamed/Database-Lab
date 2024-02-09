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
@endsection
