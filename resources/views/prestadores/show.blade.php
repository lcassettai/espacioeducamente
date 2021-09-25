@extends('adminlte::page')

@section('title', 'Prestador')

@section('content_header')
    <h1>Informacion del prestador</h1>

@stop


@section('content')
    <div class="row">
        <!--Info del prestador -->
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header card-info text-center">
                    @if (empty($prestador->persona->imagen_perfil))
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                            alt="User profile picture" width="300" height="300">
                    @else
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset($prestador->persona->imagen_perfil) }}" alt="User profile picture" width="300"
                            height="300">
                    @endif
                    <h3>{{ $prestador->persona->nombre }}
                        {{ $prestador->persona->apellido }}</h3>
                    <p class="text-white text-center">Prestador</p>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre: </b> <span class="float-right">{{ $prestador->persona->nombre }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido: </b> <span class="float-right">{{ $prestador->persona->apellido }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de nacimiento: </b> <span
                                class="float-right">{{ date('d/m/Y', strtotime($prestador->persona->fecha_nacimiento)) }}</span>

                        </li>
                        <li class="list-group-item">
                            <b>Genero: </b> <span class="float-right">{{ $prestador->persona->genero->genero }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Documento: </b> <span class="float-right">{{ $prestador->persona->documento }}</span>
                        </li>
                        @if ($prestador->persona->cuit)
                            <li class="list-group-item">
                                <b>Cuit: </b> <span class="float-right">{{ $prestador->persona->cuit }}</span>
                            </li>
                        @endif
                        @if ($prestador->persona->email)
                            <li class="list-group-item">
                                <b>Email: </b> <span class="float-right">{{ $prestador->persona->email }}</span>
                            </li>
                        @endif


                    </ul>
                    <br>
                    <a href="{{ route('prestadores.edit', $prestador->id) }}"
                        class="btn btn-info btn-block"><b>Editar</b></a>
                </div>
                <!--Info del paciente -->

            </div>
        </div>

        <!-- Informacion del prestador -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#diagnostico"
                                data-toggle="tab">Diagnostico</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tratamientos"
                                data-toggle="tab">Tratamientos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#usuario" data-toggle="tab">Usuario</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="diagnostico">
                            diagnostico
                        </div>
                        <div class="tab-pane" id="usuario">
                            usuario
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>

@stop

@if (session('edit') == 'ok')
    @section('js')
        <script>
            Swal.fire(
                'Buen trabajo!',
                'Los datos del prestador fueron editados con exito!',
                'success'
            )
        </script>
    @endsection
@endif
