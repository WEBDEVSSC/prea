@extends('adminlte::page')

@section('title', 'Dashboard Estadístico')

@section('plugins.Chartjs', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="m-0 font-weight-bold text-dark" style="font-size: 1.75rem;">
            Dashboard Estadístico de Seguridad del Paciente <small class="text-muted" style="font-size: 1.1rem; font-weight: 400;"><?php echo date('Y'); ?></small>
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
        <div class="col-md-4">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Distribución por Nivel de Atención</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 300px;">
                        <canvas id="registrosPorNivelDeAtencion"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Tendencia Mensual por Tipo de Evento</h3>
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
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Evolución Anual: Cuasi-Falla</h3>
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
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Evolución Anual: Evento Adverso</h3>
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
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Evolución Anual: Evento Centinela</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="myBarChartsCentinelaHistorico"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ANÁLISIS DEMOGRÁFICO Y DISTRIBUCIÓN -->
    <div class="row">
        <div class="col-md-3">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Distribución por Sexo</h3>
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
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Grupo Etario (Edad)</h3>
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
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Distribución por Turno</h3>
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
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Gravedad del Daño</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 280px;">
                        <canvas id="registrosPorGravedadDelDano"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ANÁLISIS DE CATEGORÍAS COMPLEJAS CON BARRAS HORIZONTALES -->
    <div class="row">
        <div class="col-md-6">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Rankings: Ocurrencia por Área / Lugar</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 420px;">
                        <canvas id="graficaAreaEventoAdverso"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Rankings: Tipo de Incidente Ocurrido</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 420px;">
                        <canvas id="registrosPorTipoIncidente"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Incidencia por Jurisdicción Sanitarias</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 350px;">
                        <canvas id="registrosPorJurisdiccion"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-material mb-4">
                <div class="card-header border-0 bg-transparent pt-3 pb-0">
                    <h3 class="card-title text-dark font-weight-bold" style="font-size: 1rem;">Personal Involucrado en Incidentes</h3>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 350px;">
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
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    body, .content-wrapper {
        font-family: 'Roboto', sans-serif !important;
        background-color: #f4f6f9 !important;
    }

    .card-material {
        border: none !important;
        border-radius: 10px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06) !important;
        background-color: #ffffff !important;
    }

    .card-material-widget {
        border: none !important;
        border-radius: 10px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05) !important;
        background-color: #ffffff !important;
    }

    .widget-title {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #6c757d;
    }

    .widget-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #212529;
    }

    .widget-icon {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .bg-success-light { background-color: #e8f5e9; color: #2e7d32; }
    .bg-warning-light { background-color: #fff8e1; color: #f57f17; }
    .bg-danger-light { background-color: #ffebee; color: #c62828; }
    .bg-purple-light { background-color: #f3e5f5; color: #6200ee; }

    .text-purple { color: #6200ee !important; }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.Chart) {
            Chart.register(ChartDataLabels);
            Chart.defaults.font.family = 'Roboto, sans-serif';
            Chart.defaults.color = '#495057';
            Chart.defaults.font.size = 11;
        }
    });

    // CONFIGURACIÓN 1: Donas con lectura de Valor + Porcentaje (%)
    const opcionesDoughnutPorcentaje = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: { boxWidth: 12, padding: 12 }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let total = context.dataset.data.reduce((a, b) => a + Number(b), 0);
                        let val = context.raw || 0;
                        let pct = total > 0 ? ((val / total) * 100).toFixed(1) : 0;
                        return ` ${context.label}: ${val} (${pct}%)`;
                    }
                }
            },
            datalabels: {
                color: '#ffffff',
                font: { weight: 'bold', size: 10 },
                formatter: function(value, context) {
                    let total = context.dataset.data.reduce((a, b) => a + Number(b), 0);
                    if (total === 0 || value === 0) return '';
                    let pct = ((value / total) * 100).toFixed(0);
                    return pct > 3 ? `${value}\n(${pct}%)` : '';
                },
                textAlign: 'center'
            }
        }
    };

    // CONFIGURACIÓN 2: Barras Verticales (SIN PORCENTAJES - Solo Valor Absoluto)
    const opcionesBarrasEstandarSoloValores = {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
            legend: { position: 'top' },
            datalabels: {
                anchor: 'end',
                align: 'top',
                color: '#495057',
                font: { weight: 'bold', size: 9 },
                formatter: function(value) {
                    return (value && value > 0) ? value : '';
                }
            }
        },
        scales: {
            y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.04)' }, grace: '15%' },
            x: { grid: { display: false } }
        }
    };

    // CONFIGURACIÓN 3: Barras Horizontales con Valor + Porcentaje
    const opcionesBarrasHorizontales = {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            datalabels: {
                anchor: 'end',
                align: 'end',
                color: '#333333',
                font: { weight: 'bold', size: 9 },
                formatter: function(value, context) {
                    if (!value || value === 0) return '';
                    let dataset = context.dataset.data;
                    let total = dataset.reduce((a, b) => a + Number(b || 0), 0);
                    let pct = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                    return `${value} (${pct}%)`;
                }
            }
        },
        scales: {
            x: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.04)' }, grace: '20%' },
            y: { grid: { display: false } }
        }
    };

    // Función Auxiliar para ordenar datos de Barras Horizontales Descendentes
    function ordenarDatosHorizontal(labels, data, color) {
        let combinados = labels.map((l, i) => ({ label: l, val: data[i] }));
        combinados.sort((a, b) => b.val - a.val);
        return {
            labels: combinados.map(item => item.label),
            datasets: [{
                data: combinados.map(item => item.val),
                backgroundColor: color,
                borderRadius: 4
            }]
        };
    }

    // Carga de Datos PHP
    const datosPorTipo = @json($datosPorTipo);
    const datosCuasiFallaHistorico = @json($datosCuasiFallaHistorico);
    const datosAdversoHistorico = @json($datosAdversoHistorico);
    const datosCentinelaHistorico = @json($datosCentinelaHistorico);

    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Tendencia Mensual por Tipo de Evento (SOLO NÚMEROS / SIN PORCENTAJES)
        const ctxMes = document.getElementById('myBarCharts');
        if (ctxMes) {
            new Chart(ctxMes.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [
                        { label: 'Cuasifalla', data: datosPorTipo.Cuasifalla, backgroundColor: '#2e7d32', borderRadius: 3 },
                        { label: 'Adverso', data: datosPorTipo.Adverso, backgroundColor: '#f57f17', borderRadius: 3 },
                        { label: 'Centinela', data: datosPorTipo.Centinela, backgroundColor: '#c62828', borderRadius: 3 }
                    ]
                },
                options: opcionesBarrasEstandarSoloValores
            });
        }

        // 2. Evolución Anual Histórica (SOLO NÚMEROS / SIN PORCENTAJES)
        ['CuasiFallaHistorico', 'AdversoHistorico', 'CentinelaHistorico'].forEach((type) => {
            let elem = document.getElementById(`myBarCharts${type}`);
            let source = type === 'CuasiFallaHistorico' ? datosCuasiFallaHistorico :
                         type === 'AdversoHistorico' ? datosAdversoHistorico : datosCentinelaHistorico;
            if (elem) {
                new Chart(elem.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        datasets: [
                            { label: '2024', data: source[2024], backgroundColor: '#90caf9', borderRadius: 3 },
                            { label: '2025', data: source[2025], backgroundColor: '#42a5f5', borderRadius: 3 },
                            { label: '2026', data: source[2026], backgroundColor: '#1565c0', borderRadius: 3 }
                        ]
                    },
                    options: opcionesBarrasEstandarSoloValores
                });
            }
        });

        // 3. Distribución por Sexo
        const ctxSexo = document.getElementById('registrosPorSexo');
        if (ctxSexo) {
            new Chart(ctxSexo.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Masculino', 'Femenino'],
                    datasets: [{
                        data: [{{$totalMasculino}}, {{$totalFemenino}}],
                        backgroundColor: ['#0288d1', '#ab47bc'],
                        borderWidth: 2, borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutPorcentaje
            });
        }

        // 4. Nivel de Atención
        const ctxNivel = document.getElementById('registrosPorNivelDeAtencion');
        if (ctxNivel) {
            new Chart(ctxNivel.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Primer Nivel', 'Segundo Nivel', 'Tercer Nivel'],
                    datasets: [{
                        data: [{{$primerNivel}}, {{$segundoNivel}}, {{$tercerNivel}}],
                        backgroundColor: ['#00acc1', '#ffb300', '#e53935'],
                        borderWidth: 2, borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutPorcentaje
            });
        }

        // 5. Grupo Etario (Edad)
        const ctxEdad = document.getElementById('registrosPorRangoDeEdad');
        if (ctxEdad) {
            new Chart(ctxEdad.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['1ra Infancia','Infancia','Adolescencia','Juventud','Adultez','Mayor'],
                    datasets: [{
                        data: [
                            {{$totalPrimeraInfancia}}, {{$totalInfancia}}, {{$totalAdolescencia}},
                            {{$totalJuventud}}, {{$totalAdultez}}, {{$totalPersonaMayor}}
                        ],
                        backgroundColor: ['#ec407a', '#1e88e5', '#fdd835', '#26a69a', '#ab47bc', '#fb8c00'],
                        borderWidth: 2, borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutPorcentaje
            });
        }

        // 6. Turno
        const ctxTurno = document.getElementById('graficaTurno');
        if (ctxTurno) {
            new Chart(ctxTurno.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Matutino', 'Vespertino', 'Nocturno', 'J. Acumulada'],
                    datasets: [{
                        data: [{{$matutino}}, {{$vespertino}}, {{$nocturno}}, {{$jornadaAcumulada}}],
                        backgroundColor: ['#fbc02d', '#1976d2', '#4527a0', '#00796b'],
                        borderWidth: 2, borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutPorcentaje
            });
        }

        // 7. Gravedad del Daño
        const ctxGravedad = document.getElementById('registrosPorGravedadDelDano');
        if (ctxGravedad) {
            new Chart(ctxGravedad.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Sin Daño','Bajo','Moderado','Grave','Muerte'],
                    datasets: [{
                        data: [{{$sinDano}}, {{$bajo}}, {{$moderado}}, {{$grave}}, {{$muerte}}],
                        backgroundColor: ['#43a047', '#29b6f6', '#ffa726', '#ef5350', '#b71c1c'],
                        borderWidth: 2, borderColor: '#ffffff'
                    }]
                },
                options: opcionesDoughnutPorcentaje
            });
        }

        // 8. Rankings Complejos (Barras Horizontales)

        // Área / Lugar del Evento
        const ctxArea = document.getElementById('graficaAreaEventoAdverso');
        if (ctxArea) {
            let labels = ['Almacén', 'Cendis', 'CEYE', 'Consulta Externa', 'Dental', 'Farmacia', 'Hospitalización', 'Imagenología', 'Laboratorio', 'Medicina Preventiva', 'Nutrición', 'Patología', 'Quirófano', 'Salud Reproductiva', 'Tococirugía', 'UCI Adultos', 'UCI Neonatales', 'UCI Pediátricos', 'Urgencias'];
            let data = [{{ $almacen }}, {{ $cendis }}, {{ $ceye }}, {{ $consultaExterna }}, {{ $dental }}, {{ $farmacia }}, {{ $hospitalizacion }}, {{ $imagenologia }}, {{ $laboratorio }}, {{ $medicinaPreventiva }}, {{ $nutricion }}, {{ $patologia }}, {{ $quirofano }}, {{ $saludReproductiva }}, {{ $tococirugia }}, {{ $UCIAdultos }}, {{ $UCINeonatales }}, {{ $UCIPediatricos }}, {{ $urgencias }}];
            
            new Chart(ctxArea.getContext('2d'), {
                type: 'bar',
                data: ordenarDatosHorizontal(labels, data, 'rgba(30, 136, 229, 0.85)'),
                options: opcionesBarrasHorizontales
            });
        }

        // Tipo de Incidente
        const ctxIncidente = document.getElementById('registrosPorTipoIncidente');
        if (ctxIncidente) {
            let labels = ['AESP','MMU','PCI','DEB','ACC','PFR','SAD','NUT','ASC','MCI','OTRO','HEMO'];
            let data = [{{$tipoAESP}}, {{$tipoMMU}}, {{$tipoPCI}}, {{$tipoDEB}}, {{$tipoACC}}, {{$tipoPFR}}, {{$tipoSAP}}, {{$tipoNUT}}, {{$tipoASC}}, {{$tipoMCI}}, {{$tipoOTRO}}, {{$tipoHEMO}}];

            new Chart(ctxIncidente.getContext('2d'), {
                type: 'bar',
                data: ordenarDatosHorizontal(labels, data, 'rgba(0, 150, 136, 0.85)'),
                options: opcionesBarrasHorizontales
            });
        }

        // Jurisdicción Sanitarias
        const ctxJuris = document.getElementById('registrosPorJurisdiccion');
        if (ctxJuris) {
            let labels = ['J1', 'J2', 'J3', 'J4', 'J5', 'J6', 'J7', 'J8'];
            let data = [{{$totalJurisdiccionUno}}, {{$totalJurisdiccionDos}}, {{$totalJurisdiccionTres}}, {{$totalJurisdiccionCuatro}}, {{$totalJurisdiccionCinco}}, {{$totalJurisdiccionSeis}}, {{$totalJurisdiccionSiete}}, {{$totalJurisdiccionOcho}}];

            new Chart(ctxJuris.getContext('2d'), {
                type: 'bar',
                data: ordenarDatosHorizontal(labels, data, 'rgba(124, 77, 255, 0.85)'),
                options: opcionesBarrasHorizontales
            });
        }

        // Persona Involucrada
        const ctxPersona = document.getElementById('registrosPersonaDirectamenteInvolucrada');
        if (ctxPersona) {
            let labels = ['Admin','Camillero','Enfermería','Médico','Nutriólogo','Odontólogo','Otro','En Formación','Químico','Radiólogo'];
            let data = [{{$PDIAdministrativo}}, {{$PDICamillero}}, {{$PDIEnfermeria}}, {{$PDIMedico}}, {{$PDINutriologo}}, {{$PDIOdontologo}}, {{$PDIOtro}}, {{$PDIPersonalEnFormacion}}, {{$PDIQuimico}}, {{$PDIRadiologo}}];

            new Chart(ctxPersona.getContext('2d'), {
                type: 'bar',
                data: ordenarDatosHorizontal(labels, data, 'rgba(255, 112, 67, 0.85)'),
                options: opcionesBarrasHorizontales
            });
        }

    });
</script>
@stop