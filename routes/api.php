<?php

use App\Http\Controllers\Apis\AuthController;
use App\Http\Controllers\Apis\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
    });

Route::middleware('auth:sanctum')
    ->prefix('profile')
    ->controller(ProfileController::class)
    ->group(function () {
        Route::get('/', 'get');
        // TODO: Edit profile, change password, etc.. to be implemented
    });
