@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Editar Usuario
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Modifique la información de la cuenta, credenciales o permisos de notificación
            </p>
        </div>
        <div>
            <a href="{{ route('usuarioShow', $user->id) }}" class="btn btn-material-outline font-weight-bold px-3 py-2">
                <i class="fas fa-eye mr-1"></i> Ver Detalles
            </a>
        </div>
    </div>
@stop

@section('content')

    <form action="{{ route('usuariosUpdate', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Datos Principales de la Cuenta -->
        <div class="card card-material mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h5 class="card-title font-weight-bold text-dark m-0">
                    <i class="fas fa-user-edit text-primary mr-2"></i>Información Personal y Credenciales
                </h5>
            </div>

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="nombre" class="form-label font-weight-bold text-secondary">Nombre Completo</label>
                        <input type="text" name="nombre" id="nombre" 
                               class="form-control form-control-material @error('nombre') is-invalid @enderror" 
                               value="{{ old('nombre', $user->name) }}">
                        @error('nombre')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="correo" class="form-label font-weight-bold text-secondary">Correo Electrónico</label>
                        <input type="email" name="correo" id="correo" 
                               class="form-control form-control-material @error('correo') is-invalid @enderror" 
                               value="{{ old('correo', $user->email) }}">
                        @error('correo')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="password" class="form-label font-weight-bold text-secondary">Contraseña</label>
                        <input type="password" name="password" id="password" 
                               class="form-control form-control-material @error('password') is-invalid @enderror" 
                               placeholder="Dejar en blanco para mantener">
                        @error('password')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="rPassword" class="form-label font-weight-bold text-secondary">Confirmar Contraseña</label>
                        <input type="password" name="rPassword" id="rPassword" 
                               class="form-control form-control-material @error('rPassword') is-invalid @enderror" 
                               placeholder="Repite la contraseña">
                        @error('rPassword')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3 mb-3">
                        <label for="categoria" class="form-label font-weight-bold text-secondary">Categoría</label>
                        <input type="text" name="categoria" id="categoria" 
                               class="form-control form-control-material @error('categoria') is-invalid @enderror" 
                               value="{{ old('categoria', $user->categoria) }}">
                        @error('categoria')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nivel" class="form-label font-weight-bold text-secondary">Nivel de Acceso</label>
                        <select name="nivel" id="nivel" class="form-control form-control-material @error('nivel') is-invalid @enderror">
                            <option value="">[ Seleccione una opción ]</option>
                            <option value="1" {{ old('nivel', $user->nivel) == '1' ? 'selected' : '' }}>Administrador SSC</option>
                            <option value="2" {{ old('nivel', $user->nivel) == '2' ? 'selected' : '' }}>Jurisdicción</option>
                            <option value="3" {{ old('nivel', $user->nivel) == '3' ? 'selected' : '' }}>Unidad</option>
                            <option value="4" {{ old('nivel', $user->nivel) == '4' ? 'selected' : '' }}>Visualizador</option>
                        </select>
                        @error('nivel')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="clues" class="form-label font-weight-bold text-secondary">Unidad Adscrita (CLUES)</label>
                        <select name="clues" id="clues" class="form-control form-control-material @error('clues') is-invalid @enderror">
                            @foreach ($clues as $clue)
                                <option value="{{ $clue->id }}" {{ old('clues', $user->clues_id) == $clue->id ? 'selected' : '' }}>
                                    {{ $clue->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('clues')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Notificaciones y Alertas por Correo -->
        <div class="card card-material mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h5 class="card-title font-weight-bold text-dark m-0">
                    <i class="fas fa-bell text-primary mr-2"></i>Suscripción a Notificaciones
                </h5>
                <p class="text-muted small mb-0 mt-1">Seleccione los eventos sobre los cuales este usuario recibirá alertas vía correo electrónico</p>
            </div>

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="p-3 border rounded bg-light">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="cuasifalla" value="0">
                                <input name="cuasifalla" type="checkbox" class="custom-control-input" id="cuasifalla" value="1" 
                                       {{ old('cuasifalla', $user->cuasifalla) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold text-dark cursor-pointer" for="cuasifalla">
                                    Cuasi - Falla
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="p-3 border rounded bg-light">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="adverso" value="0">
                                <input name="adverso" type="checkbox" class="custom-control-input" id="adverso" value="1" 
                                       {{ old('adverso', $user->adverso) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold text-dark cursor-pointer" for="adverso">
                                    Evento Adverso
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="p-3 border rounded bg-light">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="centinela" value="0">
                                <input name="centinela" type="checkbox" class="custom-control-input" id="centinela" value="1" 
                                       {{ old('centinela', $user->centinela) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold text-dark cursor-pointer" for="centinela">
                                    Evento Centinela
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="p-3 border rounded bg-light">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="reporte_semanal" value="0">
                                <input name="reporte_semanal" type="checkbox" class="custom-control-input" id="reporte_semanal" value="1" 
                                       {{ old('reporte_semanal', $user->reporte_semanal) == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold text-dark cursor-pointer" for="reporte_semanal">
                                    Reporte Mensual
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light border-0 p-4 d-flex justify-content-end align-items-center">
                <a href="{{ route('usuarioShow', $user->id) }}" class="btn btn-material-outline font-weight-bold px-4 py-2 mr-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-material-primary font-weight-bold px-4 py-2">
                    <i class="fas fa-save mr-1"></i> Guardar Cambios
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

        .form-control-material {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 0.6rem 0.75rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control-material:focus {
            border-color: #1976d2;
            box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.15);
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

        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de edición de usuario cargada correctamente.");
    </script>
@stop