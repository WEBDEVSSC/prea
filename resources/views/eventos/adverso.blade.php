@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos - Adverso')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Eventos
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Listado y Gestión de Eventos <span class="badge bg-warning-light text-warning-dark font-weight-bold">Adversos</span>
            </p>
        </div>
    </div>
@stop

@section('content')

    @if(session('success') || session('update') || session('destroy'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Operación Exitosa!',
                    text: "{{ session('success') ?? session('update') ?? session('destroy') }}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#f57f17'
                });
            });
        </script>
    @endif

    <div class="card card-material mb-4">
        <div class="card-body p-0">
            @if($eventos->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-folder-open text-muted mb-3" style="font-size: 3rem;"></i>
                    <h5 class="text-muted font-weight-normal">No hay eventos adversos registrados.</h5>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 custom-material-table">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 70px;">ID</th>
                                <th>Clasificación</th>
                                <th>Folio</th>
                                <th>Unidad</th>
                                <th>Categoría / Descripción</th>
                                <th>Fecha Registro</th>
                                <th class="text-center" style="width: 160px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventos as $evento)
                                <tr>
                                    <td class="text-center font-weight-bold text-secondary">{{ $evento->id }}</td>
                                    <td>
                                        @if($evento->clasificacion_del_evento == 'CUASI-FALLA')
                                            <span class="badge badge-material bg-success-light text-success">
                                                <i class="fas fa-exclamation-triangle mr-1"></i> {{ $evento->clasificacion_del_evento }}
                                            </span>
                                        @elseif($evento->clasificacion_del_evento == 'EVENTO ADVERSO')
                                            <span class="badge badge-material bg-warning-light text-warning-dark">
                                                <i class="fas fa-notes-medical mr-1"></i> {{ $evento->clasificacion_del_evento }}
                                            </span>
                                        @elseif($evento->clasificacion_del_evento == 'EVENTO CENTINELA')
                                            <span class="badge badge-material bg-danger-light text-danger">
                                                <i class="fas fa-biohazard mr-1"></i> {{ $evento->clasificacion_del_evento }}
                                            </span>
                                        @else
                                            <span class="badge badge-material bg-secondary-light text-secondary">
                                                {{ $evento->clasificacion_del_evento }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="font-weight-bold text-dark">{{ $evento->folio }}</span>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 200px;" title="{{ $evento->unidad }} - {{ $evento->unidad_nombre }}">
                                            <strong>{{ $evento->unidad }}</strong> <br>
                                            <small class="text-muted">{{ $evento->unidad_nombre }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="font-weight-bold text-dark">{{ $evento->incidente_categoria_label }}</span><br>
                                            <small class="text-muted">{{ $evento->incidente_descripcion_label }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($evento->created_at)->format('d/m/Y') }}<br>
                                            <i class="far fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($evento->created_at)->format('H:i') }} hrs
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group-vertical btn-block">
                                            <a href="{{ route('eventoShow',['id'=>$evento->id]) }}" class="btn btn-material-info btn-sm mb-1">
                                                <i class="fas fa-eye mr-1"></i> Detalles
                                            </a>
                                            <a href="{{ route('eventoPDF',['id'=>$evento->id]) }}" class="btn btn-material-warning btn-sm mb-1" target="_blank">
                                                <i class="fas fa-file-pdf mr-1"></i> Reporte PDF
                                            </a>
                                            @auth
                                                @if (auth()->user()->role === 'admin')
                                                    <form action="{{ route('eventoDestroy', $evento->id) }}" method="POST" class="form-eliminar d-inline w-100">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-material-danger btn-sm btn-block">
                                                            <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
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
        /* Tipografía e integración global */
        body, .content-wrapper {
            font-family: 'Roboto', sans-serif !important;
            background-color: #e9ecef !important;
        }

        /* Contenedor Principal estilo Material */
        .card-material {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
            background-color: #ffffff !important;
            overflow: hidden;
        }

        /* Tabla Estilizada Material */
        .custom-material-table {
            border-collapse: separate !important;
            border-spacing: 0;
        }

        .custom-material-table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            color: #495057;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 16px;
        }

        .custom-material-table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f5;
            font-size: 0.9rem;
        }

        .custom-material-table tbody tr:last-child td {
            border-bottom: none;
        }

        .custom-material-table tbody tr:hover {
            background-color: rgba(245, 127, 23, 0.02);
        }

        /* Badges Personalizados */
        .badge-material {
            padding: 6px 12px;
            font-weight: 600;
            font-size: 0.75rem;
            border-radius: 6px;
            letter-spacing: 0.3px;
        }

        .bg-success-light { background-color: #e8f5e9; }
        .bg-warning-light { background-color: #fff8e1; }
        .bg-danger-light { background-color: #ffebee; }
        .bg-secondary-light { background-color: #f1f3f5; }

        .text-warning-dark { color: #f57f17 !important; }

        /* Botones Acción Material */
        .btn-material-info {
            background-color: #e3f2fd;
            color: #1976d2;
            border: none;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .btn-material-info:hover {
            background-color: #2196f3;
            color: #ffffff;
        }

        .btn-material-warning {
            background-color: #fff3e0;
            color: #e65100;
            border: none;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .btn-material-warning:hover {
            background-color: #ff9800;
            color: #ffffff;
        }

        .btn-material-danger {
            background-color: #ffebee;
            color: #c62828;
            border: none;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .btn-material-danger:hover {
            background-color: #f44336;
            color: #ffffff;
        }
    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-eliminar');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Confirmar eliminación?',
                        text: "Esta acción no se puede deshacer.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#f44336',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
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