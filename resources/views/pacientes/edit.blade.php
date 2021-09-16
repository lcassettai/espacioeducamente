@extends('adminlte::page')

@section('title', 'Editar paciente')

@section('content_header')
    <h1>Editar datos personales de <b>{{$paciente->persona->apellido}} {{$paciente->persona->nombre}}</b></h1>
@stop

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('pacientes.update',$paciente) }}">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value={{old('nombre',$paciente->persona->nombre)}}>
                            @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value={{old('apellido',$paciente->persona->apellido)}}>
                            @error('apellido')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value={{old('fecha_nacimiento',$paciente->persona->fecha_nacimiento)}}>                               
                            </div>
                            @error('fecha_nacimiento')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div> 

                        <!-- Genero -->
                        <div class="form-group">
                            <label  for="genero_sigla">Genero</label>
                            <select class="form-control" id="genero_sigla" name="genero_sigla">
                                 <option value=""> -- Seleccione -- </option>
                                @foreach ($generos as $g )
                                    <option value="{{$g->sigla}}"
                                        @if ($g->sigla == old('genero_sigla', $paciente->persona->genero_sigla))
                                            selected="selected"
                                        @endif>
                                        {{$g->genero}}
                                    </option>
                                @endforeach                                
                            </select>
                            @error('genero_sigla')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Documento -->
                        <div class="form-group">
                            <label for="documento">Numero de documento</label>
                            <input type="text" class="form-control" id="documento" name="documento" value="{{old('documento',$paciente->persona->documento)}}">
                            @error('documento')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Cuit -->
                        <div class="form-group">
                            <label for="cuit">Cuit</label>
                            <input type="text" class="form-control" id="cuit" name="cuit" value="{{old('cuit',$paciente->persona->cuit)}}">
                            @error('cuit')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email',$paciente->persona->email)}}">
                            </div>
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>    

                        <!-- Telefono -->
                        <div class="form-group">
                            <label for="telefono">Numero de celular</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono',$paciente->persona->telefono)}}">
                            </div>
                            @error('telefono')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div> 

                        <!-- CUD -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="tiene_cud"  name="tiene_cud"
                            @if(old('tiene_cud',$paciente->tiene_cud))
                                checked
                            @endif>
                            <label class="form-check-label" for="tiene_cud">El paciente cuenta con cud</label>
                        </div>

                        <!--Estado -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="esta_activo"  name="esta_activo"
                            @if(old('esta_activo',$paciente->persona->esta_activo))
                                checked
                            @endif>
                            <label class="form-check-label" for="esta_activo">El paciente esta activo</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href={{route('pacientes.index')}} class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-info float-right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
