@extends('adminlte::page')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('title', 'Categorías')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Categorías
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Gestión e inventario de categorías registradas en el sistema
            </p>
        </div>
        <div>
            <a href="{{ route('categoriaCreate') }}" class="btn btn-material-primary font-weight-bold px-3 py-2">
                <i class="fas fa-plus mr-1"></i> Nueva Categoría
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
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1976d2'
                });
            });
        </script>
    @endif

    <div class="card card-material mb-4">
        <div class="card-body p-4">
            @if($categorias->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-tags text-muted mb-3" style="font-size: 3rem;"></i>
                    <h5 class="text-secondary font-weight-bold">No hay categorías disponibles</h5>
                    <p class="text-muted small">Comience registrando una nueva categoría en el sistema.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle w-100" id="table">
                        <thead>
                            <tr>
                                <th>Nombre de la Categoría</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $categoria->categoria }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('categoriaShow', ['id' => $categoria->id]) }}" class="btn btn-material-outline btn-sm font-weight-bold px-3">
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
            box-shadow: 0 2px 6px rgba(25, 118, 210, 0.4);
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

        /* DataTables Material Style Override */
        table.dataTable thead th {
            border-bottom: 2px solid #e0e0e0 !important;
            color: #5f6368;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px !important;
        }

        table.dataTable tbody td {
            padding: 14px 16px !important;
            border-top: 1px solid #f0f0f0 !important;
            vertical-align: middle !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #1976d2 !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 4px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 4px 8px;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sSearch":         "Buscar:",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }
            });
        });
    </script>
@stop