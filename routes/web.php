<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'showLogin'])->name('home');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('token.auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('/foodpanda', [AuthController::class, 'goFoodpanda']);
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
