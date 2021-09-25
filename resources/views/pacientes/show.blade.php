@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')
    <h1>Informacion del Paciente</h1>

@stop


@section('content')
    <div class="row">
        <!--Info del paciente -->
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header card-info text-center">
                    @if (empty($paciente->persona->imagen_perfil))
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                            alt="User profile picture" width="300" height="300">
                    @else
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset($paciente->persona->imagen_perfil) }}" alt="User profile picture" width="300"
                            height="300">
                    @endif

                    <h3>{{ $paciente->persona->nombre }}
                        {{ $paciente->persona->apellido }}</h3>
                    <p class="text-white text-center">Paciente</p>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre: </b> <span class="float-right">{{ $paciente->persona->nombre }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido: </b> <span class="float-right">{{ $paciente->persona->apellido }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de nacimiento: </b> <span
                                class="float-right">{{ date('d/m/Y', strtotime($paciente->persona->fecha_nacimiento)) }}</span>

                        </li>
                        <li class="list-group-item">
                            <b>Genero: </b> <span class="float-right">{{ $paciente->persona->genero->genero }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Documento: </b> <span class="float-right">{{ $paciente->persona->documento }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Cuenta con Cud: </b> <span
                                class="float-right">{{ $paciente->tiene_cud ? 'SI' : 'NO' }}</span>
                        </li>
                        @if ($paciente->persona->cuit)
                            <li class="list-group-item">
                                <b>Cuit: </b> <span class="float-right">{{ $paciente->persona->cuit }}</span>
                            </li>
                        @endif
                        @if ($paciente->persona->email)
                            <li class="list-group-item">
                                <b>Email: </b> <span
                                    class="float-right">{{ empty($paciente->persona->email) ? $paciente->persona->email : '-' }}</span>
                            </li>
                        @endif


                    </ul>
                    <br>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}"
                        class="btn btn-info btn-block"><b>Editar</b></a>
                </div>
                <!--Info del paciente -->

            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#diagnostico"
                                data-toggle="tab">Diagnostico</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tratamientos"
                                data-toggle="tab">Tratamientos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Contacto</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="diagnostico">
                            <div class="pt-2 pb-2 ">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="far fa-file-alt"></i> Nuevo diagnostico
                                </button>
                            </div>

                            <div id="accordion">
                                @foreach ($paciente->diagnosticos as $diagnostico)
                                    <div class="card ">
                                        <div class="card-header bg-secondary" id="heading-{{ $diagnostico->id }}">
                                            <h5 class="mb-0  ">
                                                <button class="btn text-light" data-toggle="collapse"
                                                    data-target="#collapse{{ $diagnostico->id }}" aria-expanded="true"
                                                    aria-controls="collapse{{ $diagnostico->id }}">
                                                    Diagnostico del {{ date('d/m/Y', strtotime($diagnostico->fecha)) }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse{{ $diagnostico->id }}" class="collapse"
                                            aria-labelledby="collapse{{ $diagnostico->id }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <strong>Detalle : </strong>
                                                <p>
                                                    {{ $diagnostico->detalle }}
                                                </p>
                                                <br />
                                                <a class="btn btn-danger" href="{{ $diagnostico->archivo_url }}"><i
                                                        class="fas fa-file-pdf"></i>Descarga diagnostico</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="tratamientos">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Fecha de inicio</th>
                                                <th>Coordinador/a</th>
                                                <th>Esta activo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach ($paciente->tratamientos as $tratamiento)
                                                <tr>
                                                    <td>{{ $i }}.</td>
                                                    <td>{{ date('d/m/Y', strtotime($tratamiento->fecha_inicio)) }}</td>
                                                    <td>{{ $tratamiento->prestador->persona->apellido . ' ' . $tratamiento->prestador->persona->nombre }}
                                                    </td>
                                                    <td>{{ $tratamiento->esta_activo ? 'SI' : 'NO' }}</td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('prestaciones.list', $tratamiento->id) }}">
                                                            <i class="fas fa-eye">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php($i++)
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo diagnostico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('diagnosticos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="paciente" value="{{ $paciente->id }}">
                        <!-- Fecha-->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="detalle" id="detalle"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="archivo">Archivo</label><br>
                            <input type="file" id="archivo" accept="application/pdf" name="archivo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@if (session('edit') == 'ok')
    @section('js')
        <script>
            Swal.fire(
                'Buen trabajo!',
                'Los datos del pacientee fueron editados con exito!',
                'success'
            )
        </script>
    @endsection
@endif
