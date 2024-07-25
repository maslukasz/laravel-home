<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TodoController::class, 'index']);
Route::post('/new-todo', [TodoController::class, 'createTodo']);
Route::post('/edit/{id}/status/{status}', [TodoController::class, 'updateStatus']);
Route::get('/status/{id}', [TodoController::class, 'getStatus']);