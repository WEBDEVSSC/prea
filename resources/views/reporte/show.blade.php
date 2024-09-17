@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Reporte</strong></h1>
@stop

@section('content')


    

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Panel de Control</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-header">
            <h3 class="card-title">Conteo de Eventos por Unidad <small>{{ $fechaInicio }} - {{ $fechaFin }}</small></h3>
        </div>

        <div class="card-body">   

        
        
        @if($eventos->isEmpty())
        <p>No se encontraron eventos para el rango de fechas seleccionado.</p>
        @else

        <table class="table">
            <thead>
                <tr>
                    <th>Unidad</th>
                    <th>Total de Eventos</th>
                </tr>
            </thead>
            <tbody>
            @foreach($conteoPorUnidad as $unidadId => $conteo)
                    <tr>
                        <td>{{ $unidades->get($unidadId) }}</td> <!-- Muestra el nombre de la unidad -->
                        <td>{{ $conteo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
        
        </div><!-- CARD BODY -->

        <div class="card-footer">
            
        </div>

        </form>
    </div>

    <!-- -------------------------------------------------------------- -->
    
@stop

@section('footer')
<p>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong> | Subdirección de Calidad y Certificación [Nombre programa] | Unidad de Planeación [Departamento de Tecnologías de la Información]</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop