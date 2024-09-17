@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Timbrado')

@section('content_header')
    <h1><strong>Timbrado</strong></h1>
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
            <a href="{{ route('timbradoCreate') }}" class="btn btn-info float-right">Nuevo registro</a>
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
                    @if($correos->isEmpty())
                        <p>No hay correos disponibles.</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Correo</th>
                                <th>Área</th>
                                <th>Fecha de creación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($correos as $correo)
                                <tr>
                                    <td>{{ $correo->correo }}</td>
                                    <td>{{ $correo->area }}</td>
                                    <td>{{ $correo->created_at }}</td>
                                    <td>
                                        <a href="{{ route('timbradoEdit',['id'=>$correo->id]) }}" class="btn btn-success btn-sm">Editar</a>
                                        <a href="{{ route('timbradoDestroy', ['id'=>$correo->id]) }}" class="btn btn-success btn-sm">Eliminar</a>
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