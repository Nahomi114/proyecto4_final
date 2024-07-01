<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DetalleIngresoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaSearchController;
use App\Http\Controllers\ProductoSearchController;
use App\Http\Controllers\ProveedorSearchController;

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
Route::get('/categorias/pdf', [CategoriaController::class, 'pdf'])->name('categorias.pdf');
Route::get('/productos/pdf', [ProductoController::class, 'pdf'])->name('productos.pdf');
Route::get('/clientes/pdf', [ClienteController::class, 'pdf'])->name('clientes.pdf');
Route::get('/proveedores/pdf', [ProveedorController::class, 'pdf'])->name('proveedores.pdf');
Route::get('/ingresos/pdf', [IngresoController::class, 'pdf'])->name('ingresos.pdf');
Route::get('/ventas/pdf', [VentaController::class, 'pdf'])->name('ventas.pdf');
Route::get('/users/pdf', [UserController::class, 'pdf'])->name('users.pdf');
Route::resource('productos', ProductoController::class);
Route::resource('detalle_ingreso', DetalleIngresoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('ingresos', IngresoController::class);
Route::resource('ventas', VentaController::class);
Route::resource('detalle_ventas', DetalleVentaController::class);
Route::resource('users', UserController::class);
Route::get('/search-producto', [ProductoSearchController::class, 'search'])->name('productos.search');
Route::get('/search-categoria', [CategoriaSearchController::class, 'search'])->name('categorias.search');
Route::get('/proveedores/search', [ProveedorSearchController::class, 'search'])->name('proveedores.search');
require __DIR__.'/auth.php';
