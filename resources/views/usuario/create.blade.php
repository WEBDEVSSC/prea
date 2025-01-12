@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1><strong>Usuarios</strong></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('usuarioIndex') }}">Panel de Control</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo registro</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-header">
            <h3 class="card-title">Usuarios registrados</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    
                <form action="{{ route('usuarioStore') }}" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <p>Nombre</p>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                            @error('nombre')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>Email</p>
                            <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}">
                            @error('correo')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>Contraseña</p>
                            <input type="password" name="password" id="password" class="form-control" >
                            @error('password')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>*</p>
                            <input type="password" placeholder="Repite la contraseña" id="rPassword" name="rPassword" class="form-control">
                            @error('rPassword')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p>Categoría</p>
                            <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria') }}">
                            @error('categoria')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>Nivel</p>
                            <select name="nivel" id="nivel" class="form-control">
                                <option value="">[ Seleccione una opción ]</option>
                                <option value="1" {{ old('nivel') == '1' ? 'selected' : '' }}>Administrador SSC</option>
                                <option value="2" {{ old('nivel') == '2' ? 'selected' : '' }}>Jurisdicción</option>
                                <option value="3" {{ old('nivel') == '3' ? 'selected' : '' }}>Unidad</option>
                            </select>
                            @error('nivel')
                                <br>
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>CLUES</p>
                            <input type="text" name="clues" class="form-control" value="{{ old('clues') }}">
                            @error('clues')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <p>Seleccione las notificaciones que recibira por email</p>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="cuasifalla" value="0"> <!-- Valor por defecto cuando no está marcado -->
                                <input name="cuasifalla" type="checkbox" class="custom-control-input" id="cuasifalla" value="1" {{ old('cuasifalla') == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="cuasifalla">Cuasi - Falla</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="adverso" value="0"> <!-- Valor por defecto cuando no está marcado -->
                                <input name="adverso" type="checkbox" class="custom-control-input" id="adverso" value="1" {{ old('adverso') == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="adverso">Evento Adverso</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="centinela" value="0"> <!-- Valor por defecto cuando no está marcado -->
                                <input name="centinela" type="checkbox" class="custom-control-input" id="centinela" value="1" {{ old('centinela') == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="centinela">Evento Centinela</label>
                            </div>
                        </div>
                    </div>               

                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <button type="submit" class="btn btn-info">Registrar datos</button>
            
        </div>
    </div>

</form>

    <!-- -------------------------------------------------------------- -->

    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop