<?php

use Illuminate\Support\Facades\Route;
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return 'Welcome to the Dashboard!';
});
