@extends('adminlte::page')

@section('title', 'Unidades')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('unidadIndex') }}">Panel de Control</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo registro</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-header">
            <h3 class="card-title">Lista de unidades registradas</h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    
                <form action="{{ route('unidadUpdate',$unidad->id) }}" method="POST">

                    @csrf

                    @method('PUT')

                    <div class="row">
                        <div class="col-md-3">
                            <p>CLUES</p>
                            <input type="text" name="clues" class="form-control" value="{{ $unidad->clues }}">
                            @error('clues')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>Jurisdicción</p>
                            <select name="jurisdiccion" id="jurisdiccion" class="form-control">
                                <option value="" {{ empty($unidad->jurisdiccion) ? 'selected' : '' }}>[ Selecciona una opción ]</option>
                                <option value="1" {{ $unidad->jurisdiccion == '1' ? 'selected' : '' }}>1 - Piedras Negras</option>
                                <option value="2" {{ $unidad->jurisdiccion == '2' ? 'selected' : '' }}>2 - Acuña</option>
                                <option value="3" {{ $unidad->jurisdiccion == '3' ? 'selected' : '' }}>3 - Sabinas</option>
                                <option value="4" {{ $unidad->jurisdiccion == '4' ? 'selected' : '' }}>4 - Monclova</option>
                                <option value="5" {{ $unidad->jurisdiccion == '5' ? 'selected' : '' }}>5 - Cuatro Cienégas</option>
                                <option value="6" {{ $unidad->jurisdiccion == '6' ? 'selected' : '' }}>6 - Torreón</option>
                                <option value="7" {{ $unidad->jurisdiccion == '7' ? 'selected' : '' }}>7 - Fco. I. Madero</option>
                                <option value="8" {{ $unidad->jurisdiccion == '8' ? 'selected' : '' }}>8 - Saltillo</option>
                            </select>
                            @error('area')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <p>Unidad</p>
                            <input type="text" name="nombre" class="form-control" value="{{ $unidad->nombre }}">
                            @error('nombre')
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