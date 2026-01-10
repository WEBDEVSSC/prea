@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1><strong>Dashboard </strong><small><?php echo date('Y'); ?></small></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------------- -->

    @if($usuario->role == "admin")

    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $cuasiFalla }}</h3>

                <p>Cuasi-Falla</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('indexCuasiFalla') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color: white;">{{ $eventoAdverso }}</h3>

                <p style="color: white;">Adverso</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('indexAdversos') }}" class="small-box-footer text-white" style="color: white !important;">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $eventoCentinela }}</h3>

                <p>Centinela</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('indexCentinelas') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div> 
        </div>

        <div class="col-md-3">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalEvento}}</h3>

                <p>Total</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('eventoIndex') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    

        <!-- INICIO DE LAS GRAFICAS PARA EL USUARIO ADMIN -->

        {{-- <div class="row">
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CUASI-FALLA</span>
                        <span class="info-box-number">{{ $cuasiFalla }}</span>
                        <a href="">Detalles</a>
                    </div>            
                </div>
    
            </div>            
    
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ADVERSO</span>
                        <span class="info-box-number">{{ $eventoAdverso }}</span>
                        <a href="">Detalles</a>
                    </div>            
                </div>
    
            </div>
    
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CENTINELA</span>
                        <span class="info-box-number">{{ $eventoCentinela }}</span>
                        <a href="">Detalles</a>
                    </div>            
                </div>
    
            </div>
    
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number">{{ $totalEvento }}</span>
                        <a class="badge badge-danger" href="">Detalles</a>
                    </div>            
                </div>
    
            </div>
        </div> --}}
    
        <!-- -------------------------------------------------------------------- -->

        <div class="row">
            <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Reportes por Nivel de Atención</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="registrosPorNivelDeAtencion" width="400" height="400"></canvas>
                            </div>
    
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Resumen por mes</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="myBarCharts" width="400" height="350"></canvas>
                            </div>
    
                </div>
            </div>
        </div>
    </div>

        
        <!-- -------------------------------------------------------------------- -->

        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Comparativo Anual CuasiFalla</strong></h3>
                    </div>
                    <div class="card-body">

                        <div>
                            <canvas id="myBarChartsCuasiFallaHistorico" width="400" height="350"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Comparativo Anual Adverso</strong></h3>
                    </div>
                    <div class="card-body">
                        
                        <div>
                            <canvas id="myBarChartsAdversoHistorico" width="400" height="350"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Comparativo Anual Centinela</strong></h3>
                    </div>
                    <div class="card-body">

                        <div>
                            <canvas id="myBarChartsCentinelaHistorico" width="400" height="350"></canvas>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- -------------------------------------------------------------------- -->
    
        <div class="row">
            
            <div class="col-md-3">
    
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Registros por jurisdicción</strong></h3>
                    </div>
                    <div class="card-body">
                        
                                <div>
                                    <canvas id="registrosPorJurisdiccion" width="400" height="400"></canvas>
                                </div>
                        
    
                    </div>
                </div>
    
            </div>
            <div class="col-md-3">
    
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Registros por sexo</strong></h3>
                    </div>
                    <div class="card-body">
    
                    
                        <div>
                            <canvas id="registrosPorSexo" width="400" height="400"></canvas>
                        </div>
    
                        
    
                    </div>
                </div>
    
            </div>
    
            <div class="col-md-3">
    
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Rangos de edad</strong></h3>
                    </div>
                    <div class="card-body">
    
                                <div>
                                    <canvas id="registrosPorRangoDeEdad" width="400" height="400"></canvas>
                                </div>

                    </div>
                </div>
    
            </div>
    
            <div class="col-md-3">
    
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Lugar o área del evento adverso</strong></h3>
                    </div>
                    <div class="card-body">
    
                                <div>
                                    <canvas id="graficaAreaEventoAdverso" width="400" height="400"></canvas>
                                </div>
    
                    </div>
                </div>
    
            </div>
    
            
        </div>
    
        <!-- -------------------------------------------------------------------- -->
    
        <div class="row">
        <div class="col-md-3">
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Turno</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="graficaTurno" width="400" height="400"></canvas>
                            </div>
    
                </div>
            </div>
    
            </div>

            <div class="col-md-3">
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Tipo de Incidente</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="registrosPorTipoIncidente" width="400" height="400"></canvas>
                            </div>
    
                </div>
            </div>
    
            </div>

             <div class="col-md-3">
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Gravedad del daño</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="registrosPorGravedadDelDano" width="400" height="400"></canvas>
                            </div>
    
                </div>
            </div>
    
            </div>
    
            <div class="col-md-3">
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Persona directamente involucrada</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="registrosPersonaDirectamenteInvolucrada" width="400" height="407"></canvas>
                            </div>
    
                </div>
            </div>
    
            </div>
        </div>

        <!-- ------------------------------------------------------------------ -->

        <!-- ------------------------------------------------------------------ -->

        

        <!-- FIN DE LAS GRAFICAS PARA EL USUARIO ADMIN -->
    
    @else

    
    @endif

@stop

@include('layouts.footer')

@section('css')

@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

   <script>
    // Esta línea convierte la variable PHP $datosPorTipo en una variable JS válida
    const datosPorTipo = @json($datosPorTipo);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarCharts');
        if (!ctx) {
            console.error('No se encontró el elemento con ID "myBarCharts"');
            return;
        }

        // Configuración global para Chart.js 3+
        Chart.defaults.font.family = 'Nunito, sans-serif';
        Chart.defaults.color = '#000';
        Chart.defaults.font.size = 12;

        // Aquí ya usamos la variable que viene desde el backend
        new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [

                    {
                        label: 'Cuasifalla',
                        data: datosPorTipo.Cuasifalla,
                        backgroundColor: 'rgba(34, 197, 94, 0.8)',  // Verde
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Adverso',
                        data: datosPorTipo.Adverso,
                        backgroundColor: 'rgba(250, 204, 21, 0.8)',  // Amarillo
                        borderColor: 'rgba(250, 204, 21, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Centinela',
                        data: datosPorTipo.Centinela,
                        backgroundColor: 'rgba(239, 68, 68, 0.8)',   // Rojo
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }

                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    const datosCuasiFallaHistorico = @json($datosCuasiFallaHistorico);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarChartsCuasiFallaHistorico');
        if (!ctx) {
            console.error('No se encontró el elemento con ID "myBarChartsCuasiFallaHistorico"');
            return;
        }

        // Configuración global para Chart.js 3+
        Chart.defaults.font.family = 'Nunito, sans-serif';
        Chart.defaults.color = '#000';
        Chart.defaults.font.size = 12;

        /*
            Se espera que desde el backend venga algo así:

            datosCuasiFallaHistorico = {
                2024: [12, 7, 15, 9, 4, 6, 8, 5, 10, 11, 3, 2],
                2025: [9, 11, 8, 6, 7, 10, 5, 4, 9, 6, 2, 1],
                2026: [4, 2, 6, 3, 5, 7, 2, 1, 4, 3, 1, 0]
            };
        */

        new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [
                    {
                        label: '2024',
                        data: datosCuasiFallaHistorico[2024],
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',   // Azul
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2025',
                        data: datosCuasiFallaHistorico[2025],
                        backgroundColor: 'rgba(34, 197, 94, 0.8)',   // Verde
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2026',
                        data: datosCuasiFallaHistorico[2026],
                        backgroundColor: 'rgba(239, 68, 68, 0.8)',   // Rojo
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>

<script>
    const datosAdversoHistorico = @json($datosAdversoHistorico);
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarChartsAdversoHistorico');
        if (!ctx) {
            console.error('No se encontró el elemento con ID "myBarChartsAdversoHistorico"');
            return;
        }

        // Configuración global Chart.js 3+
        Chart.defaults.font.family = 'Nunito, sans-serif';
        Chart.defaults.color = '#000';
        Chart.defaults.font.size = 12;

        new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [
                    {
                        label: '2024',
                        data: datosAdversoHistorico[2024],
                        backgroundColor: 'rgba(59, 130, 246, 0.8)', // Amarillo
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2025',
                        data: datosAdversoHistorico[2025],
                        backgroundColor: 'rgba(34, 197, 94, 0.8)', // Verde
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2026',
                        data: datosAdversoHistorico[2026],
                        backgroundColor: 'rgba(239, 68, 68, 0.8)', // Rojo
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>


<script>
    const datosCentinelaHistorico = @json($datosCentinelaHistorico);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myBarChartsCentinelaHistorico');
        if (!ctx) {
            console.error('No se encontró el elemento con ID "myBarChartsCentinelaHistorico"');
            return;
        }

        // Configuración global Chart.js
        Chart.defaults.font.family = 'Nunito, sans-serif';
        Chart.defaults.color = '#000';
        Chart.defaults.font.size = 12;

        new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [
                    {
                        label: '2024',
                        data: datosCentinelaHistorico[2024],
                        backgroundColor: 'rgba(59, 130, 246, 0.8)', // Morado
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2025',
                        data: datosCentinelaHistorico[2025],
                        backgroundColor: 'rgba(34, 197, 94, 0.8)', // Amarillo
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2026',
                        data: datosCentinelaHistorico[2026],
                        backgroundColor: 'rgba(239, 68, 68, 0.8)', // Azul claro
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>




    <!-- GRAFICAS POR SEXO -->
    <script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorSexo').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Masculino', 'Femenino'],
            datasets: [{
                label: 'Número de votos',
                data: [{{$totalMasculino}}, {{$totalFemenino}}], 
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',  // Azul Chart.js (más visible)
                    'rgba(153, 102, 255, 0.5)'  // Morado Chart.js (más visible)
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- GRAFICAS POR NIVEL DE ATENCION -->
    <script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorNivelDeAtencion').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Primer Nivel', 'Segundo Nivel', 'Tercer Nivel'],
            datasets: [{
                label: 'Número de votos',
                data: [{{$primerNivel}}, {{$segundoNivel}}, {{$tercerNivel}}], 
                backgroundColor: [
                    'rgba(56, 189, 248, 0.5)',   // Azul cielo (#38bdf8)
                    'rgba(250, 204, 21, 0.5)',   // Amarillo (#facc15)
                    'rgba(239, 68, 68, 0.5)'     // Rojo (#ef4444)
                ],
                borderColor: [
                    'rgba(56, 189, 248, 1)',     // Azul cielo
                    'rgba(250, 204, 21, 1)',     // Amarillo
                    'rgba(239, 68, 68, 1)'       // Rojo
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const dataset = tooltipItem.chart.data.datasets[tooltipItem.datasetIndex];
                            const total = dataset.data.reduce((a, b) => a + b, 0);
                            const value = dataset.data[tooltipItem.dataIndex];
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- GRAFICAS POR JURISDICCION -->
<script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorJurisdiccion').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Jurisdicción 1',
                'Jurisdicción 2',
                'Jurisdicción 3',
                'Jurisdicción 4',
                'Jurisdicción 5',
                'Jurisdicción 6',
                'Jurisdicción 7',
                'Jurisdicción 8',
            ],
            datasets: [{
                label: 'Número de votos',
                data: [
                    {{$totalJurisdiccionUno}}, 
                    {{$totalJurisdiccionDos}},  
                    {{$totalJurisdiccionTres}},  
                    {{$totalJurisdiccionCuatro}},  
                    {{$totalJurisdiccionCinco}},  
                    {{$totalJurisdiccionSeis}},  
                    {{$totalJurisdiccionSiete}},  
                    {{$totalJurisdiccionOcho}},  
                ], 
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',   // Azul (Color 1)
                    'rgba(153, 102, 255, 0.5)',  // Morado (Color 2)
                    'rgba(255, 159, 64, 0.5)',   // Naranja (Color 3)
                    'rgba(75, 192, 192, 0.5)',   // Verde agua (Color 4)
                    'rgba(255, 99, 132, 0.5)',   // Rojo (Color 5)
                    'rgba(54, 162, 235, 0.5)',   // Azul (Color 6) - repetido para mantener paleta
                    'rgba(255, 206, 86, 0.5)',   // Amarillo (Color 7)
                    'rgba(153, 102, 255, 0.5)'   // Morado (Color 8) - repetido
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',     // Azul (Color 1)
                    'rgba(153, 102, 255, 1)',    // Morado (Color 2)
                    'rgba(255, 159, 64, 1)',     // Naranja (Color 3)
                    'rgba(75, 192, 192, 1)',     // Verde agua (Color 4)
                    'rgba(255, 99, 132, 1)',     // Rojo (Color 5)
                    'rgba(54, 162, 235, 1)',     // Azul (Color 6)
                    'rgba(255, 206, 86, 1)',     // Amarillo (Color 7)
                    'rgba(153, 102, 255, 1)'     // Morado (Color 8)
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- GRAFICAS POR RANGOS DE EDAD -->
<script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorRangoDeEdad').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Primera Infancia','Infancia','Adolescencia','Juventud','Adultez','Persona Mayor'],
            datasets: [{
                label: 'Número de registros',
                data: [
                    {{$totalPrimeraInfancia}}, 
                    {{$totalInfancia}},  
                    {{$totalAdolescencia}},  
                    {{$totalJuventud}},  
                    {{$totalAdultez}},  
                    {{$totalPersonaMayor}}, 
                ], 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',   // Color 1 - Rojo
                    'rgba(54, 162, 235, 0.5)',   // Color 2 - Azul
                    'rgba(255, 206, 86, 0.5)',   // Color 3 - Amarillo
                    'rgba(75, 192, 192, 0.5)',   // Color 4 - Verde agua
                    'rgba(153, 102, 255, 0.5)',  // Color 5 - Morado
                    'rgba(255, 159, 64, 0.5)'    // Color 6 - Naranja
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',     // Color 1
                    'rgba(54, 162, 235, 1)',     // Color 2
                    'rgba(255, 206, 86, 1)',     // Color 3
                    'rgba(75, 192, 192, 1)',     // Color 4
                    'rgba(153, 102, 255, 1)',    // Color 5
                    'rgba(255, 159, 64, 1)'      // Color 6
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- GRAFICAS POR AREA DONDE OCURRIO EL EVENTO -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficaAreaEventoAdverso').getContext('2d');
    
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'almacen',
                    'cendis',
                    'ceye',
                    'consultaExterna',
                    'dental',
                    'farmacia',
                    'hospitalizacion',
                    'imagenologia',
                    'laboratorio',
                    'medicinaPreventiva',
                    'nutricion',
                    'patologia',
                    'quirofano',
                    'saludReproductiva',
                    'tococirugia',
                    'UCIAdultos',
                    'UCINeonatales',
                    'UCIPediatricos',
                    'urgencias',
                ],
                datasets: [{
                    label: 'Número de registros',
                    data: [
                        {{ $almacen }},
                        {{ $cendis }},
                        {{ $ceye }},
                        {{ $consultaExterna }},
                        {{ $dental }},
                        {{ $farmacia }},
                        {{ $hospitalizacion }},
                        {{ $imagenologia }},
                        {{ $laboratorio }},
                        {{ $medicinaPreventiva }},
                        {{ $nutricion }},
                        {{ $patologia }},
                        {{ $quirofano }},
                        {{ $saludReproductiva }},
                        {{ $tococirugia }},
                        {{ $UCIAdultos }},
                        {{ $UCINeonatales }},
                        {{ $UCIPediatricos }},
                        {{ $urgencias }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',    // Rosa claro
                        'rgba(54, 162, 235, 0.5)',    // Azul claro
                        'rgba(255, 206, 86, 0.5)',    // Amarillo claro
                        'rgba(75, 192, 192, 0.5)',    // Verde agua claro
                        'rgba(153, 102, 255, 0.5)',   // Lila claro
                        'rgba(255, 159, 64, 0.5)',    // Naranja claro
                        'rgba(199, 199, 199, 0.5)',   // Gris claro
                        'rgba(255, 99, 71, 0.5)',     // Tomate claro
                        'rgba(32, 189, 185, 0.5)',    // Aqua oscuro
                        'rgba(255, 87, 34, 0.5)',     // Coral
                        'rgba(153, 255, 51, 0.5)',    // Verde lima
                        'rgba(255, 20, 147, 0.5)',    // Deep pink
                        'rgba(0, 255, 255, 0.5)',     // Cian
                        'rgba(255, 69, 0, 0.5)',      // Rojo oscuro
                        'rgba(138, 43, 226, 0.5)',    // Azul oscuro
                        'rgba(0, 128, 128, 0.5)',     // Verde azulado
                        'rgba(128, 0, 128, 0.5)',     // Púrpura
                        'rgba(210, 105, 30, 0.5)',    // Marrón chocolate
                        'rgba(244, 164, 96, 0.5)'     // Arena claro
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(255, 99, 71, 1)',
                        'rgba(32, 189, 185, 1)',
                        'rgba(255, 87, 34, 1)',
                        'rgba(153, 255, 51, 1)',
                        'rgba(255, 20, 147, 1)',
                        'rgba(0, 255, 255, 1)',
                        'rgba(255, 69, 0, 1)',
                        'rgba(138, 43, 226, 1)',
                        'rgba(0, 128, 128, 1)',
                        'rgba(128, 0, 128, 1)',
                        'rgba(210, 105, 30, 1)',
                        'rgba(244, 164, 96, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                        }
                    }
                }
            }
        });
    });
    </script>
    

<!-- GRAFICAS POR AREA DONDE OCURRIO EL EVENTO -->
<script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('graficaTurno').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Matutino', 
                'Vespertino',  
                'Nocturno',  
                'Jornada Acumulada',  
        
            ],
            datasets: [{
                label: 'Número de registros',
                data: [
                    {{$matutino}}, 
                    {{$vespertino}},  
                    {{$nocturno}},  
                    {{$jornadaAcumulada}},  
                ], 
                backgroundColor: [
                    'rgba(229, 57, 53, 0.5)',    // Red 600 (más intenso)
                    'rgba(30, 136, 229, 0.5)',   // Blue 600 (más intenso)
                    'rgba(253, 216, 53, 0.5)',   // Yellow 600 (más intenso)
                    'rgba(0, 137, 123, 0.5)'     // Teal 600 (más intenso)
                ],
                borderColor: [
                    'rgba(229, 57, 53, 1)',      // Red 600
                    'rgba(30, 136, 229, 1)',     // Blue 600
                    'rgba(253, 216, 53, 1)',     // Yellow 600
                    'rgba(0, 137, 123, 1)'       // Teal 600
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<script>
    // Esperamos a que el DOM esté completamente cargado
    document.addEventListener('DOMContentLoaded', function () {
        // Seleccionamos el elemento canvas
        var ctx = document.getElementById('myBarChart').getContext('2d');

        // Creamos la gráfica de barras
        var myBarChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica
            data: {
                labels: [
                    'Enero', 
                    'Febrero', 
                    'Marzo', 
                    'Abril', 
                    'Mayo', 
                    'Junio', 
                    'Julio', 
                    'Agosto', 
                    'Septiembre', 
                    'Octubre', 
                    'Noviembre', 
                    'Diciembre'
                ], // Etiquetas en el eje x
                datasets: [{
                    label: 'Registros por mes', // Etiqueta para el dataset
                    data: [
                        {{$enero2024}},
                        {{$febrero2024}},
                        {{$marzo2024}},
                        {{$abril2024}},
                        {{$mayo2024}},
                        {{$junio2024}},
                        {{$julio2024}},
                        {{$agosto2024}},
                        {{$septiembre2024}},
                        {{$octubre2024}},
                        {{$noviembre2024}},
                        {{$diciembre2024}}
                    ], // Datos para la gráfica
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',    // Enero - rojo base
                        'rgba(54, 162, 235, 0.5)',    // Febrero - azul base
                        'rgba(255, 206, 86, 0.5)',    // Marzo - amarillo base
                        'rgba(75, 192, 192, 0.5)',    // Abril - verde agua base
                        'rgba(153, 102, 255, 0.5)',   // Mayo - morado base
                        'rgba(255, 159, 64, 0.5)',    // Junio - naranja base
                        'rgba(255, 121, 135, 0.5)',   // Julio - rojo un poco más claro
                        'rgba(78, 169, 243, 0.5)',    // Agosto - azul más claro
                        'rgba(255, 215, 120, 0.5)',   // Septiembre - amarillo más suave
                        'rgba(85, 204, 204, 0.5)',    // Octubre - verde agua más claro
                        'rgba(178, 138, 255, 0.5)',   // Noviembre - morado más claro
                        'rgba(255, 180, 100, 0.5)'    // Diciembre - naranja más suave
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',      // Enero
                        'rgba(54, 162, 235, 1)',      // Febrero
                        'rgba(255, 206, 86, 1)',      // Marzo
                        'rgba(75, 192, 192, 1)',      // Abril
                        'rgba(153, 102, 255, 1)',     // Mayo
                        'rgba(255, 159, 64, 1)',      // Junio
                        'rgba(255, 99, 132, 1)',      // Julio (mismo rojo que enero en borde)
                        'rgba(54, 162, 235, 1)',      // Agosto
                        'rgba(255, 206, 86, 1)',      // Septiembre
                        'rgba(75, 192, 192, 1)',      // Octubre
                        'rgba(153, 102, 255, 1)',     // Noviembre
                        'rgba(255, 159, 64, 1)'       // Diciembre
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Inicia el eje y en cero
                    }
                }
                
            }
        });
    });
</script>

<!-- GRAFICAS POR TIPO DE INCIDENTE -->
    <script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorTipoIncidente').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['AESP','MMU','PCI','DEB','ACC','PFR','SAD','NUT','ASC','MCI','OTRO'],
            datasets: [{
                label: 'Número de votos',
                data: [{{$tipoAESP}}, {{$tipoMMU}}, {{$tipoPCI}},{{$tipoDEB}},{{$tipoACC}},{{$tipoPFR}},{{$tipoSAP}},{{$tipoNUT}},{{$tipoASC}},{{$tipoMCI}},{{$tipoOTRO}},], 
                backgroundColor: [
                    'rgba(244, 67, 54, 0.5)',    // Red 500
                    'rgba(233, 30, 99, 0.5)',    // Pink 500
                    'rgba(156, 39, 176, 0.5)',   // Purple 500
                    'rgba(103, 58, 183, 0.5)',   // Deep Purple 500
                    'rgba(63, 81, 181, 0.5)',    // Indigo 500
                    'rgba(33, 150, 243, 0.5)',   // Blue 500
                    'rgba(3, 169, 244, 0.5)',    // Light Blue 500
                    'rgba(0, 188, 212, 0.5)',    // Cyan 500
                    'rgba(0, 150, 136, 0.5)',    // Teal 500
                    'rgba(76, 175, 80, 0.5)',    // Green 500
                    'rgba(139, 195, 74, 0.5)'    // Light Green 500
                ],
                borderColor: [
                    'rgba(244, 67, 54, 1)',
                    'rgba(233, 30, 99, 1)',
                    'rgba(156, 39, 176, 1)',
                    'rgba(103, 58, 183, 1)',
                    'rgba(63, 81, 181, 1)',
                    'rgba(33, 150, 243, 1)',
                    'rgba(3, 169, 244, 1)',
                    'rgba(0, 188, 212, 1)',
                    'rgba(0, 150, 136, 1)',
                    'rgba(76, 175, 80, 1)',
                    'rgba(139, 195, 74, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- GRAFICAS POR GRAVEDAD DEL DAÑO -->
    <script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorGravedadDelDano').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Sin Daño','Bajo','Moderado','Grave','Muerte'],
            datasets: [{
                label: 'Número de votos',
                data: [{{$sinDano}}, {{$bajo}}, {{$moderado}},{{$grave}},{{$muerte}}], 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',   // Rosa vivo (similar coral suave)
                    'rgba(54, 162, 235, 0.5)',   // Azul brillante (similar turquesa pastel)
                    'rgba(75, 192, 192, 0.5)',   // Verde agua (similar verde lima suave)
                    'rgba(255, 206, 86, 0.5)',   // Amarillo vibrante (similar mostaza claro)
                    'rgba(153, 102, 255, 0.5)'   // Violeta fuerte (similar violeta pastel)
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- GRAFICAS PERSONA DIRECTAMENTE INVOLUCRADA -->
    <script>
    // Espera a que el contenido del DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPersonaDirectamenteInvolucrada').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Administrativo','Camillero','Enfermería','Médico','Nutriólogo','Odontólogo','Otro','Personal En Formación','Químico','Radiólogo'],
            datasets: [{
                label: 'Número de votos',
                data: [{{$PDIAdministrativo}}, {{$PDICamillero}}, {{$PDIEnfermeria}},{{$PDIMedico}},{{$PDINutriologo}},{{$PDIOdontologo}},{{$PDIOtro}},{{$PDIPersonalEnFormacion}},{{$PDIQuimico}},{{$PDIRadiologo}}], 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',   // Rojo vibrante
                    'rgba(255, 159, 64, 0.5)',   // Naranja
                    'rgba(255, 205, 86, 0.5)',   // Amarillo
                    'rgba(75, 192, 192, 0.5)',   // Verde agua
                    'rgba(54, 162, 235, 0.5)',   // Azul cielo
                    'rgba(153, 102, 255, 0.5)',  // Morado
                    'rgba(201, 203, 207, 0.5)',  // Gris suave
                    'rgba(255, 99, 255, 0.5)',   // Rosa fuerte
                    'rgba(0, 191, 255, 0.5)',    // Azul profundo
                    'rgba(60, 179, 113, 0.5)'    // Verde medio
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)',
                    'rgba(255, 99, 255, 1)',
                    'rgba(0, 191, 255, 1)',
                    'rgba(60, 179, 113, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const total = tooltipItem.chart._metasets[tooltipItem.datasetIndex].total;
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
});

</script>


@stop