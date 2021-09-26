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
                    <h3>{{ $totales['pacientes'] }}</h3>
                    <p>Pacientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-card"></i>
                </div>
                <a href="{{ route('pacientes.index') }}" class="small-box-footer">Ver pacientes <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totales['tratamientos'] }}</h3>
                    <p>Tratamientos activos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <a href="{{ route('tratamientos.index') }}" class="small-box-footer">Ver tratamientos <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totales['prestadores'] }}</h3>
                    <p>Prestadores</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="{{ route('prestadores.index') }}" class="small-box-footer">Ver prestadores <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
@stop
