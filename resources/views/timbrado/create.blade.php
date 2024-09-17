@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Timbrado</strong></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('timbradoIndex') }}">Panel de Control</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo registro</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-header">
            <h3 class="card-title">Lista de correos registrados para timbrado</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    
                <form action="{{ route('timbradoStore') }}" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <p>Correo</p>
                            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">
                            @error('correo')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <p>Área</p>
                            <input type="text" name="area" class="form-control" value="{{ old('area') }}">
                            @error('area')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">

                        <button type="submit" class="btn btn-success">Registrar datos</button>

                        </div>
                    </div>

                    </form>

                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">
            
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop