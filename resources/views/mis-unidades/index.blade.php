@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Unidades')

@section('content_header')
    <h1><strong>Mis unidades</strong></h1>
@stop

@section('content')

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    @if($unidades->isEmpty())
                        <p>No hay correos disponibles.</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Clues</th>
                                <th>Jurisdicción</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unidades as $unidad)
                                <tr>
                                    <td>{{ $unidad->nombre }}</td>
                                    <td>{{ $unidad->clues }}</td>
                                    <td>{{ $unidad->jurisdiccion }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop