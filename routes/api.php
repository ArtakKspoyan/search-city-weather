<?php

use App\Http\Controllers\API\WeatherController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'weather', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [WeatherController::class, 'index']);
    Route::post('add', [WeatherController::class, 'add']);
});
