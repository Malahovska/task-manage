<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthenticationController;

Route::group(['middleware' => 'web'], function () {
    // Routes related to authentication
    Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::match(['get', 'post'], '/register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');


    // Other routes...
});

use App\Http\Controllers\DashboardController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard/tasks', [DashboardController::class, 'showTasks'])->name('dashboard.tasks');
});

// ...

use App\Http\Controllers\ProjectController;

Route::middleware(['web', 'auth'])->group(function () {
    // Project routes
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'delete'])->name('project.delete');
    Route::get('/project/{project}/members', [ProjectController::class, 'showMembers'])->name('project.members');
    Route::get('/project/{project}/tasks', [ProjectController::class, 'showTasks'])->name('project.tasks');

    // Add any other necessary routes
});

// ...





use App\Http\Controllers\RoleController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/roles', [RoleController::class, 'create'])->name('roles.create');
    Route::delete('/roles', [RoleController::class, 'delete'])->name('roles.delete');
    Route::post('/roles/assign', [RoleController::class, 'assignRole'])->name('roles.assign');
});

use App\Http\Controllers\TaskController;



Route::middleware(['web'])->group(function () {
    // Task routes
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
    Route::get('/tasks/{task}/assign', [TaskController::class, 'assignTask'])->name('tasks.assign'); // Renamed to assignTask
    Route::post('/tasks/{task}/assign', [TaskController::class, 'assignTask'])->name('tasks.assignTask');
    Route::get('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::post('/tasks/{task}/complete', [TaskController::class, 'markAsComplete'])->name('tasks.markAsComplete');

    // Add any other necessary routes
});





use App\Http\Controllers\UserController;

Route::middleware(['web'])->group(function () {
    // User routes
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('users.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('users.update');

    // Add any other necessary routes
});

// ...


// ...

