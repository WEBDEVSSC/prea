@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Categorias')

@section('content_header')
    <h1><strong>Categorías</strong> <small>Detalles</small></h1>
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

@if(session('successOpcion') || session('updateOpcion') || session('destroyOpcion'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Éxito',
            text: "{{ session('successOpcion') ?? session('updateOpcion') ?? session('destroyOpcion') }}",
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

                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Categoría :</strong> {{ $categoria->categoria }}</p>                             
                        </div>
            
                    </div>
                    
                </div>
            </div>

        </div><!-- CARD BODY -->

        <div class="card-footer">

            <a href="javascript:void(0);" onclick="confirmarEliminacion({{ $categoria->id }})" class="btn btn-danger btn-sm float-right mr-2">
                ELIMINAR
            </a>

            <a href="{{ route('categoriaEdit',['id'=>$categoria->id]) }}" class="btn btn-info btn-sm float-right mr-2">EDITAR</a>            
            
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="card">
        <div class="card-header">
            <a href="{{ route('opcionCreate', $categoria->id) }}" class="btn btn-info btn-sm float-right mr-2"> NUEVO REGISTRO</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Opción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opciones as $opcion)
                        <tr>
                            <td>{{ $opcion->id }}</td>
                            <td>{{ $opcion->opcion }}</td>
                            <td>

                                <a href="javascript:void(0);" onclick="confirmarEliminacionOpcion({{ $opcion->id }})" class="btn btn-danger btn-sm float-right mr-2">
                                    ELIMINAR
                                </a>

                                <a href="{{ route('opcionEdit',['id'=>$opcion->id]) }}" class="btn btn-info btn-sm float-right mr-2">EDITAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>

    
@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('categoriaDelete', ['id' => '__id__']) }}".replace('__id__', id);
                }
            });
        }
    </script>

<script>
    function confirmarEliminacionOpcion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('opcionDelete', ['id' => '__id__']) }}".replace('__id__', id);
            }
        });
    }
</script>
@stop