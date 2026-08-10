@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
            Dashboard <small class="text-muted" style="font-size: 1.1rem; font-weight: 400;"><?php echo date('Y'); ?></small>
        </h1>
    </div>
@stop

@section('content')

    @if($usuario->role == "admin")

    <!-- TARJETAS DE RESUMEN TIPO MATERIAL DESIGN -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-material-widget widget-success mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="widget-title">Cuasi-Falla</span>
                            <h2 class="widget-value mb-0">{{ $cuasiFalla }}</h2>
                        </div>
                        <div class="widget-icon bg-success-light">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <a href="{{ route('indexCuasiFalla') }}" class="widget-link text-success mt-3 d-inline-block font-weight-bold">
                        Ver detalles <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-material-widget widget-warning mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="widget-title">Adverso</span>
                            <h2 class="widget-value mb-0">{{ $eventoAdverso }}</h2>
                        </div>
                        <div class="widget-icon bg-warning-light">
                            <i class="fas fa-notes-medical"></i>
                        </div>
                    </div>
                    <a href="{{ route('indexAdversos') }}" class="widget-link text-warning mt-3 d-inline-block font-weight-bold">
                        Ver detalles <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-material-widget widget-danger mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="widget-title">Centinela</span>
                            <h2 class="widget-value mb-0">{{ $eventoCentinela }}</h2>
                        </div>
                        <div class="widget-icon bg-danger-light">
                            <i class="fas fa-biohazard"></i>
                        </div>
                    </div>
                    <a href="{{ route('indexCentinelas') }}" class="widget-link text-danger mt-3 d-inline-block font-weight-bold">
                        Ver detalles <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-material-widget widget-purple mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="widget-title">Total Eventos</span>
                            <h2 class="widget-value mb-0">{{ $totalEvento }}</h2>
                        </div>
                        <div class="widget-icon bg-purple-light">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                    <a href="{{ route('eventoIndex') }}" class="widget-link text-purple mt-3 d-inline-block font-weight-bold">
                        Ver detalles <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN DE GRÁFICAS PRINCIPALES -->
    <div class="row">
        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Reportes por Nivel de Atención</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 300px;">
                        <canvas id="registrosPorNivelDeAtencion"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Resumen por mes</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 300px;">
                        <canvas id="myBarCharts"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COMPARATIVOS HISTÓRICOS -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Comparativo Anual CuasiFalla</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="myBarChartsCuasiFallaHistorico"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Comparativo Anual Adverso</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="myBarChartsAdversoHistorico"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Comparativo Anual Centinela</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="myBarChartsCentinelaHistorico"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DETALLES DEMOGRÁFICOS -->
    <div class="row">
        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Registros por jurisdicción</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPorJurisdiccion"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Registros por sexo</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPorSexo"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Rangos de edad</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPorRangoDeEdad"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 0.95rem;">Lugar / Área del evento</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="graficaAreaEventoAdverso"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OTROS FACTORES -->
    <div class="row">
        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Turno</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="graficaTurno"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Tipo de Incidente</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPorTipoIncidente"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Gravedad del daño</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPorGravedadDelDano"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 0.9rem;">Persona involucrada</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPersonaDirectamenteInvolucrada"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

@stop

@include('layouts.footer')

