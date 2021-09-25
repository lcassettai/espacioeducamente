@extends('adminlte::page')

@section('title', 'Sesiones')

@section('content_header')
    <h1>Editar sesion del

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

                <form method="post" action="{{ route('sesiones.update', $sesion) }}">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <!-- Fecha -->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                    value="{{ old('fecha', $sesion->fecha) }}">
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
                                    {{ old('evaluacion', $sesion->evaluacion) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="enojado">
                                    <img width="60" src="{{ asset('img/humor_1.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="mal" value="2"
                                    {{ old('evaluacion', $sesion->evaluacion) == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="mal">
                                    <img width="60" src="{{ asset('img/humor_2.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="indistinto" value="3"
                                    {{ old('evaluacion', $sesion->evaluacion) == 3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="indistinto">
                                    <img width="60" src="{{ asset('img/humor_3.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="bien" value="4"
                                    {{ old('evaluacion', $sesion->evaluacion) == 4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="bien">
                                    <img width="60" src="{{ asset('img/humor_4.jpg') }}"></img>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evaluacion" id="feliz" value="5"
                                    {{ old('evaluacion', $sesion->evaluacion) == 5 ? 'checked' : '' }}>
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
                            <textarea class="form-control" name="observaciones"
                                id="summernote">{{ old('observaciones', $sesion->observaciones) }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type=submit class="btn btn-info float-right">Guardar</button>
                        <a href="{{ route('prestaciones.show', $sesion->prestacion_id) }}"
                            class="btn btn-danger ">Cancelar</a>
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
                maximumImageFileSize: 500 * 1024, // 500 KB
                callbacks: {
                    onImageUploadError: function(msg) {
                        Swal.fire(
                            'Opps!',
                            'La imagen que intentas cargar supera los 500kb!',
                            'error'
                        )
                    }
                },
                lang: 'es-ES',
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen']]
                ]
            });
        });
    </script>
@endsection
