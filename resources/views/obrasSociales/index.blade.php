@extends('adminlte::page')

@section('title', 'Obras sociales')

@section('content_header')
    <h1>Obras Sociales</h1>
@stop

@section('content')
    <div class="row">
        <!-- Formulario de carga obra social -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos obra social</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('obras_sociales.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sigla">Sigla</label>
                            <input type="text" class="form-control" id="sigla" name="sigla" value="{{old('sigla')}}">
                            @error('sigla')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cuit">Cuit</label>
                            <input type="text" class="form-control" id="cuit" name="cuit" value="{{old('cuit')}}">
                            @error('cuit')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin Formulario de carga obra social -->

        <!--Listado de obras sociales cargadas -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Listado de obras sociales</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Sigla</th>
                                <th>Nombre</th>
                                <th style="width: 40px">CUIT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obrasSociales as $obs)
                            <tr>
                                <td>{{$obs->id}}</td>
                                <td>{{$obs->sigla}}</td>
                                <td>{{$obs->nombre}}</td>
                                <td>{{$obs->cuit}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm disabled" href="{{route('obras_sociales.edit',$obs)}}"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- fin listado de obras sociales -->
    </div>
@stop
