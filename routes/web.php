<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
// Redirigir la raíz a la lista de vendedores
Route::get('/', function () {
    return redirect()->route('vendedores.index');
});

// CRUD completo de Vendedores
Route::resource('vendedores', VendedorController::class)->parameters([
    'vendedores' => 'vendedor' // fuerza que el parámetro sea {vendedor} en lugar de {vendedore}
]);

// CRUD completo de Ventas
Route::resource('ventas', VentaController::class)->parameters([
    'ventas' => 'venta' // fuerza que el parámetro sea {venta} en lugar de {ventum} o algo raro
]);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

