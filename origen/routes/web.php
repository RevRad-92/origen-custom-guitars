<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


## CRUD ##
## PRODUCTOS ##
Route::get('/adminProductos', [ProductoController::class, 'index'])->middleware(['auth'])->name('adminProductos');

// modificar
Route::get('/modificarProducto/{id}', [ProductoController::class, 'edit'])->middleware(['auth'])->name('modificarProducto');
Route::put('/modificarProducto', [ProductoController::class, 'update'])->middleware(['auth'])->name('modificarProducto');

// agregar
Route::get('/agregarProducto', [ProductoController::class, 'create'])->middleware(['auth'])->name('agregarProducto');
Route::post('/agregarProducto', [ProductoController::class, 'store'])->middleware(['auth'])->name('agregarProducto');