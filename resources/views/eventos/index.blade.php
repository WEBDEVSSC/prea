@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Eventos</strong></h1>
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

    <p>Tu nivel es: {{ Auth::user()->nivel }}</p>
    <p>Tu categoria es: {{ Auth::user()->categoria }}</p>

    <!-- -------------------------------------------------------------- -->

    <div class="card card-purple  mt-3">

        <div class="card-header">
            <h3 class="card-title">Lista de eventos</h3>
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
                                    <td>
                                        <a href="{{ route('eventoShow',['id'=>$evento->id]) }}" class="btn btn-success btn-sm">Ver detalles</a>
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

@section('footer')
<p>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong> | Subdirección de Calidad y Certificación [Nombre programa] | Unidad de Planeación [Departamento de Tecnologías de la Información]</p>
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