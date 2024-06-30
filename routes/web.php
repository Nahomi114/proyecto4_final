<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('productos', ProductoController::class);
Route::resource('detalle_ingreso', DetalleIngresoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('ingresos', IngresoController::class);
Route::resource('ventas', VentaController::class);
Route::resource('detalle_ventas', DetalleVentaController::class);
Route::resource('users', USerController::class);
require __DIR__.'/auth.php';
