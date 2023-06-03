<?php
use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function manageTasks(User $user)
    {
        return $user->role->name === 'Administrator' || $user->role->name === 'Manager';
    }

    public function createTask(User $user)
    {
        return $user->role->name === 'Administrator' || $user->role->name === 'User';
    }

    public function modifyTask(User $user, Task $task)
    {
        return ($user->role->name === 'Administrator' || $user->role->name === 'User') && $task->user_id === $user->id;
    }
}
