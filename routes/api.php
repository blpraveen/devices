<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DevicesController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user_info/{id}',[AuthController::class, 'user_info']);
    Route::get('device_info/{id}',[DevicesController::class, 'device_info']);
    Route::get('devices_user/{id}',[DevicesController::class, 'devices_user']);
    Route::post('save_device',[DevicesController::class, 'store']);
    Route::post('logout', [AuthController::class, 'logout']);
});