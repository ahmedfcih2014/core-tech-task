<?php

use App\Http\Controllers\Apis\AuthController;
use App\Http\Controllers\Apis\PostsController;
use App\Http\Controllers\Apis\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
    });

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::prefix('profile')
            ->controller(ProfileController::class)
            ->group(function () {
                Route::get('/', 'get');
                // TODO: Edit profile, change password, etc.. to be implemented
            });
        Route::prefix('posts')
            ->controller(PostsController::class)
            ->group(function () {
                Route::put('/{post}', 'update');
            });
    });


Route::prefix('admin')
    ->group(function () {
        Route::get('users-by-posts-num', function () {
            return App\Models\User::moreThanNumberPosts(request()->query('number') ?? 1)->get();
        })->middleware('user_has_role:admin');
    });
