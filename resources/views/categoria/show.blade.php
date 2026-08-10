@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Detalles de la Categoría')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Categoría: {{ $categoria->categoria }}
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Detalles generales y opciones asociadas a esta categoría
            </p>
        </div>
        <div>
            <a href="{{ route('categoriaIndex') }}" class="btn btn-material-outline font-weight-bold px-3 py-2">
                <i class="fas fa-arrow-left mr-1"></i> Volver a la lista
            </a>
        </div>
    </div>
@stop

@section('content')

    @if(session('success') || session('update') || session('destroy') || session('successOpcion') || session('updateOpcion') || session('destroyOpcion'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('success') ?? session('update') ?? session('destroy') ?? session('successOpcion') ?? session('updateOpcion') ?? session('destroyOpcion') }}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1976d2'
                });
            });
        </script>
    @endif

    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-tag text-primary mr-2"></i>Información General
            </h5>
        </div>

        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label font-weight-bold text-secondary d-block">Nombre de la Categoría</label>
                    <div class="p-2 rounded bg-light border text-dark font-weight-bold">
                        {{ $categoria->categoria }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light border-0 p-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('categoriaEdit', ['id' => $categoria->id]) }}" class="btn btn-material-primary font-weight-bold px-4 py-2 mr-2 text-white">
                <i class="fas fa-edit mr-1"></i> Editar Categoría
            </a>

            <a href="javascript:void(0);" onclick="confirmarEliminacion({{ $categoria->id }})" class="btn btn-material-danger font-weight-bold px-4 py-2 text-white">
                <i class="fas fa-trash-alt mr-1"></i> Eliminar Categoría
            </a>
        </div>
    </div>

    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-list-ul text-primary mr-2"></i>Opciones de la Categoría
            </h5>
            <a href="{{ route('opcionCreate', $categoria->id) }}" class="btn btn-material-primary btn-sm font-weight-bold px-3 py-2">
                <i class="fas fa-plus mr-1"></i> Nueva Opción
            </a>
        </div>

        <div class="card-body p-4">
            @if($opciones->isEmpty())
                <div class="text-center py-4">
                    <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2.5rem;"></i>
                    <p class="text-muted mb-0">No hay opciones registradas para esta categoría.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 100px;">ID</th>
                                <th>Nombre de la Opción</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($opciones as $opcion)
                                <tr>
                                    <td class="text-muted font-weight-bold">#{{ $opcion->id }}</td>
                                    <td class="font-weight-medium text-dark">{{ $opcion->opcion }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('opcionEdit', ['id' => $opcion->id]) }}" class="btn btn-material-outline btn-sm font-weight-bold px-3 mr-1">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </a>
                                        <a href="javascript:void(0);" onclick="confirmarEliminacionOpcion({{ $opcion->id }})" class="btn btn-material-danger-outline btn-sm font-weight-bold px-3">
                                            <i class="fas fa-trash-alt mr-1"></i> Eliminar
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
            color: #1976d2;
            border: 1px solid #1976d2;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-material-outline:hover {
            background-color: #1976d2;
            color: #ffffff;
        }

        .btn-material-danger-outline {
            background-color: transparent;
            color: #d32f2f;
            border: 1px solid #d32f2f;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-material-danger-outline:hover {
            background-color: #d32f2f;
            color: #ffffff;
        }

        table thead th {
            border-bottom: 2px solid #e0e0e0 !important;
            color: #5f6368;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px !important;
        }

        table tbody td {
            padding: 12px 16px !important;
            border-top: 1px solid #f0f0f0 !important;
            vertical-align: middle !important;
        }
    </style>
@stop

@section('js')
    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se eliminará la categoría y esta acción no se podrá revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d32f2f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('categoriaDelete', ['id' => '__id__']) }}".replace('__id__', id);
                }
            });
        }

        function confirmarEliminacionOpcion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se eliminará la opción seleccionada",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d32f2f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('opcionDelete', ['id' => '__id__']) }}".replace('__id__', id);
                }
            });
        }
    </script>
@stop