<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Tasks</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Due Date</th>
                <th>Priority</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->priority }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
