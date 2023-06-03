@extends('layouts.app')

@section('content')
    <h1>Edit User Profile</h1>

    <form action="{{ route('users.update', $user) }}" method="post">
        @csrf
        @method('put')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label for="role">Role:</label>
            <select name="role" id="role">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Add any other necessary fields -->

        <button type="submit">Update</button>
    </form>
@endsection
