<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;

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
