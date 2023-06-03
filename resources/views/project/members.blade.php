<!-- resources/views/project/members.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Project Members</h1>

    <ul>
        @foreach ($members as $member)
            <li>{{ $member->name }}</li>
        @endforeach
    </ul>
@endsection
