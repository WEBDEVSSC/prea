@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Eventos</strong> | <small>Panel de Control</small></h1>
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

    <div class="card card-info mt-3">

        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

        <div class="card-body">  
            
            
            
            <div class="row">
                <div class="col-md-12">
                    @if($eventos->isEmpty())
                        <p>No hay eventos disponibles.</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Clasificación</th>
                                <th>Folio</th>
                                <th>Unidad</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventos as $evento)
                                <tr>
                                    <td>{{ $evento->id }}</td>
                                    <td>
                                        @if($evento->clasificacion_del_evento == 'CUASI-FALLA')
                                            <span class="badge badge-success">{{ $evento->clasificacion_del_evento }}</span>
                                        @elseif($evento->clasificacion_del_evento == 'EVENTO ADVERSO')
                                        <span class="badge badge-warning">{{ $evento->clasificacion_del_evento }}</span>
                                        @elseif($evento->clasificacion_del_evento == 'EVENTO CENTINELA')
                                        <span class="badge badge-danger">{{ $evento->clasificacion_del_evento }}</span>
                                        @else
                                            <span>{{ $evento->clasificacion_del_evento }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $evento->folio }}</td>
                                    <td>{{ $evento->unidad }} - {{ $evento->unidad_nombre}}</td>
                                    <td>{{ $evento->incidente_categoria_label }}<br>{{ $evento->incidente_descripcion_label }}</td>
                                    <td>
                                        <a href="{{ route('eventoShow',['id'=>$evento->id]) }}" class="btn btn-info btn-sm btn-block">DETALLES</a>
                                        <a href="{{ route('eventoPDF',['id'=>$evento->id]) }}" class="btn btn-warning btn-sm btn-block" target="_blank">PDF</a>
                                        <hr>
                                        @auth
                                            @if (auth()->user()->role === 'admin')
                                                <form action="{{ route('eventoDestroy', $evento->id) }}" method="POST" class="form-eliminar d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-block">ELIMINAR</button>
                                                </form>
                                            @endif
                                        @endauth
        

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-eliminar');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault(); // prevenir envío inmediato

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción no se puede deshacer!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // enviar formulario si se confirma
                        }
                    });
                });
            });
        });
    </script>
@stop