<!-- resources/views/task/assign.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Assign Task</h1>

    <form action="{{ route('tasks.assign', $task->id) }}" method="post">
        @csrf

        <div>
            <label for="user_id">Assign To:</label>
            <select name="user_id" id="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Assign</button>
    </form>
@endsection
