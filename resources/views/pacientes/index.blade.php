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
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Listado de pacientes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Fecha Nacimiento</th>
                                <th>Cuenta con CUD</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nombre }}</td>
                                    <td>{{ $p->apellido }}</td>
                                    <td>{{ $p->documento }}</td>
                                    <td>{{ $p->fecha_nacimiento }}</td>
                                    <td>{{ ($p->tiene_cud) ? "SI":"NO" }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('pacientes.edit',$p->id)}}"><i class="fas fa-eye"></i></a>
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


@if(session('create') == 'ok')  
    @section('js')
        <script>
        Swal.fire(
            'Buen trabajo!',
            'El paciente se cargo con exito!',
            'success'
        )
        </script>
    @endsection
@endif

@if(session('edit') == 'ok')  
    @section('js')
        <script>
        Swal.fire(
            'Buen trabajo!',
            'El paciente se edito con exito!',
            'success'
        )
        </script>
    @endsection
@endif
