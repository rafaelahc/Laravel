<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;



Route::get('/', function () {
    return view('welcome');
})-> name('welcome');

Route::get('/hello', function () {
    return '<h1> Hello Hello </h1>';
}) -> name('hello');



Route::get('/hello/{name}', function ($name) {
    return '<h1> Hello ' .$name. '</h1>';
});


//Rota users

Route::get('/insert-user-db', [UserController::class, 'insertUserIntoDB']);

Route::get('/insert-user-db', [UserController::class, 'updateUserIntoDB']);

Route::get('/delete-user-db', [UserController::class, 'deleteUserFromDB']);

Route::get('/insert-task-db', [TaskController::class, 'insertTasksIntoDB']);

Route::get('/update-task-db', [TaskController::class, 'updateTasksIntoDB']);

Route::get('/delete-user-db/{id}', [UserController::class, 'deleteUser'])-> name('users.delete');

Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');

Route::post('/create-users', [UserController::class, 'createUser'])-> name('users.create');






//Rota de tasks
Route::get('/home', [HomeController::class, 'returnHome']) ->
 name('home');

Route::get('/users', [UserController::class, 'returnAllUsersView']) ->
 name('users.all');

Route::get('/addUsers', [UserController::class, 'addAllUsersView']) ->
name('users.add');

Route::get('/task', [TaskController::class, 'returnView']) ->
name('task');

Route::get('/view-task/{id}', [TaskController::class, 'viewTask'])->name('task.view');

Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask'])->name('task.delete');

Route::get('/create-tasks', [TaskController::class, 'addNewTask'])-> name('addTask');

Route::post('/create-tasks', [TaskController::class, 'createTasks'])-> name('tasks.create');


Route::fallback(function(){
    return view('users.fallback');
});
