<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/admin')->name('admin:')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', function () {
            return Inertia::render('Auth/Login', ['as' => 'admin']);
        })->name('login');

        Route::post('/login', [AuthController::class, 'store'])->name('login.store');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
    });
});
