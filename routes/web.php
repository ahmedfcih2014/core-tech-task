<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test/scope-number-of-posts', function () {
    return App\Models\User::moreThanNumberPosts(request()->query('number') ?? 1)->get();
});
