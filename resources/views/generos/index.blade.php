@extends('adminlte::page')

@section('title', 'Obras sociales')

@section('content_header')
    <h1>Generos</h1>
@stop

@section('content')
    <div class="row">
        <!-- Formulario de carga obra social -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Generos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('generos.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="genero">Genero</label>
                            <input type="text" class="form-control" id="genero" name="genero" value="{{old('genero')}}">
                            @error('genero')
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
                    <h3 class="card-title">Listado de generos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Genero</th>
                                <th>Sigla</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($generos as $genero)
                            <tr>
                                <td>{{$genero->genero}}</td>
                                <td>{{$genero->sigla}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm disabled" href="{{route('generos.edit',$genero->genero)}}"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- fin listado de |ras sociales -->
    </div>
@stop

@if(session('create') == 'ok')  
    @section('js')
        <script>
        Swal.fire(
            'Buen trabajo!',
            'Se creo el genero con exito!',
            'success'
        )
        </script>
    @endsection
@endif
