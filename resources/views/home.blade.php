@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1><strong>Dashboard </strong><small><?php echo date('Y'); ?></small></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------------- -->

    @if($usuario->role == "admin")

        <!-- INICIO DE LAS GRAFICAS PARA EL USUARIO ADMIN -->

        <div class="row">
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CUASI-FALLA</span>
                        <span class="info-box-number">{{ $cuasiFalla }}</span>
                    </div>            
                </div>
    
            </div>
            
    
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ADVERSO</span>
                        <span class="info-box-number">{{ $eventoAdverso }}</span>
                    </div>            
                </div>
    
            </div>
    
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CENTINELA</span>
                        <span class="info-box-number">{{ $eventoCentinela }}</span>
                    </div>            
                </div>
    
            </div>
    
            <div class="col-md-3">
    
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number">{{ $totalEvento }}</span>
                    </div>            
                </div>
    
            </div>
        </div>
    
        <!-- -------------------------------------------------------------------- -->

        
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
    
            <div class="col-md-9">
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Resumen por mes</strong></h3>
                </div>
                <div class="card-body">
    
                            <div>
                                <canvas id="myBarCharts" width="400" height="407"></canvas>
                            </div>
    
                </div>
            </div>
    
            </div>
        </div>

        <!-- ------------------------------------------------------------------ -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong></strong></div>
                    <div class="card-body">
                        
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------------ -->

        

        <!-- FIN DE LAS GRAFICAS PARA EL USUARIO ADMIN -->
    
    @else
    
        
    
    @endif

    