@section('css')
<!-- Google Fonts: Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    /* Aplicación general de fuente Roboto */
    body, .content-wrapper {
        font-family: 'Roboto', sans-serif !important;
        background-color: #e9ecef !important; /* Gris claro institucional de fondo */
    }

    /* Tarjetas principales estilo Material Design */
    .card-material {
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
        background-color: #ffffff !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card-material:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08) !important;
    }

    /* Tarjetas de Widgets/Resumen estilo Material */
    .card-material-widget {
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06) !important;
        background-color: #ffffff !important;
        transition: transform 0.2s ease;
    }

    .card-material-widget:hover {
        transform: translateY(-3px);
    }

    .widget-title {
        font-size: 0.85rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
    }

    .widget-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #212529;
    }

    .widget-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .widget-link {
        font-size: 0.85rem;
        text-decoration: none !important;
        transition: opacity 0.2s ease;
    }

    .widget-link:hover {
        opacity: 0.8;
    }

    /* Modificadores de Colores para Íconos e Indicadores Material */
    .bg-success-light { background-color: #e8f5e9; color: #2e7d32; }
    .bg-warning-light { background-color: #fff8e1; color: #f57f17; }
    .bg-danger-light { background-color: #ffebee; color: #c62828; }
    .bg-purple-light { background-color: #f3e5f5; color: #6200ee; }

    .text-purple { color: #6200ee !important; }
</style>
@stop

@section('js')
<script>
    // Configuración global estética para Chart.js
    document.addEventListener('DOMContentLoaded', function() {
        if (window.Chart) {
            Chart.defaults.font.family = 'Roboto, sans-serif';
            Chart.defaults.color = '#495057';
            Chart.defaults.font.size = 11;
        }
    });

    // Configuración base reutilizable para gráficas circulares (sin leyendas)
    const opcionesDoughnutSinLeyenda = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true
            }
        }
    };

    // 1. Convertir PHP a JS
    const datosPorTipo = @json($datosPorTipo);

    // 2. Gráfica Resumen por mes
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarCharts');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [
                        {
                            label: 'Cuasifalla',
                            data: datosPorTipo.Cuasifalla,
                            backgroundColor: 'rgba(46, 125, 50, 0.85)',
                            borderRadius: 4
                        },
                        {
                            label: 'Adverso',
                            data: datosPorTipo.Adverso,
                            backgroundColor: 'rgba(245, 127, 23, 0.85)',
                            borderRadius: 4
                        },
                        {
                            label: 'Centinela',
                            data: datosPorTipo.Centinela,
                            backgroundColor: 'rgba(198, 40, 40, 0.85)',
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.04)' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        }
    });

    // 3. Comparativo Anual CuasiFalla
    const datosCuasiFallaHistorico = @json($datosCuasiFallaHistorico);
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarChartsCuasiFallaHistorico');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [
                        { label: '2024', data: datosCuasiFallaHistorico[2024], backgroundColor: 'rgba(33, 150, 243, 0.85)', borderRadius: 4 },
                        { label: '2025', data: datosCuasiFallaHistorico[2025], backgroundColor: 'rgba(76, 175, 80, 0.85)', borderRadius: 4 },
                        { label: '2026', data: datosCuasiFallaHistorico[2026], backgroundColor: 'rgba(244, 67, 54, 0.85)', borderRadius: 4 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        }
    });

    // 4. Comparativo Anual Adverso
    const datosAdversoHistorico = @json($datosAdversoHistorico);
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarChartsAdversoHistorico');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [
                        { label: '2024', data: datosAdversoHistorico[2024], backgroundColor: 'rgba(33, 150, 243, 0.85)', borderRadius: 4 },
                        { label: '2025', data: datosAdversoHistorico[2025], backgroundColor: 'rgba(76, 175, 80, 0.85)', borderRadius: 4 },
                        { label: '2026', data: datosAdversoHistorico[2026], backgroundColor: 'rgba(244, 67, 54, 0.85)', borderRadius: 4 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        }
    });

    // 5. Comparativo Anual Centinela
    const datosCentinelaHistorico = @json($datosCentinelaHistorico);
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarChartsCentinelaHistorico');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [
                        { label: '2024', data: datosCentinelaHistorico[2024], backgroundColor: 'rgba(33, 150, 243, 0.85)', borderRadius: 4 },
                        { label: '2025', data: datosCentinelaHistorico[2025], backgroundColor: 'rgba(76, 175, 80, 0.85)', borderRadius: 4 },
                        { label: '2026', data: datosCentinelaHistorico[2026], backgroundColor: 'rgba(244, 67, 54, 0.85)', borderRadius: 4 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        }
    });

    // 6. Gráficas por Sexo
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPorSexo');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Masculino', 'Femenino'],
                    datasets: [{
                        data: [{{$totalMasculino}}, {{$totalFemenino}}],
                        backgroundColor: ['#2196f3', '#9c27b0'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 7. Gráficas por Nivel de Atención
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPorNivelDeAtencion');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Primer Nivel', 'Segundo Nivel', 'Tercer Nivel'],
                    datasets: [{
                        data: [{{$primerNivel}}, {{$segundoNivel}}, {{$tercerNivel}}],
                        backgroundColor: ['#03a9f4', '#ffc107', '#f44336'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 8. Gráficas por Jurisdicción
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPorJurisdiccion');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['J1', 'J2', 'J3', 'J4', 'J5', 'J6', 'J7', 'J8'],
                    datasets: [{
                        data: [
                            {{$totalJurisdiccionUno}}, {{$totalJurisdiccionDos}}, {{$totalJurisdiccionTres}},
                            {{$totalJurisdiccionCuatro}}, {{$totalJurisdiccionCinco}}, {{$totalJurisdiccionSeis}},
                            {{$totalJurisdiccionSiete}}, {{$totalJurisdiccionOcho}}
                        ],
                        backgroundColor: ['#2196f3', '#9c27b0', '#ff9800', '#00bcd4', '#f44336', '#3f51b5', '#ffeb3b', '#673ab7'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 9. Rangos de Edad
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPorRangoDeEdad');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['1ra Infancia','Infancia','Adolescencia','Juventud','Adultez','Mayor'],
                    datasets: [{
                        data: [
                            {{$totalPrimeraInfancia}}, {{$totalInfancia}}, {{$totalAdolescencia}},
                            {{$totalJuventud}}, {{$totalAdultez}}, {{$totalPersonaMayor}}
                        ],
                        backgroundColor: ['#e91e63', '#2196f3', '#ffc107', '#00bcd4', '#9c27b0', '#ff9800'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 10. Área del Evento Adverso
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficaAreaEventoAdverso');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: [
                        'Almacén', 'Cendis', 'CEYE', 'Consulta Externa', 'Dental', 'Farmacia', 
                        'Hospitalización', 'Imagenología', 'Laboratorio', 'Medicina Preventiva', 
                        'Nutrición', 'Patología', 'Quirófano', 'Salud Reproductiva', 'Tococirugía', 
                        'UCI Adultos', 'UCI Neonatales', 'UCI Pediátricos', 'Urgencias'
                    ],
                    datasets: [{
                        data: [
                            {{ $almacen }}, {{ $cendis }}, {{ $ceye }}, {{ $consultaExterna }}, {{ $dental }},
                            {{ $farmacia }}, {{ $hospitalizacion }}, {{ $imagenologia }}, {{ $laboratorio }},
                            {{ $medicinaPreventiva }}, {{ $nutricion }}, {{ $patologia }}, {{ $quirofano }},
                            {{ $saludReproductiva }}, {{ $tococirugia }}, {{ $UCIAdultos }}, {{ $UCINeonatales }},
                            {{ $UCIPediatricos }}, {{ $urgencias }}
                        ],
                        backgroundColor: [
                            '#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4',
                            '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107',
                            '#ff9800', '#ff5722', '#795548', '#9e9e9e', '#607d8b'
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 11. Gráfica Turno
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficaTurno');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Matutino', 'Vespertino', 'Nocturno', 'J. Acumulada'],
                    datasets: [{
                        data: [{{$matutino}}, {{$vespertino}}, {{$nocturno}}, {{$jornadaAcumulada}}],
                        backgroundColor: ['#e53935', '#1e88e5', '#fdd835', '#00897b'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 12. Tipo de Incidente
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPorTipoIncidente');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['AESP','MMU','PCI','DEB','ACC','PFR','SAD','NUT','ASC','MCI','OTRO','HEMO'],
                    datasets: [{
                        data: [
                            {{$tipoAESP}}, {{$tipoMMU}}, {{$tipoPCI}}, {{$tipoDEB}}, {{$tipoACC}}, {{$tipoPFR}},
                            {{$tipoSAP}}, {{$tipoNUT}}, {{$tipoASC}}, {{$tipoMCI}}, {{$tipoOTRO}}, {{$tipoHEMO}}
                        ],
                        backgroundColor: [
                            '#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3',
                            '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#ffc107'
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 13. Gravedad del daño
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPorGravedadDelDano');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin Daño','Bajo','Moderado','Grave','Muerte'],
                    datasets: [{
                        data: [{{$sinDano}}, {{$bajo}}, {{$moderado}}, {{$grave}}, {{$muerte}}],
                        backgroundColor: ['#4caf50', '#2196f3', '#ffc107', '#ff9800', '#f44336'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });

    // 14. Persona Involucrada
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('registrosPersonaDirectamenteInvolucrada');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Admin','Camillero','Enfermería','Médico','Nutriólogo','Odontólogo','Otro','En Formación','Químico','Radiólogo'],
                    datasets: [{
                        data: [
                            {{$PDIAdministrativo}}, {{$PDICamillero}}, {{$PDIEnfermeria}}, {{$PDIMedico}},
                            {{$PDINutriologo}}, {{$PDIOdontologo}}, {{$PDIOtro}}, {{$PDIPersonalEnFormacion}},
                            {{$PDIQuimico}}, {{$PDIRadiologo}}
                        ],
                        backgroundColor: [
                            '#f44336', '#ff9800', '#ffeb3b', '#4caf50', '#2196f3',
                            '#9c27b0', '#9e9e9e', '#e91e63', '#00bcd4', '#2e7d32'
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutSinLeyenda
            });
        }
    });
</script>
@stop