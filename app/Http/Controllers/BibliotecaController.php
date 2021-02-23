<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class BibliotecaController extends Controller
{
   
    // Devuelve la vista que muestra todos los libros
    public function getIndex(){
		// Recupera la información de la BBDD
		$libros = Libro::all();

        return view('biblioteca.index', array('libros'=>$libros));
    }

    // Devuelve la vista para añadir un nuevo libro al sistema con un formulario
    public function getNuevoLibro(){
        return view('biblioteca.nuevoLibro');
    }

    // Devuelve la vista para editar un libro
    public function getEditarLibro($id){
		$libros = Libro::findOrFail($id);

        return view('biblioteca.editarLibro', array('id'=>$id, 'libro'=>$libros));
    }

    // Devuelve la vista que muestra un libro en detalle
    public function getDetalleLibro($id){
		$libros = Libro::findOrFail($id);

        return view('biblioteca.detalle', array('id'=>$id, 'libro'=>$libros));
    }

	// Devuelve la vista para añadir un nuevo libro al sistema con un formulario
    public function checkNuevoLibro(Request $request){
		request()->validate([
			'escritor' => 'required'
		]);

		return "Datos bien";
    }
}
