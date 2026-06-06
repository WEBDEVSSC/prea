@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Eventos')

@section('content_header')
    <h1><strong>Reporte Estadístico</strong></h1>
@stop

@section('content')


    

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Del {{$fechaInicio}} al {{$fechaFin}}</li>
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

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <strong>Conteo de Eventos por Jurisdicción</strong>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    @php
                        $totalGeneral = $eventos->count();
                    @endphp

                    <table class="table table-sm table-bordered table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Jurisdicción</th>
                                <th class="text-center">Cuasi-Fallas</th>
                                <th class="text-center">Adversos</th>
                                <th class="text-center">Centinela</th>
                                <th class="text-center">Total de Eventos</th>
                                <th class="text-center">%</th>
                            </tr>
                        </thead>

                        <tbody>

                            @for($i = 1; $i <= 8; $i++)

                                @php
                                    $jurisdiccion = $eventos->where('jurisdiccion', $i);

                                    $cuasiFalla = $jurisdiccion
                                        ->where('clasificacion_del_evento', 'CUASI-FALLA')
                                        ->count();

                                    $adversos = $jurisdiccion
                                        ->where('clasificacion_del_evento', 'EVENTO ADVERSO')
                                        ->count();

                                    $centinela = $jurisdiccion
                                        ->where('clasificacion_del_evento', 'EVENTO CENTINELA')
                                        ->count();

                                    $total = $jurisdiccion->count();

                                    $porcentaje = $totalGeneral > 0
                                        ? ($total / $totalGeneral) * 100
                                        : 0;
                                @endphp

                                <tr>
                                    <td>Jurisdicción {{ $i }}</td>

                                    <td class="text-center">
                                        {{ $cuasiFalla }}
                                    </td>

                                    <td class="text-center">
                                        {{ $adversos }}
                                    </td>

                                    <td class="text-center">
                                        {{ $centinela }}
                                    </td>

                                    <td class="text-center font-weight-bold">
                                        {{ $total }}
                                    </td>

                                    <td class="text-center">
                                        {{ number_format($porcentaje, 2) }}%
                                    </td>
                                </tr>

                            @endfor

                        </tbody>

                        <tfoot class="bg-light font-weight-bold">
                            <tr>
                                <td>TOTAL GENERAL</td>

                                <td class="text-center">
                                    {{ $eventos->where('clasificacion_del_evento', 'CUASI-FALLA')->count() }}
                                </td>

                                <td class="text-center">
                                    {{ $eventos->where('clasificacion_del_evento', 'EVENTO ADVERSO')->count() }}
                                </td>

                                <td class="text-center">
                                    {{ $eventos->where('clasificacion_del_evento', 'EVENTO CENTINELA')->count() }}
                                </td>

                                <td class="text-center">
                                    {{ $totalGeneral }}
                                </td>

                                <td class="text-center">
                                    100.00%
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm mt-3">
    <div class="card-header bg-success text-white py-2">
        <h6 class="mb-0">
            Conteo de Eventos por Nivel
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">

            <table class="table table-sm table-bordered table-striped mb-0">

                <thead class="bg-light">
                    <tr>
                        <th>Nivel</th>
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">%</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $totalGeneral = collect($resumenNivel)->sum('total');
                    @endphp

                    @foreach($resumenNivel as $nivel => $datos)

                    <tr>
                        <td>{{ $nivel }}</td>

                        <td class="text-center">
                            {{ $datos['cuasi_falla'] }}
                        </td>

                        <td class="text-center">
                            {{ $datos['adversos'] }}
                        </td>

                        <td class="text-center">
                            {{ $datos['centinela'] }}
                        </td>

                        <td class="text-center font-weight-bold">
                            {{ $datos['total'] }}
                        </td>

                        <td class="text-center">
                            {{ number_format(($datos['total'] / $totalGeneral) * 100, 2) }}%
                        </td>
                    </tr>

                    @endforeach

                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL GENERAL</td>

                        <td class="text-center">
                            {{ collect($resumenNivel)->sum('cuasi_falla') }}
                        </td>

                        <td class="text-center">
                            {{ collect($resumenNivel)->sum('adversos') }}
                        </td>

                        <td class="text-center">
                            {{ collect($resumenNivel)->sum('centinela') }}
                        </td>

                        <td class="text-center">
                            {{ $totalGeneral }}
                        </td>

                        <td class="text-center">
                            100.00%
                        </td>
                    </tr>
                </tfoot>

            </table>

        </div>
    </div>
</div>

<!-- --------------------------------------------------------------- -->


