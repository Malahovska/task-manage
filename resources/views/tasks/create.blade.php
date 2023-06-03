<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    <form action="{{ route('tasks.create') }}" method="post">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" required>
        </div>

        <div>
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <div>
            <label for="user_id">Assign To:</label>
            <select name="user_id" id="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
