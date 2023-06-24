<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

/*Task route*/
Route::get('/tasks', [TaskController::class, 'task_list'])->name('tasks');
Route::get('/add-task', [TaskController::class, 'add_task_view'])->name('add-task');
Route::post('/add-task', [TaskController::class, 'add_task']);
Route::get('/edit-task/{id}', [TaskController::class, 'edit_task_view']);
Route::post('/update-task', [TaskController::class, 'edit_task']);
Route::get('/delete-task/{id}', [TaskController::class, 'delete_task']);
Route::get('/pending-task', [TaskController::class, 'pending_task'])->name('pending-task');
Route::get('/completed-task', [TaskController::class, 'completed_task'])->name('completed-task');

/*User route*/
Route::get('/add-user', function () {
    return view('add-user');
})->name('add-user');
Route::post('/add-user', [UserController::class, 'create_user']);
Route::get('/users', [UserController::class, 'users_list'])->name('users');
Route::get('/edit-user/{id}', [UserController::class, 'edit_user_view']);
Route::post('/update-user', [UserController::class, 'edit_user']);
Route::get('/delete-user/{id}', [UserController::class, 'delete_user']);