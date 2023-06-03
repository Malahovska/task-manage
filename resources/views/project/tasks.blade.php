<!-- resources/views/project/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Project Tasks</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->name }}</li>
        @endforeach
    </ul>
@endsection
