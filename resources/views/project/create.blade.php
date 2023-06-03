<!-- resources/views/project/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Create Project</h2>

    <form action="{{ route('project.store') }}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <!-- Add other necessary fields -->
        <button type="submit">Create</button>
    </form>
@endsection
