@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('plugins.Datatables', true)

@section('title', 'Unidades')

@section('content_header')
    <h1><strong>Unidades</strong> <small>Panel de Control</small></h1>
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
            <a href="{{ route('unidadCreate') }}" class="btn btn-info btn-sm float-right">NUEVO REGISTRO</a>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-12">
                    @if($unidades->isEmpty())
                        <p>No hay correos disponibles.</p>
                    @else
                    <table class="table table-striped" id="table">
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
                                        <a href="{{ route('unidadShow',['id'=>$unidad->id]) }}" class="btn btn-info btn-sm">DETALLES</a>
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

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script>$(document).ready( function () {
        $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    } );
    </script>
@stop