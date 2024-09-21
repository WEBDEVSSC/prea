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
            <h3 class="card-title">Lista de eventos</h3>
        </div>

        <a href="{{ route('reporteExcel') }}">Excel</a>

        <div class="card-body">   
        <form action=" {{ route('reporteSearch') }} " method="POST">

        @csrf
            <div class="row">
                <div class="col-md-3">

                    <p><strong>Fecha de inicio de búsqueda</strong></p>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio') }}">
                    @error('fecha_inicio')
                        <br><div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                </div>
                <div class="col-md-3">

                    <p><strong>Fecha límite de búsqueda</strong></p>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}">
                    @error('fecha_fin')
                        <br><div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                </div>
            </div>
        
        </div><!-- CARD BODY -->

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Buscar registros</button>
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