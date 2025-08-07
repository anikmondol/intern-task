<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view("auth.register");
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/register', [AuthenticationController::class, 'register'])->name('customer.register');
Route::post('/store', [AuthenticationController::class, 'store'])->name('customer.store');
Route::get('/login', [AuthenticationController::class, 'login'])->name('customer.login');
Route::post('/signin', [AuthenticationController::class, 'signin'])->name('customer.signin');
