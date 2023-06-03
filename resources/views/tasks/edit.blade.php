<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="post">
        @csrf
        @method('put')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $task->name }}" required>
        </div>

        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" required>
        </div>

        <div>
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" required>
                <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div>
            <label for="user_id">Assign To:</label>
            <select name="user_id" id="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id === $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
