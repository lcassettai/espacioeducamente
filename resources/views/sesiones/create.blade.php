@extends('adminlte::page')

@section('title', 'Sesiones')

@section('content_header')
    <h1>Nueva evaluacion de sesión diaria para 
        <strong>{{ $prestacion->tratamiento->paciente->persona->apellido . ' ' . $prestacion->tratamiento->paciente->persona->nombre }}</strong>
    </h1>
@stop

@section('plugins.Summernote', true)

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Sesion diaria</h3>
                </div>

                <form method="post" action="{{ route('sesiones.store') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="prestacion_id" value="{{ $prestacion->id }}">

                        <!-- Fecha -->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                            </div>
                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="summernote" clas="d-block">Como estuvo la sesion?</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="enojado" value="1"
                                    checked>
                                <label class="form-check-label" for="enojado">
                                    <img width="60" src="{{ asset('img/humor_1.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="mal" value="2">
                                <label class="form-check-label" for="mal">
                                    <img width="60" src="{{ asset('img/humor_2.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="indistinto" value="3">
                                <label class="form-check-label" for="indistinto">
                                    <img width="60" src="{{ asset('img/humor_3.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="bien" value="4">
                                <label class="form-check-label" for="bien">
                                    <img width="60" src="{{ asset('img/humor_4.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="feliz" value="5" checked>
                                <label class="form-check-label" for="feliz">
                                    <img width="60" src="{{ asset('img/humor_5.jpg') }}"></img>
                                </label>
                            </div>
                            @error('evaluacion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="summernote">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="summernote">{{old('observaciones')}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type=submit class="btn btn-info float-right">Guardar</button>
                        <a href="{{ route('prestaciones.show', $prestacion->id) }}" class="btn btn-danger ">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
        $(document).ready(function() {

            $('#summernote').summernote({
                height: 250,
                lang: 'es-ES',
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
    </script>
@endsection
