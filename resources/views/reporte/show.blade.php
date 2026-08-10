@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Reporte Estadístico de Eventos')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between my-2">
        <div>
            <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
                Reporte Estadístico
            </h1>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Análisis consolidado de eventos incidentales y su distribución
            </p>
        </div>
        <div>
            <span class="badge badge-light border shadow-sm px-3 py-2 font-weight-bold text-secondary" style="font-size: 0.9rem;">
                <i class="far fa-calendar-alt text-primary mr-2"></i>Del {{$fechaInicio}} al {{$fechaFin}}
            </span>
        </div>
    </div>
@stop

@section('content')

    <!-- Tarjetas KPI -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-material border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cuasi-Fallas</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $cuasiFalla ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-success-light text-success rounded-circle">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-material border-left-warning h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Eventos Adversos</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $adversos ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-warning-light text-warning rounded-circle">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-material border-left-danger h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Eventos Centinela</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $centinela ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-danger-light text-danger rounded-circle">
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-material border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total de Eventos</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ ($adversos ?? 0) + ($cuasiFalla ?? 0) + ($centinela ?? 0) }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-info-light text-info rounded-circle">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteo de Eventos por Jurisdicción -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-map-marked-alt text-primary mr-2"></i>Conteo de Eventos por Jurisdicción
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                @php $totalGeneral = $eventos->count(); @endphp
                <table class="table table-hover align-middle custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Jurisdicción</th>
                            <th class="text-center">Cuasi-Fallas</th>
                            <th class="text-center">Adversos</th>
                            <th class="text-center">Centinela</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">% Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 8; $i++)
                            @php
                                $jurisdiccion = $eventos->where('jurisdiccion', $i);
                                $cuasiFalla = $jurisdiccion->where('clasificacion_del_evento', 'CUASI-FALLA')->count();
                                $adversos = $jurisdiccion->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count();
                                $centinela = $jurisdiccion->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count();
                                $total = $jurisdiccion->count();
                                $porcentaje = $totalGeneral > 0 ? ($total / $totalGeneral) * 100 : 0;
                            @endphp
                            <tr>
                                <td class="font-weight-bold text-dark">Jurisdicción {{ $i }}</td>
                                <td class="text-center">{{ $cuasiFalla }}</td>
                                <td class="text-center">{{ $adversos }}</td>
                                <td class="text-center">{{ $centinela }}</td>
                                <td class="text-center font-weight-bold text-primary">{{ $total }}</td>
                                <td class="text-center"><span class="badge badge-light border">{{ number_format($porcentaje, 2) }}%</span></td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot class="bg-light font-weight-bold">
                        <tr>
                            <td>TOTAL GENERAL</td>
                            <td class="text-center">{{ $eventos->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                            <td class="text-center">{{ $eventos->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                            <td class="text-center">{{ $eventos->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                            <td class="text-center text-primary">{{ $totalGeneral }}</td>
                            <td class="text-center"><span class="badge badge-primary">100.00%</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Conteo de Eventos por Nivel -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-layer-group text-success mr-2"></i>Conteo de Eventos por Nivel
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Nivel</th>
                            <th class="text-center">Cuasi-Falla</th>
                            <th class="text-center">Adversos</th>
                            <th class="text-center">Centinela</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">% Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalGeneral = collect($resumenNivel)->sum('total'); @endphp
                        @foreach($resumenNivel as $nivel => $datos)
                        <tr>
                            <td class="font-weight-bold text-dark">{{ $nivel }}</td>
                            <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                            <td class="text-center">{{ $datos['adversos'] }}</td>
                            <td class="text-center">{{ $datos['centinela'] }}</td>
                            <td class="text-center font-weight-bold text-success">{{ $datos['total'] }}</td>
                            <td class="text-center"><span class="badge badge-light border">{{ number_format(($datos['total'] / ($totalGeneral ?: 1)) * 100, 2) }}%</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light font-weight-bold">
                        <tr>
                            <td>TOTAL GENERAL</td>
                            <td class="text-center">{{ collect($resumenNivel)->sum('cuasi_falla') }}</td>
                            <td class="text-center">{{ collect($resumenNivel)->sum('adversos') }}</td>
                            <td class="text-center">{{ collect($resumenNivel)->sum('centinela') }}</td>
                            <td class="text-center text-success">{{ $totalGeneral }}</td>
                            <td class="text-center"><span class="badge badge-success">100.00%</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Clasificación -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-tags text-secondary mr-2"></i>Clasificación General
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Clasificación</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">% Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria => $total)
                        <tr>
                            <td class="font-weight-bold text-dark">{{ $categoria }}</td>
                            <td class="text-center font-weight-bold text-secondary">{{ $total }}</td>
                            <td class="text-center"><span class="badge badge-light border">{{ number_format(($total / ($categorias->sum() ?: 1)) * 100, 2) }}%</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light font-weight-bold">
                        <tr>
                            <td>TOTAL</td>
                            <td class="text-center text-secondary">{{ $categorias->sum() }}</td>
                            <td class="text-center"><span class="badge badge-secondary">100.00%</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Conteo por Descripción del Incidente -->
    <div class="card card-material mb-4">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
            <h5 class="card-title font-weight-bold text-dark m-0">
                <i class="fas fa-list-alt text-warning mr-2"></i>Conteo por Descripción del Incidente
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">% Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalGeneral = $eventos->count(); @endphp
                        @foreach($descripciones as $categoria => $items)
                            @php
                                $primeraFila = true;
                                $rowspan = $items->count();
                            @endphp
                            @foreach($items as $descripcion => $total)
                                <tr>
                                    @if($primeraFila)
                                        <td rowspan="{{ $rowspan }}" class="align-middle font-weight-bold text-dark bg-light" style="width: 30%;">
                                            {{ $categoria }}
                                        </td>
                                        @php $primeraFila = false; @endphp
                                    @endif
                                    <td>{{ $descripcion }}</td>
                                    <td class="text-center font-weight-bold text-warning">{{ $total }}</td>
                                    <td class="text-center"><span class="badge badge-light border">{{ number_format(($total / ($totalGeneral ?: 1)) * 100, 2) }}%</span></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light font-weight-bold">
                        <tr>
                            <td colspan="2">TOTAL GENERAL</td>
                            <td class="text-center text-warning">{{ $totalGeneral }}</td>
                            <td class="text-center"><span class="badge badge-warning text-white">100.00%</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Tablas de Jurisdicciones (1 a 8) -->
    @for($j = 1; $j <= 8; $j++)
        @php
            $varName = "resumenJurisdiccion{$j}";
            $resumen = ${$varName} ?? [];
        @endphp
        <div class="card card-material mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0">
                <h5 class="card-title font-weight-bold text-dark m-0">
                    <i class="fas fa-hospital text-info mr-2"></i>Jurisdicción {{ $j }} - Eventos por Unidad
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle custom-table mb-0">
                        <thead>
                            <tr>
                                <th width="40%">Unidad</th>
                                <th class="text-center">Cuasi-Falla</th>
                                <th class="text-center">Adversos</th>
                                <th class="text-center">Centinela</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resumen as $unidad => $datos)
                            <tr>
                                <td class="font-weight-bold text-dark">{{ $unidad }}</td>
                                <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                                <td class="text-center">{{ $datos['adversos'] }}</td>
                                <td class="text-center">{{ $datos['centinela'] }}</td>
                                <td class="text-center font-weight-bold text-info">{{ $datos['total'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light font-weight-bold">
                            <tr>
                                <td>TOTAL</td>
                                <td class="text-center">{{ collect($resumen)->sum('cuasi_falla') }}</td>
                                <td class="text-center">{{ collect($resumen)->sum('adversos') }}</td>
                                <td class="text-center">{{ collect($resumen)->sum('centinela') }}</td>
                                <td class="text-center text-info">{{ collect($resumen)->sum('total') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @endfor

@stop

@section('footer')
    <p class="mb-0 text-muted small text-center">
        Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong> | Subdirección de Calidad y Certificación | Unidad de Planeación (Tecnologías de la Información)
    </p>
@stop

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

        /* Colores de bordes dinámicos para KPIs */
        .border-left-success { border-left: 4px solid #28a745 !important; }
        .border-left-warning { border-left: 4px solid #ffc107 !important; }
        .border-left-danger { border-left: 4px solid #dc3545 !important; }
        .border-left-info { border-left: 4px solid #17a2b8 !important; }

        /* Iconos de KPIs */
        .icon-shape {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .bg-success-light { background-color: #e8f5e9; }
        .bg-warning-light { background-color: #fff8e1; }
        .bg-danger-light { background-color: #ffebee; }
        .bg-info-light { background-color: #e0f7fa; }

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

        .custom-table tfoot td {
            padding: 12px 16px;
            border-top: 2px solid #dee2e6;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Reporte estadístico cargado correctamente.");
    </script>
@stop