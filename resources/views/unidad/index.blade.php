@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Unidades')

@section('content_header')
    <h1><strong>Unidades</strong></h1>
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
    

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Panel de Control</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('unidadCreate') }}" class="btn btn-info float-right">Nuevo registro</a>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-header">
            <h3 class="card-title">Lista de correos</h3>
        </div>

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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unidades as $unidad)
                                <tr>
                                    <td>{{ $unidad->nombre }}</td>
                                    <td>{{ $unidad->clues }}</td>
                                    <td>{{ $unidad->jurisdiccion }}</td>
                                    <td>
                                        <a href="{{ route('unidadEdit',['id'=>$unidad->id]) }}" class="btn btn-success btn-sm">Editar</a>
                                        <a href="{{ route('unidadDestroy',['id'=>$unidad->id]) }}" class="btn btn-success btn-sm">Eliminar</a>
                                    </td>
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