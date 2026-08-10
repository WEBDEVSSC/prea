@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Detalle del Evento')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Detalle del Evento #{{ $evento?->id ?? 'N/A' }}
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Información general y registro completo
            </p>
        </div>
        @if($evento?->id)
            <a href="{{ route('eventoShow', ['id' => $evento->id]) }}" class="btn btn-material-secondary btn-sm">
                <i class="fas fa-arrow-left mr-1"></i> Volver a la Lista
            </a>
        @endif
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
                    confirmButtonColor: '#1976d2'
                });
            });
        </script>
    @endif

    <!-- Datos Generales -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-info-circle text-primary mr-2"></i>Datos Generales
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Clasificación del Evento</label>
                    <div>
                        @php
                            $clasificacion = $evento?->clasificacion_del_evento ?? 'Sin Clasificación';
                        @endphp

                        @if($clasificacion == 'CUASI-FALLA')
                            <span class="badge badge-material bg-success-light text-success">
                                <i class="fas fa-exclamation-triangle mr-1"></i> {{ $clasificacion }}
                            </span>
                        @elseif($clasificacion == 'EVENTO ADVERSO')
                            <span class="badge badge-material bg-warning-light text-warning-dark">
                                <i class="fas fa-notes-medical mr-1"></i> {{ $clasificacion }}
                            </span>
                        @elseif($clasificacion == 'EVENTO CENTINELA')
                            <span class="badge badge-material bg-danger-light text-danger">
                                <i class="fas fa-biohazard mr-1"></i> {{ $clasificacion }}
                            </span>
                        @else
                            <span class="badge badge-material bg-secondary-light text-secondary">
                                {{ $clasificacion }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Unidad</label>
                    <span class="font-weight-bold text-dark">{{ $evento?->unidad ?? 'N/A' }}</span>
                </div>

                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Edad</label>
                    <span class="text-dark">{{ $evento?->edad ?? 'N/A' }}</span>
                </div>

                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Sexo</label>
                    <span class="text-dark">{{ $evento?->sexo ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Descripción del Evento Adverso -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-map-marker-alt text-primary mr-2"></i>Contexto del Incidente
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3 mb-3">
                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Lugar / Área</label>
                    <span class="font-weight-bold text-dark">{{ $evento?->servicio ?? 'N/A' }}</span>
                </div>

                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Turno</label>
                    <span class="text-dark">{{ $evento?->turno ?? 'N/A' }}</span>
                </div>

                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Fecha y Hora</label>
                    <span class="text-dark">
                        <i class="far fa-calendar-alt mr-1 text-muted"></i> {{ $evento?->fecha_hora ?? 'N/A' }}
                    </span>
                </div>

                <div class="col-md-3">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Involucrado Directo</label>
                    <span class="text-dark">{{ $evento?->persona_involucrada ?? 'N/A' }}</span>
                </div>
            </div>

            <hr class="my-3 opacity-25">

            <div class="row g-3">
                <div class="col-md-12">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Personas que Presenciaron</label>
                    <span class="text-dark">{{ $evento?->persona_testigos ?? 'Ninguna' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Descripción Detallada -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-align-left text-primary mr-2"></i>Descripción Detallada
            </h5>
        </div>
        <div class="card-body p-4">
            <p class="text-dark mb-0 leading-relaxed" style="white-space: pre-line;">
                {{ $evento?->descripcion ?? 'Sin descripción detallada disponible.' }}
            </p>
        </div>
    </div>

    <!-- Tipo de Incidente -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-tags text-primary mr-2"></i>Tipo de Incidente
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Categoría</label>
                    <span class="font-weight-bold text-dark">
                        {{ $categoria_nombre ?? $evento?->categoria?->nombre ?? 'Sin Categoría' }}
                    </span>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">Opción / Subcategoría</label>
                    <span class="text-dark">
                        {{ $descripcion_nombre ?? $evento?->subcategoria?->nombre ?? 'Sin Opción' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Gravedad del Daño -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-exclamation-circle text-primary mr-2"></i>Gravedad del Daño
            </h5>
        </div>
        <div class="card-body p-4">
            <p class="text-dark mb-0">
                {{ $evento?->gravedad ?? 'No especificada' }}
            </p>
        </div>
    </div>

    <!-- Factores del Incidente -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-project-diagram text-primary mr-2"></i>Factores Contribuyentes
            </h5>
        </div>
        <div class="card-body p-4">
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteUno ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteUno ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Relacionados con las características del paciente.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteDos ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteDos ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Relacionados con la aplicación de las indicaciones, protocolos, manuales, lineamientos y guías de práctica clínica.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteTres ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteTres ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Individuales asociadas con los integrantes del equipo.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteCuatro ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteCuatro ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Relacionados con el trabajo en equipo.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteCinco ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteCinco ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Relacionados con el ambiente de trabajo y el entorno.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteSeis ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteSeis ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Organizacionales del establecimiento de atención médica.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteSiete ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteSiete ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Institucionales o del ambiente externo.
                    </span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0 py-1">
                    <i class="{{ ($factorIncidenteOcho ?? false) ? 'fas fa-check-circle text-success' : 'far fa-circle text-muted' }} mr-2"></i>
                    <span class="{{ ($factorIncidenteOcho ?? false) ? 'text-dark font-weight-500' : 'text-muted text-decoration-line-through' }}">
                        Otro.
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Evitabilidad -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-shield-alt text-primary mr-2"></i>Evitabilidad e Información
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">¿Se pudo haber evitado?</label>
                    <span class="text-dark font-weight-500">{{ $evento?->evitar_evento ?? 'Sin especificar' }}</span>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">¿Cómo pudo haberse evitado?</label>
                    <span class="text-dark">{{ $evento?->como_evitar_evento ?? 'Sin especificar' }}</span>
                </div>
            </div>

            <hr class="my-3 opacity-25">

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">¿Se proporcionó información al paciente/familiar?</label>
                    <span class="text-dark font-weight-500">{{ $evento?->proporciono_informacion ?? 'Sin especificar' }}</span>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small text-uppercase font-weight-bold d-block mb-1">¿Quién la proporcionó?</label>
                    <span class="text-dark">{{ $evento?->quien_proporciono ?? 'Sin especificar' }}</span>
                </div>
            </div>
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

        .btn-material-secondary {
            background-color: #f1f3f5;
            color: #495057;
            border: none;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .btn-material-secondary:hover {
            background-color: #e9ecef;
            color: #212529;
        }

        .text-decoration-line-through {
            text-decoration: line-through;
            opacity: 0.6;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de detalle de evento cargada de forma segura.");
    </script>
@stop