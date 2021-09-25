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
                        <li class="nav-item"><a class="nav-link active" href="#sesiones" data-toggle="tab">Sesiones
                                diarias</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#informes" data-toggle="tab">Informes</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="sesiones">
                            <a href="{{ route('sesiones.create', $prestacion->id) }}" class="btn btn-info"><i
                                    class="far fa-file-alt"></i> Nueva sesion</a>
                            <br><br>
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th>Fecha</th>
                                        <th>Como estuvo la sesion?</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($sesiones as $sesion)
                                        <tr>
                                            <td><strong>{{ $i }}</strong></td>
                                            <td>{{ date('d/m/Y', strtotime($sesion->fecha)) }}</td>
                                            <td>@switch($sesion->evaluacion)
                                                    @case(1)
                                                        <span class="badge bg-danger">Muy mala</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge bg-warning">Mala</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge bg-primary">Indistinto</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge bg-info">Buena</span>
                                                    @break

                                                    @case(5)
                                                        <span class="badge bg-success">Excelente</span>
                                                    @break

                                                    @default
                                                        Default case...
                                                @endswitch
                                            </td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{ route('sesiones.edit', $sesion) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                </a>
                                                <form method="POST" action="{{ route('sesiones.destroy', $sesion->id) }}"
                                                    class="d-inline form-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                                                        </i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{ $sesiones->links() }}
                            </div>
                        </div>
                        <div class="
                                tab-pane" id="informes">
                                <a href="{{ route('informes.create', $prestacion->id) }}" class="btn btn-info"><i
                                        class="far fa-file-alt"></i> Nuevo
                                    informe</a>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped  table-sm">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px">#</th>
                                                <th style="width: 20px">Fecha</th>
                                                <th>Titulo</th>
                                                <th class="text-right">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach ($informes as $informe)
                                                <tr>
                                                    <td>{{ $i }}</td>
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
                                                            <button class="btn btn-danger btn-sm"> <i
                                                                    class="fas fa-trash">
                                                                </i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php($i++)
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
                text: "Esto se borrara de manera permanente!",
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
