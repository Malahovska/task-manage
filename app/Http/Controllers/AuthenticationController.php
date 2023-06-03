<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthenticationController extends Controller
{
    public function login(Request $request)
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
            return redirect()->route('dashboard');
        } else {
            // Authentication failed
            // Redirect back with an error message
            return redirect()->back()->withErrors('Invalid credentials');
        }
    }

    public function logout()
    {
        // Perform user logout
        auth()->logout();

        // Redirect to the appropriate page or show a success message
        return redirect()->route('login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        // Validate the request data

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the selected role to the user
        $role = Role::findOrFail($request->role);
        $user->role()->associate($role);
        $user->save();

        // Handle other registration logic

        // Redirect or return a response
    }


    // Add any other necessary methods
}
