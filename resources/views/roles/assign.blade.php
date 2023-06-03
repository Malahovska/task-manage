<!-- resources/views/roles/assign.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Assign Role</h1>

    <form action="{{ route('roles.assign') }}" method="post">
        @csrf

        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="role_id">Role:</label>
            <select name="role_id" id="role_id" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Assign</button>
    </form>
@endsection
