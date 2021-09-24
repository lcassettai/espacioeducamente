@extends('adminlte::page')

@section('title', 'Informes')

@section('content_header')
    <h1>Nuevo informe para el paciente
        <strong>{{ $prestacion->tratamiento->paciente->persona->apellido . ' ' . $prestacion->tratamiento->paciente->persona->nombre }}</strong>
    </h1>
@stop


@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Informe</h3>
                </div>

                <form method="post" action="{{ route('informes.store') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="prestacion_id" value="{{ $prestacion->id }}">

                        <!-- Titulo -->
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo">
                            @error('titulo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Fecha -->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Observaciones -->
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="observaciones"></textarea>
                            @error('observaciones')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="archivo">Archivo</label><br>
                            <input type="file" id="archivo"
                                accept="application/pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                name="archivo">
                             @error('archivo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type=submit class="btn btn-info float-right">Guardar</button>
                        <a href="{{ route('prestaciones.show', $prestacion->id) }}" class="btn btn-danger ">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop
