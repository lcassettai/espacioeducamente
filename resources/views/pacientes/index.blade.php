@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Listado de pacientes</h1>
    <br>
    <a class="btn btn-info" href="{{ route('pacientes.create') }}">
        <i class="fas fa-user-plus"></i>
        Nuevo paciente
    </a>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Listado de pacientes</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Fecha Nacimiento</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personas as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nombre }}</td>
                                    <td>{{ $p->apellido }}</td>
                                    <td>{{ $p->documento }}</td>
                                    <td>{{ $p->fecha_nacimiento }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('pacientes.edit',$p)}}"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop
