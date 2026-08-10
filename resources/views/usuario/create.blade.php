@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Registro de Usuarios
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Crea un nuevo perfil de acceso asignando permisos y datos institucionales
            </p>
        </div>
        <div>
            <a href="{{ route('usuarioIndex') }}" class="btn btn-material-outline font-weight-bold px-3 py-2">
                <i class="fas fa-arrow-left mr-1"></i> Volver al Listado
            </a>
        </div>
    </div>
@stop

@section('content')

    <form action="{{ route('usuarioStore') }}" method="POST">
        @csrf

        <!-- Información del Usuario -->
        <div class="card card-material mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h5 class="card-title font-weight-bold text-dark m-0">
                    <i class="fas fa-user-plus text-primary mr-2"></i>Información General de la Cuenta
                </h5>
            </div>

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="nombre" class="form-label font-weight-bold text-secondary small">Nombre Completo</label>
                        <input type="text" name="nombre" id="nombre" class="form-control material-input @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej. Juan Pérez">
                        @error('nombre')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="correo" class="form-label font-weight-bold text-secondary small">Correo Electrónico</label>
                        <input type="email" name="correo" id="correo" class="form-control material-input @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="correo@ejemplo.com">
                        @error('correo')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="password" class="form-label font-weight-bold text-secondary small">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control material-input @error('password') is-invalid @enderror" placeholder="••••••••">
                        @error('password')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="rPassword" class="form-label font-weight-bold text-secondary small">Confirmar Contraseña</label>
                        <input type="password" name="rPassword" id="rPassword" class="form-control material-input @error('rPassword') is-invalid @enderror" placeholder="••••••••">
                        @error('rPassword')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 mb-3">
                        <label for="categoria" class="form-label font-weight-bold text-secondary small">Categoría</label>
                        <input type="text" name="categoria" id="categoria" class="form-control material-input @error('categoria') is-invalid @enderror" value="{{ old('categoria') }}" placeholder="Ej. Médico Especialista">
                        @error('categoria')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nivel" class="form-label font-weight-bold text-secondary small">Nivel de Acceso</label>
                        <select name="nivel" id="nivel" class="form-control material-input @error('nivel') is-invalid @enderror">
                            <option value="" disabled {{ old('nivel') == null ? 'selected' : '' }}>-- Seleccione --</option>
                            <option value="1" {{ old('nivel') == '1' ? 'selected' : '' }}>Administrador SSC</option>
                            <option value="2" {{ old('nivel') == '2' ? 'selected' : '' }}>Jurisdicción</option>
                            <option value="3" {{ old('nivel') == '3' ? 'selected' : '' }}>Unidad</option>
                        </select>
                        @error('nivel')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="clues" class="form-label font-weight-bold text-secondary small">Unidad Adscrita (CLUES)</label>
                        <select name="clues" id="clues" class="form-control material-input @error('clues') is-invalid @enderror">
                            <option value="" disabled {{ old('clues') == null ? 'selected' : '' }}>-- Seleccione una unidad --</option>
                            @foreach ($clues as $clue)
                                <option value="{{ $clue->id }}" {{ old('clues') == $clue->id ? 'selected' : '' }}>
                                    {{ $clue->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('clues')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Configuración de Notificaciones -->
        <div class="card card-material mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h5 class="card-title font-weight-bold text-dark m-0">
                    <i class="fas fa-bell text-primary mr-2"></i>Suscripción a Notificaciones
                </h5>
                <p class="text-muted small mb-0 mt-1">Seleccione los eventos sobre los cuales este usuario recibirá alertas por correo electrónico</p>
            </div>

            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3">
                        <div class="custom-control custom-switch custom-switch-md">
                            <input type="hidden" name="cuasifalla" value="0">
                            <input name="cuasifalla" type="checkbox" class="custom-control-input" id="cuasifalla" value="1" {{ old('cuasifalla') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold text-dark" for="cuasifalla">Cuasi - Falla</label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="custom-control custom-switch custom-switch-md">
                            <input type="hidden" name="adverso" value="0">
                            <input name="adverso" type="checkbox" class="custom-control-input" id="adverso" value="1" {{ old('adverso') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold text-dark" for="adverso">Evento Adverso</label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="custom-control custom-switch custom-switch-md">
                            <input type="hidden" name="centinela" value="0">
                            <input name="centinela" type="checkbox" class="custom-control-input" id="centinela" value="1" {{ old('centinela') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold text-dark" for="centinela">Evento Centinela</label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="custom-control custom-switch custom-switch-md">
                            <input type="hidden" name="reporte_semanal" value="0">
                            <input name="reporte_semanal" type="checkbox" class="custom-control-input" id="reporte_semanal" value="1" {{ old('reporte_semanal') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold text-dark" for="reporte_semanal">Reporte Mensual</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light border-0 p-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-material-primary font-weight-bold px-4 py-2">
                    <i class="fas fa-save mr-1"></i> Guardar Usuario
                </button>
            </div>
        </div>
    </form>

@stop

@include('layouts.footer')

@section('css')
    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body, .content-wrapper {
            font-family: 'Roboto', sans-serif !important;
            background-color: #e9ecef !important;
        }

        .card-material {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
            background-color: #ffffff !important;
            overflow: hidden;
        }

        .btn-material-primary {
            background-color: #1976d2;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-material-primary:hover {
            background-color: #1565c0;
            color: #ffffff;
            box-shadow: 0 2px 6px rgba(25, 118, 210, 0.4);
        }

        .btn-material-outline {
            background-color: transparent;
            color: #6c757d;
            border: 1px solid #ced4da;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-material-outline:hover {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .material-input {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 10px 12px;
            height: auto;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .material-input:focus {
            border-color: #1976d2;
            box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.15);
        }

        .custom-switch-md .custom-control-label::before {
            height: 1.25rem;
            width: 2.25rem;
            border-radius: 1rem;
        }

        .custom-switch-md .custom-control-label::after {
            width: calc(1.25rem - 4px);
            height: calc(1.25rem - 4px);
            border-radius: 50%;
        }

        .custom-switch-md .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(1rem);
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Formulario de creación de usuario cargado.");
    </script>
@stop