<div class="card shadow-sm mt-3">
    <div class="card-header bg-dark text-white py-2">
        <h6 class="mb-0">
            CLASIFICACIÓN
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th></th>
                        <th class="text-center">Total</th>
                        <th class="text-center">%</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categorias as $categoria => $total)
                    <tr>
                        <td>{{ $categoria }}</td>

                        <td class="text-center font-weight-bold">
                            {{ $total }}
                        </td>

                        <td class="text-center">
                            {{ number_format(($total / $categorias->sum()) * 100, 2) }}%
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td>TOTAL</td>

                        <td class="text-center">
                            {{ $categorias->sum() }}
                        </td>

                        <td class="text-center">
                            100.00%
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm mt-3">
    <div class="card-header bg-warning text-white py-2">
        <h6 class="mb-0">
            Conteo por Descripción del Incidente
        </h6>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">

            <style>
.table td,
.table th {
    padding-left: .5rem !important;
}
</style>

            <table class="table table-sm table-bordered table-striped mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">%</th>
                    </tr>
                </thead>

                <tbody>

    @php
        $totalGeneral = $eventos->count();
    @endphp

    @foreach($descripciones as $categoria => $items)

        @php
            $primeraFila = true;
            $rowspan = $items->count();
        @endphp

        @foreach($items as $descripcion => $total)

            <tr>

                @if($primeraFila)
                    <td rowspan="{{ $rowspan }}" class="align-middle font-weight-bold bg-light">
                        {{ $categoria }}
                    </td>
                    @php $primeraFila = false; @endphp
                @endif

                <td>
                    {{ $descripcion }}
                </td>

                <td class="text-center">
                    {{ $total }}
                </td>

                <td class="text-center">
                    {{ number_format(($total / $totalGeneral) * 100, 2) }}%
                </td>

            </tr>

        @endforeach

    @endforeach

</tbody>

                <tfoot class="bg-light font-weight-bold">
                    <tr>
                        <td colspan="2">TOTAL GENERAL</td>
                        <td class="text-center">
                            {{ $totalGeneral }}
                        </td>
                        <td class="text-center">
                            100.00%
                        </td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------- -->

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <strong>Jurisdicción 1 - Eventos por Unidad</strong>
    </div>

    <div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped mb-0">
            <thead class="bg-light">
                <tr>
                    <th width="50%">Unidad</th>
                    <th class="text-center">Cuasi-Falla</th>
                    <th class="text-center">Adversos</th>
                    
                    <th class="text-center">Centinela</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach($resumenJurisdiccion1 as $unidad => $datos)
                <tr>
                    <td>{{ $unidad }}</td>

                    <td class="text-center">
                        {{ $datos['cuasi_falla'] }}
                    </td>

                    <td class="text-center">
                        {{ $datos['adversos'] }}
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

            <tfoot class="bg-light font-weight-bold">
                <tr>
                    <td>TOTAL</td>

                     <td class="text-center">
                        {{ collect($resumenJurisdiccion1)->sum('cuasi_falla') }}
                    </td>

                    <td class="text-center">
                        {{ collect($resumenJurisdiccion1)->sum('adversos') }}
                    </td>
                   
                    <td class="text-center">
                        {{ collect($resumenJurisdiccion1)->sum('centinela') }}
                    </td>
                    <td class="text-center">
                        {{ collect($resumenJurisdiccion1)->sum('total') }}
                    </td>
                </tr>
            </tfoot>

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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion2 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                            {{ collect($resumenJurisdiccion2)->sum('cuasi_falla') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion2)->sum('adversos') }}
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
    <div class="card-header bg-success text-white py-2">
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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion3 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                            {{ collect($resumenJurisdiccion3)->sum('cuasi_falla') }}
                        </td>
                        <td class="text-center">
                            {{ collect($resumenJurisdiccion3)->sum('adversos') }}
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
    <div class="card-header bg-success py-2">
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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion4 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                        <td class="text-center">{{ collect($resumenJurisdiccion4)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion4)->sum('adversos') }}</td>                        
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
    <div class="card-header bg-success py-2">
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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion5 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                        <td class="text-center">{{ collect($resumenJurisdiccion5)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion5)->sum('adversos') }}</td>
                        
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
    <div class="card-header bg-success py-2">
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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion6 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                        <td class="text-center">{{ collect($resumenJurisdiccion6)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion6)->sum('adversos') }}</td>
                        
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
    <div class="card-header bg-success py-2">
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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion7 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                        <td class="text-center">{{ collect($resumenJurisdiccion7)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion7)->sum('adversos') }}</td>
                        
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
    <div class="card-header bg-success py-2">
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
                        <th class="text-center">Cuasi-Falla</th>
                        <th class="text-center">Adversos</th>
                        
                        <th class="text-center">Centinela</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($resumenJurisdiccion8 as $unidad => $datos)
                    <tr>
                        <td>{{ $unidad }}</td>
                        <td class="text-center">{{ $datos['cuasi_falla'] }}</td>
                        <td class="text-center">{{ $datos['adversos'] }}</td>
                        
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
                        <td class="text-center">{{ collect($resumenJurisdiccion8)->sum('cuasi_falla') }}</td>
                        <td class="text-center">{{ collect($resumenJurisdiccion8)->sum('adversos') }}</td>
                        
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