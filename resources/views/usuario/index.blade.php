@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Unidades')

@section('content_header')
    <h1><strong>Usuarios</strong> <small>Panel de Control</small></h1>
@stop

@section('content')

<!-- --------------------------------------------------------------------------------- -->

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

    <!-- --------------------------------------------------------------------------------- -->

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('usuarioCreate') }}" class="btn btn-info btn-sm float-right">NUEVO REGISTRO</a>
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
                    @if($usuarios->isEmpty())
                        <p>No hay registros disponibles.</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nivel</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>CLUES</th>                                
                                <th><center>C-F</center></th>                                
                                <th><center>ADV</center></th>                                
                                <th><center>CEN</center></th>                                
                                <th><center>REP MEN</center></th>                           
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>
                                        @if($usuario->nivel == 1)
                                        <span class="badge badge-success">ADMINISTRADOR</span>
                                        @elseif($usuario->nivel == 2)
                                        <span class="badge badge-warning">JURISDICCIÓN</span>
                                        @elseif($usuario->nivel == 3)
                                        <span class="badge badge-info">UNIDAD</span>
                                        @endif
                                    </td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>J.{{ $usuario->clues_jurisdiccion }} - {{ $usuario->clues_nombre }}</td>
                                    <td>
                                        <center>
                                        @if ($usuario->cuasifalla == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        @endif
                                        @if ($usuario->bot_cuasifalla == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-asterisk"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-asterisk"></i>
                                            </button>
                                        @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                        @if ($usuario->adverso == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        @endif
                                        @if ($usuario->bot_adverso == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-asterisk"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-asterisk"></i>
                                            </button>
                                        @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                        @if ($usuario->centinela == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        @endif
                                        @if ($usuario->bot_centinela == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-asterisk"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-asterisk"></i>
                                            </button>
                                        @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                        @if ($usuario->reporte_semanal == 1)
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-bookmark"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-bookmark"></i>
                                            </button>
                                        @endif
                                        </center>
                                    </td>

                                    
                                    <td>
                                        <a href="{{ route('usuarioShow',['id'=>$usuario->id]) }}" class="btn btn-info btn-sm btn-block">DETALLES</a>
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
@stop