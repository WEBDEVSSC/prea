@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Gestión de Usuarios')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Administración de Usuarios
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Gestión de cuentas, roles y permisos asignados en el sistema
            </p>
        </div>
        <div>
            <a href="{{ route('usuarioCreate') }}" class="btn btn-material-primary font-weight-bold px-3 py-2">
                <i class="fas fa-plus mr-1"></i> Nuevo Registro
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

    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-users-cog text-primary mr-2"></i>Lista de Usuarios Registrados
            </h5>
        </div>

        <div class="card-body p-4">
            @if($usuarios->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-user-slash text-muted fa-3x mb-3"></i>
                    <p class="text-muted font-weight-bold mb-0">No hay registros de usuarios disponibles.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Nivel</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>CLUES</th>
                                <th>Rol</th>
                                <th class="text-center">C-F</th>
                                <th class="text-center">ADV</th>
                                <th class="text-center">CEN</th>
                                <th class="text-center">REP MEN</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>
                                        @if($usuario->nivel == 1)
                                            <span class="badge badge-pill badge-success-light text-success font-weight-bold px-2 py-1">ADMINISTRADOR</span>
                                        @elseif($usuario->nivel == 2)
                                            <span class="badge badge-pill badge-warning-light text-warning font-weight-bold px-2 py-1">JURISDICCIÓN</span>
                                        @elseif($usuario->nivel == 3)
                                            <span class="badge badge-pill badge-info-light text-info font-weight-bold px-2 py-1">UNIDAD</span>
                                        @endif
                                    </td>
                                    <td class="font-weight-bold text-dark">{{ $usuario->name }}</td>
                                    <td class="text-muted">{{ $usuario->email }}</td>
                                    <td>
                                        <span class="small font-weight-bold text-secondary">J.{{ $usuario->clues_jurisdiccion }}</span> - {{ $usuario->clues_nombre }}
                                    </td>
                                    <td><span class="badge badge-light border">{{ $usuario->role }}</span></td>
                                    
                                    <td class="text-center">
                                        @if ($usuario->cuasifalla == 1)
                                            <span class="status-badge bg-success-light text-success" title="Habilitado"><i class="fas fa-check-circle"></i></span>
                                        @else
                                            <span class="status-badge bg-danger-light text-danger" title="Deshabilitado"><i class="fas fa-times-circle"></i></span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($usuario->adverso == 1)
                                            <span class="status-badge bg-success-light text-success" title="Habilitado"><i class="fas fa-check-circle"></i></span>
                                        @else
                                            <span class="status-badge bg-danger-light text-danger" title="Deshabilitado"><i class="fas fa-times-circle"></i></span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($usuario->centinela == 1)
                                            <span class="status-badge bg-success-light text-success" title="Habilitado"><i class="fas fa-check-circle"></i></span>
                                        @else
                                            <span class="status-badge bg-danger-light text-danger" title="Deshabilitado"><i class="fas fa-times-circle"></i></span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($usuario->reporte_semanal == 1)
                                            <span class="status-badge bg-success-light text-success" title="Habilitado"><i class="fas fa-check-circle"></i></span>
                                        @else
                                            <span class="status-badge bg-danger-light text-danger" title="Deshabilitado"><i class="fas fa-times-circle"></i></span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('usuarioShow',['id'=>$usuario->id]) }}" class="btn btn-outline-primary btn-sm px-3 font-weight-bold">
                                            <i class="fas fa-eye mr-1"></i> Detalles
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
        }

        /* Estilos generales de tabla */
        .custom-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .custom-table thead th {
            border-top: none;
            border-bottom: 2px solid #e9ecef;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #6c757d;
            font-weight: 700;
            padding: 12px 16px;
        }

        .custom-table tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            border-top: 1px solid #f1f3f5;
        }

        /* Badges suaves para niveles y permisos */
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
            font-size: 0.9rem;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de gestión de usuarios cargada correctamente.");
    </script>
@stop