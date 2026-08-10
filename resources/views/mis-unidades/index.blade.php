@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Mis Unidades')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Mis Unidades
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Panel de control y gestión de unidades asignadas
            </p>
        </div>
    </div>
@stop

@section('content')

    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex align-items-center justify-content-between">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-hospital-alt text-primary mr-2"></i>Listado de Unidades
            </h5>
            @if(!$unidades->isEmpty())
                <span class="badge badge-material bg-primary-light text-primary">
                    Total: {{ $unidades->count() }}
                </span>
            @endif
        </div>

        <div class="card-body p-4">
            @if($unidades->isEmpty())
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-hospital-symbol text-muted opacity-50" style="font-size: 3.5rem;"></i>
                    </div>
                    <h5 class="text-dark font-weight-bold">No hay unidades asignadas</h5>
                    <p class="text-muted small">Actualmente no cuentas con unidades registradas en tu panel.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle custom-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 45%;">Nombre de la Unidad</th>
                                <th style="width: 25%;">CLUES</th>
                                <th style="width: 30%;">Jurisdicción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unidades as $unidad)
                                <tr>
                                    <td class="font-weight-bold text-dark">
                                        <i class="fas fa-building text-muted mr-2"></i>{{ $unidad->nombre }}
                                    </td>
                                    <td>
                                        <span class="badge badge-material bg-light text-dark font-mono border">
                                            {{ $unidad->clues }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-material bg-info-light text-info-dark">
                                            <i class="fas fa-map-marker-alt mr-1"></i> Jurisdicción {{ $unidad->jurisdiccion }}
                                        </span>
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
            padding: 14px 16px;
            vertical-align: middle;
            border-top: 1px solid #f1f3f5;
        }

        .badge-material {
            padding: 6px 12px;
            font-weight: 600;
            font-size: 0.75rem;
            border-radius: 6px;
            letter-spacing: 0.3px;
        }

        .bg-primary-light { background-color: #e3f2fd; }
        .bg-info-light { background-color: #e0f7fa; }
        .text-info-dark { color: #00838f !important; }

        .font-mono {
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de unidades cargada con estilo actualizado.");
    </script>
@stop