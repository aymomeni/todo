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
Route::get('daily', 'App\Http\Controllers\TodoController@index');

// List a specific daily task
Route::get('daily/{id}', 'App\Http\Controllers\TodoController@show');

// Create a daily task
Route::post('daily', 'App\Http\Controllers\TodoController@store');

// Update a daily task
Route::put('daily', 'App\Http\Controllers\TodoController@store');

// Delete a daily task
Route::delete('daily/{id}', 'App\Http\Controllers\TodoController@destroy');


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
Route::get('bookOrResource', 'App\Http\Controllers\BookOrResourceController@index');


// List books or resources
Route::get('completed', 'App\Http\Controllers\CompletedController@index');

// List single book or resource
Route::get('completed/{id}', 'App\Http\Controllers\CompletedController@show');

// Create new book or resource
Route::post('completed', 'App\Http\Controllers\CompletedController@store');

// Update book or resource
Route::put('completed', 'App\Http\Controllers\CompletedController@store');

// Delete book or resource
Route::delete('completed/{id}', 'App\Http\Controllers\CompletedController@destroy');

// List books or resources
Route::get('completed', 'App\Http\Controllers\CompletedController@index');