<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Home page (tidak perlu login)
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (login/register)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Dashboard (hanya untuk user yang sudah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Logout (hanya untuk user yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
