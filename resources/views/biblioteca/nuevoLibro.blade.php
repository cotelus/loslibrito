@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Añadir libro
            </div>
            {{-- Errores forumlario --}}
            @if ($errors->any())
                <h3 style="color: LightCoral">Error con algún campo del formulario</h3>
            @endif

            <div class="card-body" style="padding:30px">
                <form method="POST" action="http://loslibrito.test/checkNuevoLibro">
                    {{-- Token de proteccion csrf --}}
                    @csrf

                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo')}}">
                    </div>
        
                    <div class="form-group">
                        <label for="anio">Año</label>
                        <input type="number" name="anio" id="anio" class="form-control">
                    </div>
        
                    <div class="form-group">
                        <label for="escritor">Escritor</label>
                        <input type="text" name="escritor" id="escritor" class="form-control">
                    </div>
        
                    <div class="form-group">
                        {{-- Voy a usar enlaces, por lo que la imgagen va a ser de tipo url --}}
                        <label for="Portada">Portada</label>
                        <input type="url" name="portada" id="portada" class="form-control">
                    </div>
        
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>
        
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Añadir libro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>

@stop