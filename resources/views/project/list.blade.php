<!-- resources/views/project/list.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Project List</h1>

    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.edit', $project->id) }}">{{ $project->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
