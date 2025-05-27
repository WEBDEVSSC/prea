@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1><strong>Usuarios</strong> <small>Editar registro</small></h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info btn-sm float-right" href="{{ route('usuarioShow', $user->id) }}">DETALLES</a>
        </div>
    </div>
    
    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title">
                
            </h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    
                <form action="{{ route('usuariosUpdate', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-3">
                            <p><strong>Nombre</strong></p>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $user->name) }}">
                            @error('nombre')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p><strong>Email</strong></p>
                            <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo', $user->email) }}">
                            @error('correo')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p><strong>Contraseña</strong></p>
                            <input type="password" name="password" id="password" class="form-control" >
                            @error('password')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p><strong>*</strong></p>
                            <input type="password" placeholder="Repite la contraseña" id="rPassword" name="rPassword" class="form-control">
                            @error('rPassword')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <p><strong>Chat Id</strong></p>
                            <input type="text" name="chat_id" id="chat_id" class="form-control" value="{{ old('chat_id', $user->chat_id) }}">
                            @error('chat_id')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p><strong>Categoría</strong></p>
                            <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria', $user->categoria) }}">
                            @error('categoria')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p><strong>Nivel</strong></p>
                            <select name="nivel" id="nivel" class="form-control">
                                <option value="">[ Seleccione una opción ]</option>
                                <option value="1" {{ old('nivel', $user->nivel) == '1' ? 'selected' : '' }}>Administrador SSC</option>
                                <option value="2" {{ old('nivel', $user->nivel) == '2' ? 'selected' : '' }}>Jurisdicción</option>
                                <option value="3" {{ old('nivel', $user->nivel) == '3' ? 'selected' : '' }}>Unidad</option>
                            </select>
                            @error('nivel')
                                <br>
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p><strong>CLUES</strong></p>
                            <select name="clues" class="form-control">
                                @foreach ($clues as $clue)
                                    <option value="{{ $clue->id }}" {{ old('clues', $user->clues_id) == $clue->id ? 'selected' : '' }}>
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
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="cuasifalla" value="0">
                                
                                <!-- Checkbox -->
                                <input name="cuasifalla" type="checkbox" class="custom-control-input" id="cuasifalla" value="1" {{ old('cuasifalla', $user->cuasifalla) == 1 ? 'checked' : '' }}>                                
                                <label class="custom-control-label" for="cuasifalla">Cuasi - Falla</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="adverso" value="0">

                                <!-- Checkbox -->
                                <input name="adverso" type="checkbox" class="custom-control-input" id="adverso" value="1" {{ old('adverso', $user->adverso) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="adverso">Evento Adverso</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="centinela" value="0"> <!-- Valor por defecto cuando no está marcado -->
                                <input name="centinela" type="checkbox" class="custom-control-input" id="centinela" value="1" {{ old('centinela', $user->centinela) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="centinela">Evento Centinela</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="reporte_semanal" value="0"> <!-- Valor por defecto cuando no está marcado -->
                                <input name="reporte_semanal" type="checkbox" class="custom-control-input" id="reporte_semanal" value="1" {{ old('reporte_semanal', $user->reporte_semanal) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="reporte_semanal">Reporte Mensual</label>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="row mt-3">
                        <p>Seleccione las notificaciones que recibira por Bot de Telegram</p>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="bot_cuasifalla" value="0">
                                
                                <!-- Checkbox -->
                                <input name="bot_cuasifalla" type="checkbox" class="custom-control-input" id="bot_cuasifalla" value="1" {{ old('bot_cuasifalla', $user->bot_cuasifalla) == 1 ? 'checked' : '' }}>                                
                                <label class="custom-control-label" for="bot_cuasifalla">Cuasi - Falla</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="bot_adverso" value="0">

                                <!-- Checkbox -->
                                <input name="bot_adverso" type="checkbox" class="custom-control-input" id="bot_adverso" value="1" {{ old('bot_adverso', $user->bot_adverso) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bot_adverso">Evento Adverso</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="bot_centinela" value="0"> 

                                <input name="bot_centinela" type="checkbox" class="custom-control-input" id="bot_centinela" value="1" {{ old('bot_centinela', $user->bot_centinela) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bot_centinela">Evento Centinela</label>
                            </div>
                        </div>

                    </div>  

                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <button type="submit" class="btn btn-info btn-sm float-right">ACTUALIZAR REGISTRO</button>
            
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