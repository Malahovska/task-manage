<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate user registration form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Assign a default role to the user (e.g., User role)
        $defaultRole = Role::where('name', 'User')->first();
        $user->roles()->attach($defaultRole);

        // Redirect to the appropriate page or show a success message
    }

    public function authenticate(Request $request)
    {
        // Validate user login form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt user authentication
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            // Authentication successful
            // Redirect to the dashboard or the intended page
        } else {
            // Authentication failed
            // Redirect back with an error message
        }
    }

    public function showProfile()
    {
        // Get the authenticated user's profile information
        $user = auth()->user();

        // Show the user profile view with the user's information
    }
    public function edit(User $user)
    {
        if (Gate::denies('edit-user', $user)) {
            // Unauthorized access, handle accordingly (e.g., show an error message or redirect)
            abort(403, 'Unauthorized');
        }
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        if (Gate::denies('update-user', $user)) {
            // Unauthorized access, handle accordingly (e.g., show an error message or redirect)
            abort(403, 'Unauthorized');
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            // other updated attributes
        ]);

        // Handle other update logic

        // Redirect or return a response
    }

    // Add any other necessary methods
}
