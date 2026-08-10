@extends('adminlte::auth.login')

{{-- Título de la pestaña --}}
@section('title', 'Iniciar Sesión')

{{-- Estilos Material Design con fondo gris claro de alto contraste y acentos morados --}}
@push('css')
<!-- Google Fonts: Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    /* Tipografía y fondo gris claro para máximo contraste */
    body.login-page {
        font-family: 'Roboto', sans-serif !important;
        background-color: #e9ecef !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Contenedor Flotante (Material Elevation 8dp) */
    .login-box {
        width: 420px;
    }

    /* Tarjeta en blanco puro para resaltar la elevación */
    .card {
        border: 1px solid rgba(0, 0, 0, 0.05) !important;
        border-radius: 16px !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.05) !important;
        background-color: #ffffff !important;
        overflow: hidden;
    }

    .card-body {
        padding: 2.5rem 2rem !important;
    }

    /* Campos de texto estilo Material Outlined */
    .form-group {
        position: relative;
    }

    .form-control {
        border: 1px solid #ced4da !important;
        border-radius: 8px !important;
        height: 48px !important;
        padding-left: 14px !important;
        font-size: 0.95rem;
        background-color: #ffffff !important;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-control:focus {
        background-color: #ffffff !important;
        border-color: #6200ee !important;
        box-shadow: 0 0 0 1px #6200ee !important;
    }

    /* Ajuste de íconos integrados al campo */
    .input-group-text {
        background: transparent !important;
        border: none !important;
        padding-right: 14px;
    }

    .input-group-append {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: 5;
        display: flex;
        align-items: center;
    }

    /* Color de íconos e hipervínculos Material */
    .text-purple-material {
        color: #6200ee !important;
    }

    a.text-purple-material {
        color: #6200ee !important;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    a.text-purple-material:hover {
        color: #3700b3 !important;
    }

    /* Botón Contenido (Raised Button con Elevación Material) */
    .btn-material {
        background-color: #6200ee !important;
        border: none !important;
        color: #ffffff !important;
        height: 48px;
        border-radius: 8px !important;
        font-weight: 500 !important;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 0.875rem;
        box-shadow: 0 3px 1px -2px rgba(0,0,0,0.2), 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12);
        transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.28s ease;
    }

    .btn-material:hover, .btn-material:focus {
        background-color: #5000d6 !important;
        box-shadow: 0 2px 4px -1px rgba(0,0,0,0.2), 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12);
    }

    .btn-material:active {
        box-shadow: 0 5px 5px -3px rgba(0,0,0,0.2), 0 8px 10px 1px rgba(0,0,0,0.14), 0 3px 14px 2px rgba(0,0,0,0.12);
    }

    /* Selection Control (Checkbox Material) */
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #6200ee !important;
        border-color: #6200ee !important;
    }

    .custom-control-label {
        cursor: pointer;
        user-select: none;
    }
</style>
@endpush

{{-- Encabezado sobre la tarjeta --}}
@section('auth_header')
    <div class="text-center mb-4">
        <h4 class="font-weight-bold text-dark mb-1">¡Bienvenido!</h4>
        <p class="text-muted small">Ingresa tus datos para continuar</p>
    </div>
@endsection

{{-- Cuerpo del formulario --}}
@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        {{-- Campo de Email --}}
        <div class="form-group mb-4">
            <div class="input-group">
                <input type="email" name="email" id="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" placeholder="Correo electrónico" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope text-purple-material"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Campo de Contraseña --}}
        <div class="form-group mb-3">
            <div class="input-group">
                <input type="password" name="password" id="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Contraseña" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock text-purple-material"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Recordar sesión y Olvidé contraseña --}}
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label small text-muted" for="remember">Recordarme</label>
                </div>
            </div>
            <div class="col-6 text-right">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="small text-purple-material">
                        ¿Olvidaste tu clave?
                    </a>
                @endif
            </div>
        </div>

        {{-- Botón de Ingreso --}}
        <button type="submit" class="btn btn-material btn-block">
            Iniciar Sesión
        </button>
    </form>
@endsection

{{-- Pie del login --}}
@section('auth_footer')
    @if (Route::has('register'))
        <div class="text-center mt-3">
            <p class="mb-0 text-muted small">
                ¿No tienes una cuenta? 
                <a href="{{ route('register') }}" class="text-purple-material ml-1">Regístrate</a>
            </p>
        </div>
    @endif
@endsection