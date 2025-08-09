<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view("auth.register");
});







Route::middleware('customerAuth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile/create_edited', [ProfileController::class, 'create'])->name('profile.create_edited');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
});

Route::get('/register', [AuthenticationController::class, 'register'])->name('customer.register');
Route::post('/store', [AuthenticationController::class, 'store'])->name('customer.store');

Route::get('/login', [AuthenticationController::class, 'login'])->name('customer.login');
Route::post('/signin', [AuthenticationController::class, 'signin'])->name('customer.signin');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('customer.logout');
