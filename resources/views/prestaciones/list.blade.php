@extends('adminlte::page')

@section('title', 'Prestaciones')

@section('content_header')
    <h1>Tratamiento de
        <b>{{ $tratamiento->paciente->persona->apellido . ' ' . $tratamiento->paciente->persona->nombre }}</b></h1>
    <br>
    <h3>Listado de prestaciones</h3>
@stop

@section('content')
    <div class="row">
        @foreach ($prestaciones as $p)
            <div class="col-md-3">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header {{(Session::get('prestador') == $p->prestador_id) ? 'bg-info' : 'bg-secondary'}}">
                        <h3 class="widget-user-username">{{ $p->prestador->persona->apellido }}</h3>
                        <h5 class="widget-user-desc">{{ $p->servicio->servicio }}</h5>
                    </div>
                    <div class="widget-user-image">
                        @if (empty($p->prestador->persona->imagen_perfil))
                            <img class="img-circle elevation-2" src="{{ asset('img/user.png') }}"
                                alt="User profile picture" width="300" height="300">
                        @else
                            <img class="img-circle elevation-2" src="{{ asset($p->prestador->persona->imagen_perfil) }}"
                                alt="User profile picture" width="300" height="300">
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('prestaciones.show', $p->id) }}" class="btn btn-block"  style="background-color:#0a616f;color:#fff">Ver prestación</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
