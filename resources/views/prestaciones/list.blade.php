@extends('adminlte::page')

@section('title', 'Prestaciones')

@section('content_header')
    <h1>Tratamiento de <b>{{$tratamiento->paciente->persona->apellido . ' ' . $tratamiento->paciente->persona->nombre}}</b></h1>
    <br>
    <h3>Listado de prestaciones</h3>
@stop

@section('content')
    <div class="row">
        @foreach ($prestaciones as $p)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #0F6370"> 
                      
                    </div>
                    <div class="card-body text-center">
                        <h4>  {{$p->servicio->servicio}}<h4>
                        <p>{{$p->prestador->persona->apellido}}</p>
                        <br>
                        <a href="{{route('prestaciones.show',$p->id)}}" class="btn btn-info btn-block">Ver</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
