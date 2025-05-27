@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Usuarios')

@section('content_header')
    <h1><strong>Usuarios</strong> <small>Detalles</small></h1>
@stop

@section('content')

<!-- --------------------------------------------------------------------------------- -->

@if(session('success') || session('update') || session('destroy'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Éxito',
            text: "{{ session('success') ?? session('update') ?? session('destroy') }}",
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    });
</script>
@endif

<!-- --------------------------------------------------------------------------------- -->

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info btn-sm float-right" href="{{ route('usuarioIndex') }}">PANEL DE CONTROL</a>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title"></h3>
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
                            {{ $user->name }}
                        </div>
                        <div class="col-md-3">
                            <p><strong>Email</strong></p>
                            {{ $user->email }}
                        </div>
                        <div class="col-md-3">
                            <p><strong>Contraseña</strong></p>
                            <p><small>Por motivos de seguridad la contraseña no se muestra</small></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Chat ID</strong></p>
                            {{ $user->chat_id }}
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p><strong>Categoría</strong></p>
                            {{ $user->categoria }}
                        </div>
                        <div class="col-md-3">
                            <p><strong>Nivel</strong></p>

                            @if($user->nivel == 1)
                            <span class="badge badge-success">ADMINISTRADOR</span>
                            @elseif($user->nivel == 2)
                            <span class="badge badge-warning">JURISDICCIÓN</span>
                            @elseif($user->nivel == 3)
                            <span class="badge badge-info">UNIDAD</span>
                            @endif

                        </div>
                        <div class="col-md-3">
                            <p><strong>CLUES</strong></p>
                            J.{{ $user->clues_jurisdiccion }} - {{ $user->clues }} - {{ $user->clues_nombre }}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <p><strong>Notificaciones activas</strong></p>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="cuasifalla" value="0">
                                
                                <!-- Checkbox -->
                                <input name="cuasifalla" type="checkbox" class="custom-control-input" id="cuasifalla" value="1" 
                                       {{ old('cuasifalla', $user->cuasifalla) == 1 ? 'checked' : '' }}>                                
                                <label class="custom-control-label" for="cuasifalla">Cuasi - Falla</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="adverso" value="0">
                                
                                <!-- Checkbox -->
                                <input name="adverso" type="checkbox" class="custom-control-input" id="adverso" value="1" 
                                       {{ old('adverso', $user->adverso) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="adverso">Evento Adverso</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="centinela" value="0">
                                
                                <!-- Checkbox -->
                                <input name="centinela" type="checkbox" class="custom-control-input" id="centinela" value="1" 
                                       {{ old('centinela', $user->centinela) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="centinela">Evento Centinela</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="reporte_semanal" value="0">
                                
                                <!-- Checkbox -->
                                <input name="reporte_semanal" type="checkbox" class="custom-control-input" id="reporte_semanal" value="1" 
                                       {{ old('reporte_semanal', $user->reporte_semanal) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="reporte_semanal">Reporte Mensual</label>
                            </div>
                        </div>
                    </div>         
                    
                    <!-- ---------------------------------------------- -->

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="bot_cuasifalla" value="0">
                                
                                <!-- Checkbox -->
                                <input name="bot_cuasifalla" type="checkbox" class="custom-control-input" id="bot_cuasifalla" value="1" 
                                       {{ old('bot_cuasifalla', $user->bot_cuasifalla) == 1 ? 'checked' : '' }}>                                
                                <label class="custom-control-label" for="bot_cuasifalla">Bot Cuasi-Falla</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="bot_adverso" value="0">
                                
                                <!-- Checkbox -->
                                <input name="bot_adverso" type="checkbox" class="custom-control-input" id="bot_adverso" value="1" 
                                       {{ old('bot_adverso', $user->bot_adverso) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bot_adverso">Bot Evento Adverso</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <!-- Valor por defecto cuando no está marcado -->
                                <input type="hidden" name="bot_centinela" value="0">
                                
                                <!-- Checkbox -->
                                <input name="bot_centinela" type="checkbox" class="custom-control-input" id="bot_centinela" value="1" 
                                       {{ old('bot_centinela', $user->bot_centinela) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bot_centinela">Bot Evento Centinela</label>
                            </div>
                        </div>
                        
                    </div>  

                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <a href="{{ route('usuarioShow',['id'=>$user->id]) }}" class="btn btn-info btn-sm float-right">ELIMINAR</a>
            <a href="{{ route('usuarioEdit',['id'=>$user->id]) }}" class="btn btn-info btn-sm float-right mr-2">EDITAR</a>
            
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