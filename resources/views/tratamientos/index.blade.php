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
                    <div class="card-header text-center" style="background-color:#0a616f">
                        @if (empty($t->paciente->persona->imagen_perfil))
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                                alt="User profile picture" width="300" height="300">
                        @else
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset($t->paciente->persona->imagen_perfil) }}" alt="User profile picture"
                                width="300" height="300">
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h4>{{ $t->paciente->persona->apellido . ' ' . $t->paciente->persona->nombre }}<h4>
                        </div>
                        <br>
                        <a href="{{ route('prestaciones.list', $t->id) }}" class="btn btn-info btn-block">Ver</a>
                        @if ($t->soyCreador)
                            <a href="{{ route('tratamientos.show', $t->id) }}"
                                class="btn btn-info btn-block">Administrar</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
