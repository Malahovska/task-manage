<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\Task;
use App\Policies\TaskPolicy;



class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Task::class => TaskPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
            return $user->role->name === 'Administrator';
        });

        Gate::define('manage-tasks', function ($user) {
            return $user->role->name === 'Administrator' || $user->role->name === 'Manager';
        });


        Gate::define('change-application-settings', function ($user) {
            return $user->role->name === 'Administrator';
        });

        Gate::define('create-task', function ($user) {
            return $user->role->name === 'Administrator' || $user->role->name === 'User';
        });

        Gate::define('modify-task', function ($user, $task) {
            return ($user->role->name === 'Administrator' || $user->role->name === 'User') && $task->user_id === $user->id;
        });

        Gate::define('assign-task', function ($user) {
            return $user->role->name === 'Administrator' || $user->role->name === 'Manager';
        });

        Gate::define('view-own-tasks', function ($user) {
            return $user->role->name === 'Administrator' || $user->role->name === 'User';
        });

        Gate::define('update-user-profile', function ($user) {
            return $user->role->name === 'Administrator' || $user->role->name === 'User';
        });

        Gate::define('view-public-tasks', function ($user) {
            return $user->role->name === 'Guest';
        });

    }
}
