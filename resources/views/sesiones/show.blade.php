@extends('adminlte::page')

@section('title', 'Sesion')

@section('content_header')
    <h2 class="text-center">
        Sesion del dia <strong>{{ date('d/m/Y', strtotime($sesion->fecha)) }}</strong>
    </h2>

@stop


@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header bg-info">

                </div>
                <div class="card-body">
                    <p>
                        <strong>Fecha: </strong> {{ date('d/m/Y', strtotime($sesion->fecha)) }}
                    </p>
                    <p>
                        <strong>Como estuvo la sesión: </strong>
                        <img width="60" src="{{ asset('img/humor_' . $sesion->evaluacion . '.jpg') }}"></img>
                    <p>
                    <p>
                        <strong>Observaciones :</strong>
                    <div class="bg-light p-2 border rounded">
                        @php
                            echo $sesion->observaciones;
                        @endphp
                    </div>
                    </p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-danger" href="{{ route('prestaciones.show', $sesion->prestacion_id) }}">Volver</a>
                    <!--
                    <a class="btn btn-info float-right" >Editar</a>
                    -->
                </div>
            </div>
        </div>
    </div>
@stop
