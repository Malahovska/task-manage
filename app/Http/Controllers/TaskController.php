<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class TaskController extends Controller
{
    public function create(Request $request)
    {
        // Validate task creation form data
        $validatedData = $request->validate([
            'name' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required',
            'user_id' => 'required',
        ]);

        // Create a new task
        $task = new Task;
        $task->name = $validatedData['name'];
        $task->due_date = $validatedData['due_date'];
        $task->priority = $validatedData['priority'];
        $task->user_id = $validatedData['user_id'];
        $task->save();

        // Redirect to the appropriate page or show a success message
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Check if the authenticated user is authorized to update the task
        if (Gate::denies('update-task', $task)) {
            // Unauthorized access, handle accordingly (e.g., show an error message or redirect)
            abort(403, 'Unauthorized');
        }
        // Validate task update form data
        $validatedData = $request->validate([
            'name' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required',
            'user_id' => 'required',
        ]);

        // Find the task to update
        $task = Task::findOrFail($id);

        // Update the task
        $task->name = $validatedData['name'];
        $task->due_date = $validatedData['due_date'];
        $task->priority = $validatedData['priority'];
        $task->user_id = $validatedData['user_id'];
        $task->save();

        // Redirect to the appropriate page or show a success message
    }

    public function delete(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Check if the authenticated user is authorized to delete the task
        if (Gate::denies('delete-task', $task)) {
            // Unauthorized access, handle accordingly (e.g., show an error message or redirect)
            abort(403, 'Unauthorized');
        }
        // Find the task to delete
        $task = Task::findOrFail($id);

        // Delete the task
        $task->delete();

        // Redirect to the appropriate page or show a success message
    }

    public function assignTask(Request $request, $id)
    {
        // Get the user ID to assign the task
        $userId = $request->input('user_id');

        // Find the task and user models
        $task = Task::findOrFail($id);
        $user = User::findOrFail($userId);

        // Assign the task to the user
        $task->user_id = $user->id;
        $task->save();

        // Redirect to the appropriate page or show a success message
    }

    // Add any other necessary methods
}