@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
                        label: 'Adverso',
                        data: datosPorTipo.Adverso,
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Cuasifalla',
                        data: datosPorTipo.Cuasifalla,
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Centinela',
                        data: datosPorTipo.Centinela,
                        backgroundColor: 'rgba(255, 206, 86, 0.8)',
                        borderColor: 'rgba(255, 206, 86, 1)',
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
                    'rgba(133, 193, 233, 0.2)',
                    'rgba(195, 155, 211, 0.2)'
                ],
                borderColor: [
                    'rgba(133, 193, 233, 1)',
                    'rgba(195, 155, 211, 1)'
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
                            return tooltipItem.label + ': ' + tooltipItem.raw;
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
                    'rgba(133, 193, 233, 0.2)', // Color 1
                    'rgba(195, 155, 211, 0.2)', // Color 2
                    'rgba(255, 159, 64, 0.2)',  // Color 3
                    'rgba(75, 192, 192, 0.2)',  // Color 4
                    'rgba(255, 99, 132, 0.2)',  // Color 5
                    'rgba(54, 162, 235, 0.2)',  // Color 6
                    'rgba(255, 206, 86, 0.2)',  // Color 7
                    'rgba(153, 102, 255, 0.2)'  // Color 8
                ],
                borderColor: [
                    'rgba(133, 193, 233, 1)', // Color 1
                    'rgba(195, 155, 211, 1)', // Color 2
                    'rgba(255, 159, 64, 1)',  // Color 3
                    'rgba(75, 192, 192, 1)',  // Color 4
                    'rgba(255, 99, 132, 1)',  // Color 5
                    'rgba(54, 162, 235, 1)',  // Color 6
                    'rgba(255, 206, 86, 1)',  // Color 7
                    'rgba(153, 102, 255, 1)'  // Color 8
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
                            return tooltipItem.label + ': ' + tooltipItem.raw;
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
                    'rgba(255, 99, 132, 0.2)', // Color 1
                    'rgba(54, 162, 235, 0.2)', // Color 2
                    'rgba(255, 206, 86, 0.2)', // Color 3
                    'rgba(75, 192, 192, 0.2)', // Color 4
                    'rgba(153, 102, 255, 0.2)', // Color 5
                    'rgba(255, 159, 64, 0.2)', // Color 6
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Color 1
                    'rgba(54, 162, 235, 1)', // Color 2
                    'rgba(255, 206, 86, 1)', // Color 3
                    'rgba(75, 192, 192, 1)', // Color 4
                    'rgba(153, 102, 255, 1)', // Color 5
                    'rgba(255, 159, 64, 1)', // Color 6
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
                            return tooltipItem.label + ': ' + tooltipItem.raw;
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
                        'rgba(255, 99, 132, 0.2)',    // Rosa claro
                        'rgba(54, 162, 235, 0.2)',    // Azul claro
                        'rgba(255, 206, 86, 0.2)',    // Amarillo claro
                        'rgba(75, 192, 192, 0.2)',    // Verde agua claro
                        'rgba(153, 102, 255, 0.2)',   // Lila claro
                        'rgba(255, 159, 64, 0.2)',    // Naranja claro
                        'rgba(199, 199, 199, 0.2)',   // Gris claro
                        'rgba(255, 99, 71, 0.2)',     // Tomate claro
                        'rgba(32, 189, 185, 0.2)',    // Aqua oscuro
                        'rgba(255, 87, 34, 0.2)',     // Coral
                        'rgba(153, 255, 51, 0.2)',    // Verde lima
                        'rgba(255, 20, 147, 0.2)',    // Deep pink
                        'rgba(0, 255, 255, 0.2)',     // Cian
                        'rgba(255, 69, 0, 0.2)',      // Rojo oscuro
                        'rgba(138, 43, 226, 0.2)',    // Azul oscuro
                        'rgba(0, 128, 128, 0.2)',     // Verde azulado
                        'rgba(128, 0, 128, 0.2)',     // Púrpura
                        'rgba(210, 105, 30, 0.2)',    // Marrón chocolate
                        'rgba(244, 164, 96, 0.2)'     // Arena claro
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
                                return tooltipItem.label + ': ' + tooltipItem.raw;
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
                    'rgba(255, 99, 132, 0.2)', // Rosa claro
                    'rgba(54, 162, 235, 0.2)', // Azul claro
                    'rgba(255, 206, 86, 0.2)', // Amarillo claro
                    'rgba(75, 192, 192, 0.2)', // Verde agua claro
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Rosa
                    'rgba(54, 162, 235, 1)', // Azul
                    'rgba(255, 206, 86, 1)', // Amarillo
                    'rgba(75, 192, 192, 1)', // Verde agua
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
                            return tooltipItem.label + ': ' + tooltipItem.raw;
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
                            'rgba(255, 99, 132, 0.2)', // Color para Enero
                            'rgba(54, 162, 235, 0.2)', // Color para Febrero
                            'rgba(255, 206, 86, 0.2)', // Color para Marzo
                            'rgba(75, 192, 192, 0.2)', // Color para Abril
                            'rgba(153, 102, 255, 0.2)', // Color para Mayo
                            'rgba(255, 159, 64, 0.2)', // Color para Junio
                            'rgba(255, 99, 132, 0.2)', // Color para Julio
                            'rgba(54, 162, 235, 0.2)', // Color para Agosto
                            'rgba(255, 206, 86, 0.2)', // Color para Septiembre
                            'rgba(75, 192, 192, 0.2)', // Color para Octubre
                            'rgba(153, 102, 255, 0.2)', // Color para Noviembre
                            'rgba(255, 159, 64, 0.2)'  // Color para Diciembre
                        ],
                    borderColor: [
                            'rgba(255, 99, 132, 1)', // Color del borde para Enero
                            'rgba(54, 162, 235, 1)', // Color del borde para Febrero
                            'rgba(255, 206, 86, 1)', // Color del borde para Marzo
                            'rgba(75, 192, 192, 1)', // Color del borde para Abril
                            'rgba(153, 102, 255, 1)', // Color del borde para Mayo
                            'rgba(255, 159, 64, 1)', // Color del borde para Junio
                            'rgba(255, 99, 132, 1)', // Color del borde para Julio
                            'rgba(54, 162, 235, 1)', // Color del borde para Agosto
                            'rgba(255, 206, 86, 1)', // Color del borde para Septiembre
                            'rgba(75, 192, 192, 1)', // Color del borde para Octubre
                            'rgba(153, 102, 255, 1)', // Color del borde para Noviembre
                            'rgba(255, 159, 64, 1)'  // Color del borde para Diciembre
                        ],
                    borderWidth: 1 // Ancho del borde
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




@stop