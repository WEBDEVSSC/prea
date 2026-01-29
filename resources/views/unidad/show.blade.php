@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Unidad</strong> | <small>Detalles</small></h1>
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

    <!-- -------------------------------------------------------------- -->

    <div class="card card-info  mt-3">

        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

        <div class="card-body">   
            
            <div class="row">
                <div class="col-md-3">

                    <p><strong>CLUES</strong></p>
                   
                    {{ $unidad->clues }}
                    
                </div>

                <div class="col-md-3">

                    <p><strong>Jurisdicción</strong></p>
                   
                    {{ $unidad->jurisdiccion }}
                    
                </div>

                <div class="col-md-6">

                    <p><strong>Nombre</strong></p>
                   
                    {{ $unidad->nombre }}
                    
                </div>

            </div>

            <!-- -------------------------------- -->

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <a href="{{ route('unidadDestroy',['id'=>$unidad->id]) }}" class="btn btn-info btn-sm float-right">ELIMINAR</a>
            <a href="{{ route('unidadEdit',['id'=>$unidad->id]) }}" class="btn btn-info btn-sm float-right mr-2">EDITAR</a>

            <a href="#" class="btn btn-info btn-sm float-right btn-delete-unidad" data-id="{{ $unidad->id }}"> ELIMINARRRRRR </a>

            <form id="delete-form-{{ $unidad->id }}"
                action="{{ route('unidadDestroy', ['id' => $unidad->id]) }}"
                method="POST"
                style="display:none;">
                @csrf
                @method('DELETE')
            </form>
            
        </div>

    </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-delete-unidad').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();

                    let id = this.getAttribute('data-id');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción no eliminará el registro definitivamente',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                });
            });
        });
    </script>

    
@stop