@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Modificar libro
            </div>
            <div class="card-body" style="padding:30px">
                <form action="" method="POST">
                    {{-- Token de proteccion csrf y campo oculto necesario para
                        poder enviar datos al controlador y modificar la base de datos --}}
                    <input type="hidden" name="_method" value="PUT">
                    @csrf

                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$libro['titulo']}}">
                    </div>
        
                    <div class="form-group">
                        <label for="year">Año</label>
                        <input type="number" name="year" id="year" class="form-control"  value="{{$libro['anio']}}">
                    </div>
        
                    <div class="form-group">
                        <label for="escritor">Escritor</label>
                        <input type="text" name="escritor" id="escritor" class="form-control"  value="{{$libro['escritor']}}">
                    </div>
        
                    <div class="form-group">
                        {{-- Voy a usar enlaces, por lo que la imgagen va a ser de tipo url --}}
                        <label for="Portada">Portada</label>
                        <input type="url" name="portada" id="portada" class="form-control"  value="{{$libro['portada']}}">
                    </div>
        
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{$libro['descripcion']}}</textarea>
                    </div>
        
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Modificar libro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>

@stop