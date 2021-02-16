<?php

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
    return view('home');
});

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
    Route::get('/', function(){
        return view('biblioteca.index');
    });

    // Vista en detalle de un libro concreto. Para alquilar (socio) o editar/eliminar (bibliotecario)
    Route::get('/detalle/{id}', function(){
        return view('biblioteca.detalle', array('id'=>$id));
    });

    // Añade un nuevo libro. Solo accesible al usuario bibliotecario. Redirige a detalle si es socio
    Route::get('/nuevoLibro', function(){
        return view('biblioteca.nuevoLibro');
    });

    // Para editar un libro ya creado. Redirige a detalle si es socio
    Route::get('/editarLibro{id}', function(){
        return view('biblioteca.editarLibro', array('id'=>$id));
    });
});

