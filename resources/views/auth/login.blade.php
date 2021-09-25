@extends('adminlte::auth.login')


@section('auth_footer')
    <br>
    @error('error_validacion')
        <div class="alert alert-warning">
            {{ $message }}
        </div>
    @enderror
@endsection
