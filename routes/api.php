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


// List daily task
Route::get('todo', 'App\Http\Controllers\TodoController@index');

// List a specific daily task
Route::get('todo/{id}', 'App\Http\Controllers\TodoController@show');

// Create a daily task
Route::post('todo', 'App\Http\Controllers\TodoController@store');

// Update a daily task
Route::put('todo', 'App\Http\Controllers\TodoController@store');

// Delete a daily task
Route::delete('todo/{id}', 'App\Http\Controllers\TodoController@destroy');


// List goals
Route::get('goal', 'App\Http\Controllers\GoalController@index');

// List single goal
Route::get('goal/{id}', 'App\Http\Controllers\GoalController@show');

// Create new goal
Route::post('goal', 'App\Http\Controllers\GoalController@store');

// Update goal
Route::put('goal', 'App\Http\Controllers\GoalController@store');

// Delete goal
Route::delete('goal/{id}', 'App\Http\Controllers\GoalController@destroy');


// List books or resources
Route::get('bookOrResource', 'App\Http\Controllers\BookOrResourceController@index');

// List single book or resource
Route::get('bookOrResource/{id}', 'App\Http\Controllers\BookOrResourceController@show');

// Create new book or resource
Route::post('bookOrResource', 'App\Http\Controllers\BookOrResourceController@store');

// Update book or resource
Route::put('bookOrResource', 'App\Http\Controllers\BookOrResourceController@store');

// Delete book or resource
Route::delete('bookOrResource/{id}', 'App\Http\Controllers\BookOrResourceController@destroy');


// List books or resources
Route::get('completedtask', 'App\Http\Controllers\CompletedTaskController@index');

// List single book or resource
Route::get('completedtask/{id}', 'App\Http\Controllers\CompletedTaskController@show');

// Create new book or resource
Route::post('completedtask', 'App\Http\Controllers\CompletedTaskController@store');

// Update book or resource
Route::put('completedtask', 'App\Http\Controllers\CompletedTaskController@store');

// Delete book or resource
Route::delete('completedtask/{id}', 'App\Http\Controllers\CompletedTaskController@destroy');