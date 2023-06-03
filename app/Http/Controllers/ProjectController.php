<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function create(Request $request)
    {
        // Validate project creation form data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add any other necessary fields
        ]);

        // Create a new project
        $project = new Project;
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        // Set other fields
        $project->save();
        return view('project.create');

        // Redirect to the appropriate page or show a success message
    }

    public function update(Request $request, $id)
    {
        // Validate project update form data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add any other necessary fields
        ]);

        // Find the project to update
        $project = Project::findOrFail($id);

        // Update the project
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        // Update other fields
        $project->save();

        // Redirect to the appropriate page or show a success message
    }

    public function delete(Request $request, $id)
    {
        // Find the project to delete
        $project = Project::findOrFail($id);

        // Delete the project
        $project->delete();

        // Redirect to the appropriate page or show a success message
    }

    public function addMember(Request $request, $id)
    {
        // Get the user ID to add to the project
        $userId = $request->input('user_id');

        // Find the project and user models
        $project = Project::findOrFail($id);
        $user = User::findOrFail($userId);

        // Add the user to the project
        $project->members()->attach($user);

        // Redirect to the appropriate page or show a success message
    }

    public function removeMember(Request $request, $id)
    {
        // Get the user ID to remove from the project
        $userId = $request->input('user_id');

        // Find the project and user models
        $project = Project::findOrFail($id);
        $user = User::findOrFail($userId);

        // Remove the user from the project
        $project->members()->detach($user);

        // Redirect to the appropriate page or show a success message
    }

    public function edit($id)
    {
        // Find the project with the given ID
        $project = Project::find($id);

        // Check if the project exists
        if (!$project) {
            // Project not found, handle the case (e.g., redirect or display an error message)
            return redirect()->back()->with('error', 'Project not found.');
        }

        // Project exists, proceed with editing
        return view('project.edit', compact('project'));
    }




    // Add any other necessary methods
}
