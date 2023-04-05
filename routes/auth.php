<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guests Auth Routes
|--------------------------------------------------------------------------
|
| Here are the auth routes for guests users.
*/

Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('ingresar', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('ingresar', [AuthenticatedSessionController::class, 'store']);

    // Register
    Route::prefix('registrarse')->group(function () {
        Route::get('', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('', [RegisteredUserController::class, 'store']);
    });

    // Send reset password link
    Route::get('olvide-contrasena', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('olvide-contrasena', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Reset password
    Route::get('resetear-contrasena/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('resetear-contrasena', [NewPasswordController::class, 'store'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Registered Auth Routes
|--------------------------------------------------------------------------
|
| Here are the auth routes for registered users.
*/

Route::middleware('auth')->group(function () {
    // Reset password
    Route::get('perfil', [ProfileController::class, 'show'])->name('profile');
    Route::post('perfil', [ProfileController::class, 'update']);

    Route::post('salir', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
