@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Detalles del Usuario')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Detalles del Usuario
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Consulta la información de la cuenta y los permisos de notificación asignados
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

    @if(session('success') || session('update') || session('destroy'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('success') ?? session('update') ?? session('destroy') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#1976d2'
                });
            });
        </script>
    @endif

    <!-- Datos del Perfil -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-id-card text-primary mr-2"></i>Información del Perfil
            </h5>
        </div>

        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <span class="text-muted small font-weight-bold d-block text-uppercase">Nombre Completo</span>
                    <span class="text-dark font-weight-bold fs-6">{{ $user->name }}</span>
                </div>

                <div class="col-md-3 mb-3">
                    <span class="text-muted small font-weight-bold d-block text-uppercase">Correo Electrónico</span>
                    <span class="text-dark font-weight-bold fs-6">{{ $user->email }}</span>
                </div>

                <div class="col-md-3 mb-3">
                    <span class="text-muted small font-weight-bold d-block text-uppercase">Contraseña</span>
                    <span class="text-muted small font-italic">
                        <i class="fas fa-lock mr-1"></i>Oculta por motivos de seguridad
                    </span>
                </div>

                <div class="col-md-3 mb-3">
                    <span class="text-muted small font-weight-bold d-block text-uppercase">Categoría</span>
                    <span class="text-dark font-weight-bold fs-6">{{ $user->categoria ?? 'Sin especificar' }}</span>
                </div>
            </div>

            <hr class="my-3 border-light">

            <div class="row">
                <div class="col-md-3 mb-3">
                    <span class="text-muted small font-weight-bold d-block text-uppercase mb-1">Nivel de Acceso</span>
                    @if($user->nivel == 1)
                        <span class="badge badge-pill badge-success-light text-success font-weight-bold px-3 py-2">ADMINISTRADOR</span>
                    @elseif($user->nivel == 2)
                        <span class="badge badge-pill badge-warning-light text-warning font-weight-bold px-3 py-2">JURISDICCIÓN</span>
                    @elseif($user->nivel == 3)
                        <span class="badge badge-pill badge-info-light text-info font-weight-bold px-3 py-2">UNIDAD</span>
                    @endif
                </div>

                <div class="col-md-9 mb-3">
                    <span class="text-muted small font-weight-bold d-block text-uppercase">Unidad Adscrita (CLUES)</span>
                    <span class="text-dark font-weight-bold fs-6">
                        J.{{ $user->clues_jurisdiccion }} - {{ $user->clues }} - {{ $user->clues_nombre }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Notificaciones Habilitadas -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-bell text-primary mr-2"></i>Notificaciones Activas
            </h5>
            <p class="text-muted small mb-0 mt-1">Configuración actual de alertas enviadas por correo electrónico a esta cuenta</p>
        </div>

        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="p-3 border rounded d-flex align-items-center justify-content-between bg-light">
                        <span class="font-weight-bold text-dark">Cuasi - Falla</span>
                        @if($user->cuasifalla == 1)
                            <span class="status-badge bg-success-light text-success" title="Activo"><i class="fas fa-check"></i></span>
                        @else
                            <span class="status-badge bg-danger-light text-danger" title="Inactivo"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="p-3 border rounded d-flex align-items-center justify-content-between bg-light">
                        <span class="font-weight-bold text-dark">Evento Adverso</span>
                        @if($user->adverso == 1)
                            <span class="status-badge bg-success-light text-success" title="Activo"><i class="fas fa-check"></i></span>
                        @else
                            <span class="status-badge bg-danger-light text-danger" title="Inactivo"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="p-3 border rounded d-flex align-items-center justify-content-between bg-light">
                        <span class="font-weight-bold text-dark">Evento Centinela</span>
                        @if($user->centinela == 1)
                            <span class="status-badge bg-success-light text-success" title="Activo"><i class="fas fa-check"></i></span>
                        @else
                            <span class="status-badge bg-danger-light text-danger" title="Inactivo"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="p-3 border rounded d-flex align-items-center justify-content-between bg-light">
                        <span class="font-weight-bold text-dark">Reporte Mensual</span>
                        @if($user->reporte_semanal == 1)
                            <span class="status-badge bg-success-light text-success" title="Activo"><i class="fas fa-check"></i></span>
                        @else
                            <span class="status-badge bg-danger-light text-danger" title="Inactivo"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light border-0 p-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('usuarioEdit', ['id' => $user->id]) }}" class="btn btn-material-primary font-weight-bold px-4 py-2 mr-2">
                <i class="fas fa-edit mr-1"></i> Editar
            </a>

            <form action="{{ route('usuarioDelete', ['id' => $user->id]) }}" method="POST" class="d-inline form-eliminar">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-material-danger font-weight-bold px-4 py-2">
                    <i class="fas fa-trash-alt mr-1"></i> Eliminar
                </button>
            </form>
        </div>
    </div>

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

        .btn-material-danger {
            background-color: #d32f2f;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-material-danger:hover {
            background-color: #c62828;
            color: #ffffff;
            box-shadow: 0 2px 6px rgba(211, 47, 47, 0.4);
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

        /* Badges de nivel y estados */
        .badge-success-light { background-color: #e8f5e9; color: #2e7d32 !important; }
        .badge-warning-light { background-color: #fff8e1; color: #f57f17 !important; }
        .badge-info-light { background-color: #e0f7fa; color: #00838f !important; }
        .bg-danger-light { background-color: #ffebee; color: #c62828 !important; }

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            font-size: 0.85rem;
        }
    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.form-eliminar').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'El usuario será eliminado permanentemente.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d32f2f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@stop