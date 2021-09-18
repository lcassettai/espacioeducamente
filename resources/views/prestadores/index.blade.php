@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Listado de prestadores</h1>
    <br>
    <a class="btn btn-info" href="{{ route('prestadores.create') }}">
        <i class="fas fa-user-plus"></i>
        Nuevo prestador
    </a>
@stop

@section('content')
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Listado de prestadores</h3>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestadores as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nombre }}</td>
                                    <td>{{ $p->apellido }}</td>
                                    <td>{{ $p->documento }}</td>
                                    <td>{{ $p->fecha_nacimiento }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('prestadores.show',$p->id)}}"><i class="fas fa-eye"></i></a>
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

