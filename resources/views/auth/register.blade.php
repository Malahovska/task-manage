@extends('layouts.app')

@section('content')
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Other fields -->

        <div>
            <label for="role">Role</label>
            <select name="role" id="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Other fields -->

        <button type="submit">Register</button>
    </form>
@endsection
