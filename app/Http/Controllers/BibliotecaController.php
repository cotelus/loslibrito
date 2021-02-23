<?php

namespace App\Http\Controllers;
use DB;

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

    // Comprueba que los parametros introducidos par anuevo libro son válidos
    public function postNuevoLibro(Request $request){
        // Validacion del formulario
        request()->validate([
            'titulo' => 'required|max:255',
            'anio' => 'required',
			'escritor' => 'required',
            'portada' => 'required',
            'descripcion' => 'required'
		]);

        // Insercion en la BBDD
        $contenido = $request->input();
        try{
            // Se crea un objeto libro y se le introducen los datos del formulario
            $libro = new Libro;
            $libro->titulo = $contenido['titulo'];
            $libro->anio = $contenido['anio'];
            $libro->escritor = $contenido['escritor'];
            $libro->portada = $contenido['portada'];
            $libro->disponible = true;
            $libro->descripcion = $contenido['descripcion'];
            // Se almacena la informacion en la BBDD
            $libro->save();

            return redirect('/biblioteca');
        }
        catch(Exception $e){
            // Si hubo algun error, se devuelve a una pagina de error
            return redirect('falloInsert');
        }
    }

    // Comprueba que los parametros introducidos para modificar libro son validos
    public function putEditarLibro(Request $request){
        // Validacion del formulario
        request()->validate([
            'titulo' => 'required|max:255',
            'anio' => 'required',
			'escritor' => 'required',
            'portada' => 'required',
            'descripcion' => 'required'
		]);

        // Insercion en la BBDD
        $contenido = $request->input();
        $id = $contenido['id'];
        try{
            // Se busca el libro y se modifican los datos
            $libro = Libro::find($id);
            $libro->titulo = $contenido['titulo'];
            $libro->anio = $contenido['anio'];
            $libro->escritor = $contenido['escritor'];
            $libro->portada = $contenido['portada'];
            $libro->disponible = true;
            $libro->descripcion = $contenido['descripcion'];
            // Se almacena la informacion en la BBDD
            $libro->save();

            return redirect('/biblioteca');
        }
        catch(Exception $e){
            // Si hubo algun error, se devuelve a una pagina de error
            return redirect('falloInsert');
        }
    }

    // Elimina un libro de la base de datos
    public function eliminarLibro($id){
        try{
            Libro::where('id', $id)->delete();
            return redirect('/biblioteca');
        }
        catch(Exception $e){
            // Si hubo algun error, se devuelve a una pagina de error
            return redirect('falloInsert');
        }
    }
}
