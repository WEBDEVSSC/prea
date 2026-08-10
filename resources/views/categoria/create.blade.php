@extends('adminlte::page')

@section('title', 'Nueva Categoría')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Nueva Categoría
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Ingrese el nombre para registrar una nueva categoría en el sistema
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

    <form action="{{ route('categoriaStore') }}" method="POST">
        @csrf

        <div class="card card-material mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h5 class="card-title font-weight-bold text-dark m-0">
                    <i class="fas fa-tag text-primary mr-2"></i>Información de la Categoría
                </h5>
            </div>

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label font-weight-bold text-secondary">Nombre de la Categoría</label>
                        <input type="text" name="nombre" id="nombre" 
                               class="form-control form-control-material @error('nombre') is-invalid @enderror" 
                               value="{{ old('nombre') }}" 
                               placeholder="Ej. Material Curativo">
                        @error('nombre')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light border-0 p-4 d-flex justify-content-end align-items-center">
                <a href="{{ route('categoriaIndex') }}" class="btn btn-material-outline font-weight-bold px-4 py-2 mr-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-material-primary font-weight-bold px-4 py-2">
                    <i class="fas fa-save mr-1"></i> Registrar Datos
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
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de registro de categoría cargada correctamente.");
    </script>
@stop