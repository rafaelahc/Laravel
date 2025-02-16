<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GiftController;



Route::get('/', function () {
    return view('welcome');
})-> name('welcome');

Route::get('/hello', function () {
    return '<h1> Hello Hello </h1>';
}) -> name('hello');



Route::get('/hello/{name}', function ($name) {
    return '<h1> Hello ' .$name. '</h1>';
});


Route::get('/home', [HomeController::class, 'returnHome']) -> name('home');


//Rota users

Route::get('/users', [UserController::class, 'returnAllUsersView']) -> name('users.all');

Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');

Route::get('/addUsers', [UserController::class, 'addAllUsersView']) ->name('users.add');

Route::get('/insert-user-db', [UserController::class, 'insertUserIntoDB']);

Route::get('/insert-user-db', [UserController::class, 'updateUserIntoDB']);

Route::get('/delete-user-db', [UserController::class, 'deleteUserFromDB']);

Route::get('/delete-user-db/{id}', [UserController::class, 'deleteUser'])-> name('users.delete');

Route::post('/create-users', [UserController::class, 'createUser'])-> name('users.create');



//Rota de tasks


Route::get('/task', [TaskController::class, 'returnView']) ->name('task');

Route::get('/view-task/{id}', [TaskController::class, 'viewTask'])->name('task.view');

Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask'])->name('task.delete');

Route::get('/create-tasks', [TaskController::class, 'addNewTask'])-> name('addTask');

Route::post('/create-tasks', [TaskController::class, 'createTasks'])-> name('tasks.create');

Route::get('/insert-task-db', [TaskController::class, 'insertTasksIntoDB']);

Route::get('/update-task-db', [TaskController::class, 'updateTasksIntoDB']);


//Rota Gifts

//View Gift = Visualizar todos os presentes.
Route::get('/view_gifts', [GiftController::class, 'returnGiftsView'])-> name('gifts.view');

//ViewGiftDetails - Visualizar os detalhes do presente
Route::get('/gift_details/{id}', [GiftController::class, 'viewGiftDetails'])-> name('gifts.details');


//addNewGift - Form para adicionar um novo presente.
Route::get('/addNewGift', [GiftController::class, 'addNewGift'])-> name('gifts.add');


//insertDB - Inserir dados no DB

//DeleteDB - Inserir dados no DB
Route::get('/delete-gift/{id}', [GiftController::class, 'deleteGift'])-> name('gifts.delete');

//updateDB - Inserir dados no DB
Route::post('/create-gift', [GiftController::class, 'createGift'])-> name('gifts.create');


Route::fallback(function(){
    return view('users.fallback');
});
