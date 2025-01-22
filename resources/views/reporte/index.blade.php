@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Reportes')

@section('content_header')
    <h1><strong>Reporte</strong></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title">Excel por fechas</h3>
        </div>

        <form action="{{ route('reporteExcel') }}" method="get">
        @csrf
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Fecha de inicio</strong></p>
                    <input type="date" name="inicio" class="form-control">
                </div>
                <div class="col-md-6">
                    <p><strong>Fecha de fin</strong></p>
                    <input type="date" name="fin" class="form-control">
                </div>
            </div>
        
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info btn-sm float-right">GENERAR EXCEL</button>
        </div>
        
        </form>

    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info mt-3">

        <div class="card-header">
            <h3 class="card-title">Conteo de eventos por unidad</h3>
        </div>

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
            <button type="submit" class="btn btn-info btn-sm float-right">CONTAR EVENTOS</button>
        </div>

        </form>

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