@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1><strong>Usuarios</strong> <small>Nuevo registro</small></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------- -->

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('usuarioIndex') }}" class="btn btn-info btn-sm float-right">PANEL DE CONTROL</a>
        </div>
    </div>

    <div class="card card-info  mt-3">

        <div class="card-header">
            
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
                                <option value="" disabled {{ old('nivel') == null ? 'selected' : '' }}>-- Selecciona una opción --</option>
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
                            <select name="clues" id="clues" class="form-control">
                                <option value="" disabled {{ old('clues') == null ? 'selected' : '' }}>-- Selecciona una opción --</option>
                                @foreach ($clues as $clue)
                                    <option value="{{ $clue->id }}" {{ old('clues') == $clue->id ? 'selected' : '' }}>
                                        {{ $clue->nombre }}
                                    </option>
                                @endforeach
                            </select>
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

            <button type="submit" class="btn btn-info btn-sm float-right">REGISTRAR DATOS</button>
            
        </div>
    </div>

</form>

    <!-- -------------------------------------------------------------- -->

    
@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop