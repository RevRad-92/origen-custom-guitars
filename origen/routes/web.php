<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MaderaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProductoController;
use App\Models\Madera;
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

// agregar
Route::get('/agregarProducto', [ProductoController::class, 'create'])->middleware(['auth'])->name('agregarProducto');
Route::post('/agregarProducto', [ProductoController::class, 'store'])->middleware(['auth'])->name('agregarProducto');

// modificar
Route::get('/modificarProducto/{id}', [ProductoController::class, 'edit'])->middleware(['auth'])->name('modificarProducto');
Route::put('/modificarProducto', [ProductoController::class, 'update'])->middleware(['auth'])->name('modificarProducto');

// eliminar


## CATEGORÍAS ##
Route::get('/adminCategorias', [CategoriaController::class, 'index'])->middleware(['auth'])->name('adminCategorias');

// agregar 
Route::get('/agregarCategoria', [CategoriaController::class, 'create'])->middleware(['auth'])->name('agregarCategoria');
Route::post('/agregarCategoria', [CategoriaController::class, 'store'])->middleware(['auth'])->name('agregarCategoria');

// modificar
Route::get('/modificarCategoria/{id}', [CategoriaController::class, 'edit'])->middleware(['auth'])->name('modificarCategoria');
Route::put('/modificarCategoria', [CategoriaController::class, 'update'])->middleware(['auth'])->name('modificarCategoria');

// eliminar



## MODELOS ##
Route::get('/adminModelos', [ModeloController::class, 'index'])->middleware(['auth'])->name('adminModelos');

// agregar
Route::get('/agregarModelo', [ModeloController::class, 'create'])->middleware(['auth'])->name('agregarModelo');
Route::post('/agregarModelo', [ModeloController::class, 'store'])->middleware(['auth'])->name('agregarModelo');

// modificar 
Route::get('/modificarModelo/{id}', [ModeloController::class, 'edit'])->middleware(['auth'])->name('modificarModelo');
Route::put('/modificarModelo', [ModeloController::class, 'update'])->middleware(['auth'])->name('modificarModelo');

// eliminar



## MADERAS ##
Route::get('/adminMaderas', [MaderaController::class, 'index'])->middleware(['auth'])->name('adminMaderas');

// agregar 
Route::get('/agregarMadera', [MaderaController::class, 'create'])->middleware(['auth'])->name('agregarMadera');
Route::post('/agregarMadera', [MaderaController::class, 'store'])->middleware(['auth'])->name('agregarMadera');

// modificar
Route::get('modificarMadera/{id}', [MaderaController::class, 'edit'])->middleware(['auth'])->name('modificarMadera');
Route::put('modificarMadera', [MaderaController::class, 'update'])->middleware(['auth'])->name('modificarMadera');

// eliminar


