@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Detalles de la Unidad')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Detalles de la Unidad
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Consulte la información registrada para esta unidad médica
            </p>
        </div>
        <div>
            <a href="{{ route('unidadIndex') }}" class="btn btn-material-outline font-weight-bold px-3 py-2">
                <i class="fas fa-arrow-left mr-1"></i> Volver a la lista
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
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-hospital text-primary mr-2"></i>Información General de la Unidad
            </h5>
        </div>

        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label font-weight-bold text-secondary d-block">CLUES</label>
                    <span class="badge badge-pill badge-light border px-3 py-2 text-dark font-weight-bold style-badge">
                        {{ $unidad->clues }}
                    </span>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label font-weight-bold text-secondary d-block">Jurisdicción</label>
                    <div class="p-2 rounded bg-light border text-dark font-weight-medium">
                        Jurisdicción {{ $unidad->jurisdiccion }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold text-secondary d-block">Nombre de la Unidad</label>
                    <div class="p-2 rounded bg-light border text-dark font-weight-bold">
                        {{ $unidad->nombre }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light border-0 p-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('unidadEdit', ['id' => $unidad->id]) }}" class="btn btn-material-primary font-weight-bold px-4 py-2 mr-2">
                <i class="fas fa-edit mr-1"></i> Editar
            </a>

            <a href="#" class="btn btn-material-danger font-weight-bold px-4 py-2 btn-delete-unidad" data-id="{{ $unidad->id }}">
                <i class="fas fa-trash-alt mr-1"></i> Eliminar
            </a>

            <form id="delete-form-{{ $unidad->id }}"
                  action="{{ route('unidadDestroy', ['id' => $unidad->id]) }}"
                  method="POST"
                  style="display:none;">
                @csrf
                @method('DELETE')
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

        .style-badge {
            font-size: 0.95rem;
            letter-spacing: 0.5px;
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
    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-delete-unidad').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();

                    let id = this.getAttribute('data-id');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción no eliminará el registro definitivamente de forma inmediata',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d32f2f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                });
            });
        });
    </script>
@stop