<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('cars')->group(function () {
    Route::get('/', [CarController::class, 'index']);
    Route::get('/{id}', [CarController::class, 'show']);
    Route::post('/', [CarController::class, 'store']);
    Route::put('/{id}', [CarController::class, 'update']);
    Route::delete('/{id}', [CarController::class, 'destroy']);
});

Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::get('/{id}', [BookingController::class, 'show']);
    Route::post('/', [BookingController::class, 'store']);
    Route::put('/{id}', [BookingController::class, 'update']);
    Route::delete('/{id}', [BookingController::class, 'destroy']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});