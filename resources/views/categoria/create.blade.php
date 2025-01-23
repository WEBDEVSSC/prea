@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1><strong>Categorias</strong> <small>Nuevo registro</small></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------- -->

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('categoriaIndex') }}" class="btn btn-info btn-sm float-right">PANEL DE CONTROL</a>
        </div>
    </div>

    <div class="card card-info  mt-3">

        <div class="card-header">
            
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    
                <form action="{{ route('categoriaStore') }}" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <p>Nombre</p>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                            @error('nombre')
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

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop