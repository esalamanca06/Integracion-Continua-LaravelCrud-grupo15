<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CrudController::class,"index"])->name("crude.index");

// Ruta agregar

Route::post("/ingresar", [CrudController::class,"create"])->name("crude.create");

// Ruta Modificar

Route::post("/modificar", [CrudController::class,"update"])->name("crude.update");

// Ruta Eliminar

Route::get("/eliminar-usuario-{id}", [CrudController::class,"delete"])->name("crude.delete");