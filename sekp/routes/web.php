<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/* HOME */
Route::get('/', function () {
    return view('home');
});

/* LOGIN */
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* DASHBOARD PER ROLE */
Route::middleware('auth')->group(function () {
    Route::view('/admin', 'dashboard.admin');
    Route::view('/manager', 'dashboard.manager');
    Route::view('/karyawan', 'dashboard.karyawan');
    Route::view('/user', 'dashboard.user');
});
