<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SeatController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('user', [AuthController::class, 'user']);

    // trips
    Route::group(['prefix' => 'trips'], function () {
        Route::get('', [TripController::class, 'trips']);
    });

    // seats
    Route::group(['prefix' => 'seats'], function () {
        Route::get('', [SeatController::class, 'seats']);
        Route::post('{id}/reserve', [SeatController::class, 'reserve']);
    });
});
