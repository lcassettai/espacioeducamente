@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Administrar servicios</h1>
@stop

@section('content')
    <div class="row">
        <!-- Formulario de carga servicio-->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del servicio</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('servicios.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="servicio">Servicio</label>
                            <input type="text" class="form-control" id="servicio" name="servicio" value="{{old('servicio')}}">
                            @error('servicio')
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
        <!-- Fin Formulario de carga servicio -->

        <!--Listado de servicios cargados -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Listado de servicios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th >Servicio</th>
                                <th style="width: 10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicios as $s)
                            <tr>
                                <td>{{$s->id}}</td>
                                <td>{{$s->servicio}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm disabled" href="#}"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- fin listado de servicios cargados -->
    </div>
@stop

@if(session('create') == 'ok')  
    @section('js')
        <script>
        Swal.fire(
            'Buen trabajo!',
            'El servicio se cargo con exito!',
            'success'
        )
        </script>
    @endsection
@endif

