<!-- resources/views/roles/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Role</h1>

    <form action="{{ route('roles.create') }}" method="post">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
