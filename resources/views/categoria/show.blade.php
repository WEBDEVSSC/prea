@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Categorias')

@section('content_header')
    <h1><strong>Categorias</strong> <small>Detalles</small></h1>
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
            <a class="btn btn-info btn-sm float-right" href="{{ route('categoriaIndex') }}">PANEL DE CONTROL</a>
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
                    
                <form action="{{ route('usuariosUpdate', $categoria->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-3">
                            <p><strong>Nombre</strong></p>
                            {{ $categoria->categoria }}
                        </div>
            
                    </div>
                    
                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <a href="{{ route('categoriaEdit',['id'=>$categoria->id]) }}" class="btn btn-info btn-sm float-right mr-2">EDITAR</a>
            
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