@extends('adminlte::page')

@section('title', 'Tratamiento')

@section('content_header')
    <h1>Administrar tratamiento de
        <strong>{{ $tratamiento->paciente->persona->nombre . ' ' . $tratamiento->paciente->persona->apellido }}</strong>
    </h1>

@stop


@section('content')
    <div class="row">
        <!--Info del paciente -->
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header card-info text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                        alt="User profile picture" width="300" height="300">
                    <h3>{{ $tratamiento->paciente->persona->nombre }}
                        {{ $tratamiento->paciente->persona->apellido }}</h3>
                    <p class="text-white text-center">Paciente</p>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre: </b> <span
                                class="float-right">{{ $tratamiento->paciente->persona->nombre }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido: </b> <span
                                class="float-right">{{ $tratamiento->paciente->persona->apellido }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de nacimiento: </b> <span
                                class="float-right">{{ date('d/m/Y', strtotime($tratamiento->paciente->persona->fecha_nacimiento)) }}</span>

                        </li>
                        <li class="list-group-item">
                            <b>Genero: </b> <span
                                class="float-right">{{ $tratamiento->paciente->persona->genero->genero }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Documento: </b> <span
                                class="float-right">{{ $tratamiento->paciente->persona->documento }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Cuenta con Cud: </b> <span
                                class="float-right">{{ $tratamiento->paciente->tiene_cud ? 'SI' : 'NO' }}</span>
                        </li>

                    </ul>
                    <br>
                    <a href="{{ route('pacientes.show', $tratamiento->paciente->id) }}"
                        class="btn btn-info btn-block"><b>Ver paciente</b></a>
                </div>
                <!--Info del paciente -->

            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Prestaciones</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-row">
                            <!-- Prestador -->
                            <div class="form-group col-md-12">
                                <label for="prestador_id">Prestador</label>
                                <select class="form-control" id="prestador_id" name="prestador_id">
                                    <option value=""> -- Seleccione -- </option>
                                    @foreach ($prestadores as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->apellido . ' ' . $p->nombre . ' - ' . $p->documento }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('prestador_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!--cantidad desesiones -->
                            <div class="form-group col-md-2">
                                <label for="cant_sesiones">Cantidad de sesiones</label>
                                <input type="text" id="cant_sesiones" class="form-control" name="cant_sesiones">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
