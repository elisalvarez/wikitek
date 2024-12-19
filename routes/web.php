<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\DashboardController;

Route::middleware(['guest'])->group(function () {
    
    Route::get('/registro', [RegistroController::class, 'show'])->name('registro');
    Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

    Route::get('/obtener-carreras/{id}', [RegistroController::class, 'getCarreras'])->name('get.carreras');

    Route::get('/login', [AutenticacionController::class, 'show'])->name('login');
    Route::post('/login', [AutenticacionController::class, 'login'])->name('login.user');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout', [AutenticacionController::class, 'logout'])->name('logout');

});