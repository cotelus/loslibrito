<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    // Devuelve la vista que muestra todos los libros
    public function getIndex(){
        return view('biblioteca.index');
    }

    public function getNuevoLibro(){
        return view('biblioteca.nuevoLibro');
    }

    public function getEditarLibro(){
        return view('biblioteca.editarLibro', array('id'=>$id));
    }

    // Devuelve la vista que muestra un libro en detalle
    public function getDetalleLibro(){
        return view('biblioteca.detalle', array('id'=>$id));
    }
}
