@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Reportes')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Módulo de Reportes
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Generación de informes en Excel y estadísticas por rango de fechas
            </p>
        </div>
    </div>
@stop

@section('content')

    <!-- Tarjeta 1: Exportación Excel -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-file-excel text-success mr-2"></i>Exportar Reporte a Excel
            </h5>
        </div>

        <form action="{{ route('reporteExcel') }}" method="get">
            @csrf
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small text-uppercase font-weight-bold d-block mb-2">Fecha de inicio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="far fa-calendar-alt text-muted"></i></span>
                            </div>
                            <input type="date" name="inicio" class="form-control border-left-0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small text-uppercase font-weight-bold d-block mb-2">Fecha de fin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="far fa-calendar-alt text-muted"></i></span>
                            </div>
                            <input type="date" name="fin" class="form-control border-left-0" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 d-flex justify-content-end">
                <button type="submit" class="btn btn-success font-weight-bold px-4">
                    <i class="fas fa-download mr-1"></i> Generar Excel
                </button>
            </div>
        </form>
    </div>

    <!-- Tarjeta 2: Conteo de Eventos -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-chart-bar text-primary mr-2"></i>Conteo de Eventos por Unidad
            </h5>
        </div>

        <form action="{{ route('reporteSearch') }}" method="POST">
            @csrf
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small text-uppercase font-weight-bold d-block mb-2">Fecha de inicio de búsqueda</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="far fa-calendar-alt text-muted"></i></span>
                            </div>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control border-left-0 @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio') }}">
                        </div>
                        @error('fecha_inicio')
                            <span class="text-danger small mt-1 d-block">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="text-muted small text-uppercase font-weight-bold d-block mb-2">Fecha límite de búsqueda</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="far fa-calendar-alt text-muted"></i></span>
                            </div>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control border-left-0 @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin') }}">
                        </div>
                        @error('fecha_fin')
                            <span class="text-danger small mt-1 d-block">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 d-flex justify-content-end">
                <button type="submit" class="btn btn-material-primary font-weight-bold px-4">
                    <i class="fas fa-calculator mr-1"></i> Contar Eventos
                </button>
            </div>
        </form>
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

        .form-control {
            border-radius: 0 6px 6px 0 !important;
            border-color: #ced4da;
            padding: 0.6rem 0.75rem;
        }

        .form-control:focus {
            border-color: #1976d2;
            box-shadow: none;
        }

        .input-group-text {
            border-radius: 6px 0 0 6px !important;
            border-color: #ced4da;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de reportes cargada correctamente.");
    </script>
@stop