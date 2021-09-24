@extends('adminlte::page')

@section('title', 'Tratamiento')

@section('content_header')
    <h2 class="text-center">
        Prestacion de <strong>{{ $prestacion->servicio->servicio }}</strong>
    </h2>

@stop


@section('content')
    <div class="row">
        <!--Info del paciente -->
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header card-info text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                        alt="User profile picture" width="300" height="300">
                    <h3>{{ $prestacion->tratamiento->paciente->persona->nombre }}
                        {{ $prestacion->tratamiento->paciente->persona->apellido }}</h3>
                    <p class="text-white text-center">Paciente</p>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre: </b> <span
                                class="float-right">{{ $prestacion->tratamiento->paciente->persona->nombre }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido: </b> <span
                                class="float-right">{{ $prestacion->tratamiento->paciente->persona->apellido }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Inicio del tratamiento: </b> <span
                                class="float-right">{{ date('d/m/Y', strtotime($prestacion->tratamiento->fecha_inicio)) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Inicio de la prestacion: </b> <span
                                class="float-right">{{ date('d/m/Y', strtotime($prestacion->fecha_inicio)) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Prestador: </b> <span
                                class="float-right">{{ $prestacion->prestador->persona->apellido . ' ' . $prestacion->prestador->persona->nombre }}</span>
                        </li>

                    </ul>
                    <br>
                    <a href="{{ route('pacientes.show', $prestacion->tratamiento->paciente->id) }}"
                        class="btn btn-info btn-block"><b>Ver información del paciente</b></a>
                </div>
                <!--Info del paciente -->

            </div>
        </div>

        <div class="col-md-9">
            <div class="card card-info card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#sesiones"
                                data-toggle="tab">Sesiones</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#informes" data-toggle="tab">Informes</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="sesiones">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">Fecha</th>
                                        <th>Objetivos cumplidos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>23/11/1991</td>
                                        <td>SI / NO</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="informes">
                            <a href="{{ route('informes.create', $prestacion->id) }}" class="btn btn-info"><i
                                    class="far fa-file-alt"></i> Nuevo
                                informe</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">Fecha</th>
                                            <th>Titulo</th>
                                            <th class="text-right">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($informes as $informe)
                                            <tr>
                                                <td>{{ date('d/m/Y', strtotime($informe->fecha)) }}</td>
                                                <td>{{ $informe->titulo }}</td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm" href="">
                                                        <i class="fas fa-eye">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('informes.edit', $informe) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('informes.destroy', $informe) }}"
                                                        class="d-inline form-eliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                                                            </i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
    </div>
@stop


@section('js')
    @if (session('carga') == 'ok')
        <script>
            Swal.fire(
                'Buen trabajo!',
                'Se cargo con exito!',
                'success'
            )
        </script>
    @endif

    <script>
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "Se va a borrar este informe de manera permanente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#66bb6a',
                cancelButtonColor: '#ef5350 ',
                confirmButtonText: 'Si, borralo!',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
