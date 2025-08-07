<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    Route::post('/index', [AuthenticationController::class, 'index'])->name('index');
});

Route::get('/register', [AuthenticationController::class, 'register'])->name('customer.register');
Route::post('/store', [AuthenticationController::class, 'store'])->name('customer.store');
Route::get('/login', [AuthenticationController::class, 'login'])->name('customer.login');
Route::post('/signin', [AuthenticationController::class, 'signin'])->name('customer.signin');

// Route::post('/auth/create', [AuthenticationController::class, 'create'])->name('login');
// Route::post('/auth/store', [AuthenticationController::class, 'store'])->name('register');
