@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Eventos</strong></h1>
@stop

@section('content')

@if(session('success') || session('update') || session('destroy'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('success') ?? session('update') ?? session('destroy') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif


    <!-- -------------------------------------------------------------- -->

    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title">Datos generales</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-3">

                    <p><strong>Clasificación del evento</strong></p>
                   
                    {{ $evento->clasificacion_del_evento }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Unidad</strong></p>
                   
                    {{ $evento->unidad }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Edad</strong></p>
                   
                    {{ $evento->edad }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Sexo</strong></p>
                   
                    {{ $evento->sexo }}
                    
                </div>
            </div>

            <!-- -------------------------------- -->

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title">Descripción del evento adverso</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-3">

                    <p><strong>¿En qué lugar o área ocurrió el evento adverso?</strong></p>
                   
                    {{ $evento->servicio }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Turno</strong></p>
                   
                    {{ $evento->turno }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Fecha y hora</strong></p>
                   
                    {{ $evento->fecha_hora }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Persona directamente involucrada</strong></p>
                   
                    {{ $evento->persona_involucrada }}
                    
                </div>
            </div>

            <!-- -------------------------------- -->

            <div class="row mt-3">
                <div class="col-md-3">

                    <p><strong>Personas que presenciarón</strong></p>
                   
                    {{ $evento->persona_testigos }}

                </div>
            </div>

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title">Descripción detallada del evento</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                
                    {{ $evento->descripcion }}
                    
                </div>
            </div>

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title">Tipo de incidente</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-6">
                
                    <p><strong>Categoría </strong></p>{{ $categoria_nombre }}
                    
                </div>
                <div class="col-md-6">
                
                    <p><strong>Opción </strong></p>{{ $descripcion_nombre }}
                    
                </div>
            </div>

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->

    <div class="card card-info mt-3">

        <div class="card-header">
            <h3 class="card-title">Gravedad del daño</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                
                    {{ $evento->gravedad }}
                    
                </div>
            </div>

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->

    <div class="card card-info mt-3">

        <div class="card-header">
            <h3 class="card-title">Factores del incidente</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                
                <p>
                    @if($factorIncidenteUno)
                        Relacionados con las características del paciente
                    @else
                        <del>Relacionados con las características del paciente</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteDos)
                        Relacionados con la aplicación de las indicaciones, protocolos, manuales, lineamientos y guías de práctica clínica.
                    @else
                        <del>Relacionados con la aplicación de las indicaciones, protocolos, manuales, lineamientos y guías de práctica clínica.</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteTres)
                        Individuales asociadas con los integrantes del equipo.
                    @else
                        <del>Individuales asociadas con los integrantes del equipo.</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteCuatro)
                        Relacionados con el trabajo en equipo.
                    @else
                        <del>Relacionados con el trabajo en equipo.</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteCinco)
                        Relacionados con el ambiente de trabajo y el entorno.
                    @else
                        <del>Relacionados con el ambiente de trabajo y el entorno.</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteSeis)
                        Organizacionales del establecimiento de atención médica.
                    @else
                        <del>Organizacionales del establecimiento de atención médica.</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteSiete)
                        Institucionales o del ambiente externo.
                    @else
                        <del>Institucionales o del ambiente externo.</del>
                    @endif
                </p>

                <p>
                    @if($factorIncidenteOcho)
                        Otro
                    @else
                        <del>Otro</del>
                    @endif
                </p>
                    
                </div>
            </div>

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info mt-3">

        <div class="card-header">
            <h3 class="card-title">Evitabilidad</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-6">
                    <p><strong>¿Considera que se pudo haber evitado el evento adverso?</strong></p>
                    {{ $evento->evitar_evento }}                    
                </div>
                <div class="col-md-6">
                    <p><strong>¿Cómo considera que pudo haberse evitado el evento adverso?</strong></p>
                    {{ $evento->como_evitar_evento }}                    
                </div>
            </div>

            <!-- -------------------------------------- -->

            <div class="row mt-3">
                <div class="col-md-6">
                    <p><strong>¿Se le proporcionó información al paciente o a su familiar relacionada con el evento adverso?</strong></p>
                    {{ $evento->proporciono_informacion }}                    
                </div>
                <div class="col-md-6">
                    <p><strong>¿Quién la proporcionó?</strong></p>
                    {{ $evento->quien_proporciono }}                    
                </div>
            </div>

        </div><!-- CARD BODY -->

    </div>

    <!-- -------------------------------------------------------------- -->


@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop