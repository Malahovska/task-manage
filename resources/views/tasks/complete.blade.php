<!-- resources/views/task/complete.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Mark Task as Complete</h1>

    <form action="{{ route('tasks.complete', $task->id) }}" method="post">
        @csrf

        <p>Are you sure you want to mark this task as complete?</p>

        <button type="submit">Mark as Complete</button>
    </form>
@endsection
