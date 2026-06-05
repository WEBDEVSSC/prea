@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Reporte</strong></h1>
@stop

@section('content')


    

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Panel de Control</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- -------------------------------------------------------------- -->

    <div class="row">

        <div class="col-md-3">
        <div class="small-box bg-success shadow">
            <div class="inner">
                <h3>{{ $cuasiFalla ?? 0 }}</h3>
                <p>Cuasi-Fallas</p>
            </div>
            <div class="icon">
                <i class="fas fa-shield-alt"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-warning shadow">
            <div class="inner">
                <h3 class="text-white">{{ $adversos ?? 0 }}</h3>
                <p class="text-white">Eventos Adversos</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        </div>
    </div>

    

    <div class="col-md-3">
        <div class="small-box bg-danger shadow">
            <div class="inner">
                <h3>{{ $centinela ?? 0 }}</h3>
                <p>Eventos Centinela</p>
            </div>
            <div class="icon">
                <i class="fas fa-bell"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-info shadow">
            <div class="inner">
                <h3>{{ ($adversos ?? 0) + ($cuasiFalla ?? 0) + ($centinela ?? 0) }}</h3>
                <p>Total de Eventos</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-bar"></i>
            </div>
        </div>
    </div>

</div>

<!-- -------------------------------------------------------------- -->



<div class="row-mt-3">
    <div class="card">
        <div class="card-header">
            <strong>Conteo de Eventos por Jurisdicción</strong>
        </div>
        <div class="card-body">

            <div class="table">
        <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                <tr>
                    <th>Jurisdicción</th>
                    <th>Cuasi-Fallas</th>
                    <th>Adversos</th>                    
                    <th>Centinela</th>
                    <th>Total de Eventos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jurisdicción 1</td>
                    <td>{{ $eventos->where('jurisdiccion', 1)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 1)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 1)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 1)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 2</td>
                    <td>{{ $eventos->where('jurisdiccion', 2)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 2)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 2)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 2)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 3</td>
                    <td>{{ $eventos->where('jurisdiccion', 3)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 3)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 3)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 3)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 4</td>
                    <td>{{ $eventos->where('jurisdiccion', 4)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 4)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 4)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 4)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 5</td>
                    <td>{{ $eventos->where('jurisdiccion', 5)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 5)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 5)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 5)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 6</td>
                    <td>{{ $eventos->where('jurisdiccion', 6)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 6)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 6)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 6)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 7</td>
                    <td>{{ $eventos->where('jurisdiccion', 7)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 7)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 7)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 7)->count() }}</td>
                </tr>
                <tr>
                    <td>Jurisdicción 8</td>
                    <td>{{ $eventos->where('jurisdiccion', 8)->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 8)->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}</td>
                    
                    <td>{{ $eventos->where('jurisdiccion', 8)->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}</td>
                    <td>{{ $eventos->where('jurisdiccion', 8)->count() }}</td>
                </tr>
                <!-- Agrega más filas para otras jurisdicciones si es necesario -->
            </tbody>
        </table>
    </div>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <strong>Jurisdicción 1 - Eventos por Unidad</strong>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($resumenJurisdiccion1 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>

                        <td class="text-center">
                            {{ $datos['adversos'] }}
                        </td>

                        <td class="text-center">
                            {{ $datos['cuasi_falla'] }}
                        </td>

                        <td class="text-center">
                            {{ $datos['centinela'] }}
                        </td>

                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-success text-white py-2">
        <h6 class="mb-0">
            Jurisdicción 2 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion2 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion2)->sum('adversos') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion2)->sum('cuasi_falla') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion2)->sum('centinela') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion2)->sum('total') }}
                        </td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-info text-white py-2">
        <h6 class="mb-0">
            Jurisdicción 3 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion3 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion3)->sum('adversos') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion3)->sum('cuasi_falla') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion3)->sum('centinela') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion3)->sum('total') }}
                        </td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-warning py-2">
        <h6 class="mb-0 text-white">
            Jurisdicción 4 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion4 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion4)->sum('adversos') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion4)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion4)->sum('centinela') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion4)->sum('total') }}</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-secondary">
        <h6 class="mb-0 text-white">
            Jurisdicción 5 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion5 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion5)->sum('adversos') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion5)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion5)->sum('centinela') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion5)->sum('total') }}</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-danger">
        <h6 class="mb-0 text-white">
            Jurisdicción 6 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion6 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion6)->sum('adversos') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion6)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion6)->sum('centinela') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion6)->sum('total') }}</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-dark">
        <h6 class="mb-0 text-white">
            Jurisdicción 7 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion7 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion7)->sum('adversos') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion7)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion7)->sum('centinela') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion7)->sum('total') }}</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">
            Jurisdicción 8 - Eventos por Unidad
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="50%">Unidad</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion8 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['centinela'] }}</td>
                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion8)->sum('adversos') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion8)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion8)->sum('centinela') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion8)->sum('total') }}</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

    
    <br>
    <br>
    <br>

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