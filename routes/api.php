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


// List goals
Route::get('goals', 'App\Http\Controllers\GoalController@index');

// List single goal
Route::get('goal/{id}', 'App\Http\Controllers\GoalController@show');

// Create new goal
Route::post('goal', 'App\Http\Controllers\GoalController@store');

// Update goal
Route::put('goal', 'App\Http\Controllers\GoalController@store');

// Delete goal
Route::delete('goal/{id}', 'App\Http\Controllers\GoalController@destroy');


// List books or resources
Route::get('booksOrResources', 'App\Http\Controllers\BookOrResourceController@index');

// List single goal
Route::get('bookOrResource/{id}', 'App\Http\Controllers\BookOrResourceController@show');

// Create new goal
Route::post('bookOrResource', 'App\Http\Controllers\BookOrResourceController@store');

// Update goal
Route::put('bookOrResource', 'App\Http\Controllers\BookOrResourceController@store');

// Delete goal
Route::delete('bookOrResource/{id}', 'App\Http\Controllers\BookOrResourceController@destroy');