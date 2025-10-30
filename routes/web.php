<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\LoginController;

// Home apunta al login
Route::get('/', [LoginController::class, 'show'])->name('home');

// Registro
Route::get('/registro', [RegistroController::class, 'show'])->name('registro.show');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

// Login
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.ejecutar');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// CRUD de vendedores y ventas
Route::resource('vendedores', VendedorController::class)->parameters([
    'vendedores' => 'vendedor'
]);

Route::resource('ventas', VentaController::class)->parameters([
    'ventas' => 'venta'
]);
