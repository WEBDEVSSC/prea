@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Categorias')

@section('content_header')
    <h1><strong>Categorias</strong> <small>Panel de Control</small></h1>
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
            <a href="{{ route('categoriaCreate') }}" class="btn btn-info btn-sm float-right">NUEVO REGISTRO</a>
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
                    @if($categorias->isEmpty())
                        <p>No hay registros disponibles.</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>                           
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                    
                                    <td>{{ $categoria->categoria }}</td>
                                    
                                    <td>
                                        <a href="{{ route('categoriaShow',['id'=>$categoria->id]) }}" class="btn btn-info btn-sm btn-block">DETALLES</a>
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