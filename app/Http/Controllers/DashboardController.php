<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function showTasks()
    {
        // Get the tasks assigned to the authenticated user
        $user = auth()->user();
        $tasks = $user->tasks;

        // Show the tasks view with the assigned tasks
        return view('tasks', ['tasks' => $tasks]);
    }

    // Add any other necessary methods
}
