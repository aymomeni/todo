<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// List todos
Route::get('todos', 'App\Http\Controllers\TodoController@index');

// List single todos
Route::get('todo/{id}', 'App\Http\Controllers\TodoController@show');

// Create new todos
Route::post('todo', 'App\Http\Controllers\TodoController@store');

// Update todos
Route::put('todo', 'App\Http\Controllers\TodoController@store');

// Delete todos
Route::delete('todo/{id}', 'App\Http\Controllers\TodoController@destroy');