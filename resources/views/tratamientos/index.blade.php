@extends('adminlte::page')

@section('title', 'Tratamientos')

@section('content_header')
    <h1>Tratamientos activos</h1>
    <br>
    <a class="btn btn-info" href="{{ route('tratamientos.create') }}">
        <i class="fas fa-file-medical"></i>
        Nuevo tratamiento
    </a>
@stop

@section('content')
    <div class="row">
        @foreach ($tratamientos as $t)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center bg-secondary">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                            alt="User profile picture" width="300" height="300">
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h4>{{ $t->paciente->persona->apellido . ' ' . $t->paciente->persona->nombre }}<h4>
                                    <p class="text-muted"><small> Iniciado el
                                            {{ date('d/m/Y', strtotime($t->fecha_inicio)) }}</small></p>
                        </div>
                        <br>
                        <a href="#" class="btn btn-info btn-block">Ver</a>
                        <a href="{{ route('tratamientos.show', $t->id) }}" class="btn btn-info btn-block">Administrar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
