@extends('adminlte::page')

@section('title', 'Categorías - Editar')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <strong>Categorías</strong> 
            <small class="text-muted">| Editar registro</small>
        </h1>
        <a href="{{ route('categoriaIndex') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Regresar al panel
        </a>
    </div>
@stop

@section('content')

    <form action="{{ route('categoriaUpdate', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card card-outline card-info shadow-sm mt-3">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-1"></i> Formulario de Edición
                </h3>
            </div>

            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="nombre">Nombre de la Categoría <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                </div>
                                <input 
                                    type="text" 
                                    name="nombre" 
                                    id="nombre" 
                                    class="form-control @error('nombre') is-invalid @enderror" 
                                    value="{{ old('nombre', $categoria->categoria) }}"
                                    placeholder="Ingrese el nombre"
                                    required
                                >
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('categoriaIndex') }}" class="btn btn-default btn-sm mr-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-info btn-sm">
                    <i class="fas fa-sync-alt mr-1"></i> Actualizar Datos
                </button>
            </div>

        </div><!-- /.card -->

    </form>

@stop

@include('layouts.footer')

@section('css')
    {{-- Agrega hojas de estilo personalizadas aquí si es necesario --}}
@stop

@section('js')
    <script> 
        console.log("Vista de edición de categorías cargada correctamente."); 
    </script>
@stop