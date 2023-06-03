<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        // Validate role creation form data
        $validatedData = $request->validate([
            'name' => 'required|unique:roles',
        ]);

        // Create a new role
        $role = new Role;
        $role->name = $validatedData['name'];
        $role->save();

        // Redirect to the appropriate page or show a success message
    }

    public function delete(Request $request)
    {
        // Get the role ID to delete
        $roleId = $request->input('role_id');

        // Delete the role
        $role = Role::find($roleId);
        $role->delete();

        // Redirect to the appropriate page or show a success message
    }

    public function assignRole(Request $request)
    {
        // Get the user ID and role ID to assign
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');

        // Retrieve the user and role models
        $user = User::find($userId);
        $role = Role::find($roleId);

        // Assign the role to the user
        $user->roles()->attach($role);

        // Redirect to the appropriate page or show a success message
    }

    // Add any other necessary methods
}
