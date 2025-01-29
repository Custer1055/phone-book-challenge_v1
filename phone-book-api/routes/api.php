<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('/login', 'App\Http\Controllers\UserController@login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    //User routes
    Route::post('/logout', 'App\Http\Controllers\UserController@logout');
    Route::get('/me', 'App\Http\Controllers\UserController@me');
    Route::put('/me/update', 'App\Http\Controllers\UserController@updateMe');
    Route::post('/me/update-password', 'App\Http\Controllers\UserController@updatePassword');
    //Get contacts
    Route::get('/contacts', 'App\Http\Controllers\ContactController@index');
    Route::post('/contacts', 'App\Http\Controllers\ContactController@store');
    Route::get('/contacts/{id}', 'App\Http\Controllers\ContactController@show');
});
