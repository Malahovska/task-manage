<!-- resources/views/user/profile.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>User Profile</h1>

    <div>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Add any other profile information you want to display -->
    </div>

    <a href="{{ route('users.edit') }}">Edit Profile</a>
@endsection
