<?php

// Ruta de los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BibliotecaController;

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

Route::get('/', [HomeController::class, 'getHome']);

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/logout', function () {
    return view('logout');
});

// Grupo de rutas con prefijo común - BIBLIOTECA
//  La ruta biblioteca va a ser donde se muestren todos los libros disponibles
Route::group(['prefix' => 'biblioteca'/*, 'middleware' => 'auth'*/], function () {
    // Raiz de la seccion biblioteca
    Route::get('/', [BibliotecaController::class, 'getIndex']);

    // Vista en detalle de un libro concreto. Para alquilar (socio) o editar/eliminar (bibliotecario)
    Route::get('/detalle/{id}', [BibliotecaController::class, 'getDetalleLibro']);

    // Añade un nuevo libro. Solo accesible al usuario bibliotecario. Redirige a detalle si es socio
    Route::get('/nuevoLibro', [BibliotecaController::class, 'getNuevoLibro']);

    // Para editar un libro ya creado. Redirige a detalle si es socio
    Route::get('/editarLibro/{id}', [BibliotecaController::class, 'getEditarLibro']);
});

// COMPROBAR FORMULARIO
Route::post('checkNuevoLibro', [BibliotecaController::class, 'checkNuevoLibro']);

