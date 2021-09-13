@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totales['pacientes']}}</h3>
                    <p>Pacientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-card"></i>
                </div>
                <a href="{{route('pacientes.index')}}" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        
    </div>
@stop
