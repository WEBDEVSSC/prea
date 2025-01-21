@extends('adminlte::page')

@section('title', 'Unidades')

@section('content_header')
    <h1><strong>Unidades</strong> <small>Nuevo registro</small></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info">

        <div class="card-header">
            
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    
                <form action="{{ route('unidadStore') }}" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <p>CLUES</p>
                            <input type="text" name="clues" class="form-control" value="{{ old('clues') }}">
                            @error('clues')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>Jurisdicción</p>
                            <select name="jurisdiccion" id="jurisdiccion" class="form-control">
                                <option value="">[ Selecciona una opción ]</option>
                                <option value="1">1 - Piedras Negras</option>
                                <option value="2">2 - Acuña</option>
                                <option value="3">3 - Sabinas</option>
                                <option value="4">4 - Monclova</option>
                                <option value="5">5 - Cuatro Cienégas</option>
                                <option value="6">6 - Torreón</option>
                                <option value="7">7 - Fco. I. Madero</option>
                                <option value="8">8 - Saltillo</option>
                            </select>
                            @error('area')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <p>Unidad</p>
                            <input type="text" name="unidad" class="form-control" value="{{ old('unidad') }}">
                            @error('unidad')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <p>Categoria</p>
                            <input type="text" name="categoria" class="form-control" value="{{ old('categoria') }}">
                            @error('categoria')
                                <br><div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <button type="submit" class="btn btn-info btn-sm float-right">REGISTRAR DATOS</button>
            
        </div>
    </div>
</form>
    <!-- -------------------------------------------------------------- -->

    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop