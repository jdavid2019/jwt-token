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


Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1'], function () {
    Route::resource('dnis',AdminController::class);
});

//  api/v1/auth/login
Route::group(['middleware' => [], 'prefix' => 'v1'], function () {
    Route::post('/auth/login','App\Http\Controllers\TokensController@login');
    Route::post('/auth/refresh','App\Http\Controllers\TokensController@refreshToken');
    // una ruta del expirar token, es un logout
    Route::get('/auth/logout','App\Http\Controllers\TokensController@logout');
});

