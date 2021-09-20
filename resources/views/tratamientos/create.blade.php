@extends('adminlte::page')

@section('title', 'Tratamientos')

@section('content_header')
    <h1>Tratamientos</h1>
@stop

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <form method="post" action="{{route('tratamientos.store')}}">
                    @csrf
                    <div class="card-body">
                        <!-- Fecha de inicio del tratamiento -->
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de inicio</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                    value={{ old('fecha_inicio') }}>
                            </div>
                            @error('fecha_inicio')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Prestador -->
                        <div class="form-group">
                            <label for="prestador_id">Prestador coordinador del tratamiento</label>
                            <select class="form-control" id="prestador_id" name="prestador_id">
                                <option value=""> -- Seleccione -- </option>
                                @foreach ($prestadores as $p)
                                    <option 
                                value="{{ $p->id }}">{{ $p->apellido . ' ' . $p->nombre . ' - ' . $p->documento }}
                                </option>
                                @endforeach
                            </select>
                            @error('prestador_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Paciente -->
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select class="form-control" id="paciente_id" name="paciente_id">
                                <option value=""> -- Seleccione -- </option>
                                @foreach ($pacientes as $p)
                                    <option @if ($p->paciente_id == old('paciente_id',''))
                                        selected="selected"
                                @endif
                                value="{{ $p->id }}">{{ $p->apellido . ' ' . $p->nombre . ' - ' . $p->documento }}
                                </option>
                                @endforeach
                            </select>
                            @error('paciente_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--Estado -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="esta_activo" name="esta_activo"
                            @if (old('esta_activo', true))
                            checked
                            @endif>
                            <label class="form-check-label" for="esta_activo">El tratamiento esta activo</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href={{ route('tratamientos.index') }} class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-info float-right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@error('tratamiento_activo')
    @section('js')
        <script>
        Swal.fire(
            'Oops parece que algo salio mal!',
            'El paciente ya cuenta con un tratamiento activo',
            'error'
        )
        </script>
    @endsection
@enderror
