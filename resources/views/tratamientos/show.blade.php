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
                            <b>Inicio del tratamiento: </b> <span
                                class="float-right">{{ date('d/m/Y',strtotime($tratamiento->fecha_inicio)) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Cuenta con Cud: </b> <span
                                class="float-right">{{ $tratamiento->paciente->tiene_cud ? 'SI' : 'NO' }}</span>
                        </li>

                    </ul>
                    <br>
                    <a href="{{ route('pacientes.show', $tratamiento->paciente->id) }}"
                        class="btn btn-info btn-block"><b>Ver información del paciente</b></a>
                </div>
                <!--Info del paciente -->

            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <!--formulario alta de prestacion -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Prestaciones</h3>
                        </div>

                        <form method="post" action="{{ route('prestaciones.store') }}">
                            @csrf
                            <input type="hidden" value="{{ $tratamiento->id }}" name="tratamiento_id" />
                            <div class="card-body">
                                <div class="form-row">
                                    <!-- Fecha de alta -->
                                    <div class="form-group col-md-12">
                                        <label for="fecha_nacimiento">Fecha de alta</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta"
                                                value={{ old('fecha_alta') }}>
                                        </div>
                                        @error('fecha_alta')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

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

                                    <div class="form-group col-md-8">
                                        <label for="servicio_id">Servicio prestado</label>
                                        <select class="form-control" id="servicio_id" name="servicio_id">
                                            <option value=""> -- Seleccione -- </option>
                                            @foreach ($servicios as $s)
                                                <option value="{{ $s->id }}">
                                                    {{ $s->servicio }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('servicio')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!--cantidad desesiones -->
                                    <div class="form-group col-md-4">
                                        <label for="sesiones_asignadas">Cantidad de sesiones</label>
                                        <input type="text" id="sesiones_asignadas" class="form-control"
                                            name="sesiones_asignadas">
                                        @error('sesiones_asignadas')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Observaciones -->
                                    <div class="form-group col-md-12">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea class="form-control" name="observaciones" id="observaciones"></textarea>
                                        @error('observaciones')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href={{ route('tratamientos.index') }} class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-info float-right">Agregar prestacion</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Fin formulario alta de prestacion -->





                <!--Listado de prestacioness -->
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Listado de prestaciones</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Prestador</th>
                                        <th>Servicio</th>
                                        <th class="text-center">Inicio</th>
                                        <th class="text-center">Sesiones</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestaciones as $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->prestador->persona->apellido . ' ' . $p->prestador->persona->nombre}}</td>
                                            <td>{{ $p->servicio->servicio }}</td>
                                            <td class="text-center">{{ date('d/m/Y',strtotime($p->fecha_alta)) }}</td>
                                            <td class="text-center">{{ $p->sesiones_asignadas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@if (session('prestacion') == 'ok')
    @section('js')
        <script>
            Swal.fire(
                'Buen trabajo!',
                'La prestacion se cargo con exito!',
                'success'
            )
        </script>
    @endsection
@endif


@error('prestaciones_activas')
    @section('js')
        <script>
        Swal.fire(
            'Oops parece que algo salio mal!',
            'El paciente ya tiene asignado este servicio ',
            'error'
        )
        </script>
    @endsection
@enderror
