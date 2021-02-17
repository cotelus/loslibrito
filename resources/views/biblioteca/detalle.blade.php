@extends('layouts.master')

@section('content')

<div class="container-fluid mt-3">
    <div class="row col-10 offset-1">
        <div class="col-sm-4 ">
            {{-- Muestra la información del libro --}}
            <img class="rounded float-right" src="{{$libro['portada']}}" style="height:300px">
        </div>
        <div class="col-sm-8">
            <h2>{{$libro['titulo']}}</h2>
            <h4>Año: {{$libro['anio']}}</h4>
            <h4>Escritor: {{$libro['escritor']}}</h4>
            <p><strong>Descripcion:</strong> {{$libro['descripcion']}}</p>
            <br>

            <div class="row col-sm-12">
                {{-- Comprueba si el libro está disponible o no --}}
                @if ($libro['disponible'] == false)
                    <div class="col-12">
                        <p clas="col-12" style="color: LightCoral"><strong>Estado:</strong> No disponible</p>
                    </div>
                    <button clas="col-3" type="button" class="btn btn-danger">Devolver libro</button>
                @else
                    <div class="col-12">
                        <p clas="col-12" style="color: lightgreen"><strong>Estado:</strong> Disponible </p>
                    </div>
                    <button clas="col-3" type="button" class="btn btn-primary">Alquilar libro</button>
                @endif
                <button clas="col-3" type="button" onclick="window.location.href='{{url("/biblioteca/editarLibro/$id")}}';" class="btn ml-1 btn-warning text-light">Editar libro</button>
                <button clas="col-3" type="button" onclick="window.location.href='{{url("/biblioteca/")}}';" class="btn ml-1 btn-outline-dark">Volver al listado</button>
            </div>

        </div>
    </div>
</div>

@stop