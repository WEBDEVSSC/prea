<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.R.E.A. Coah</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Select2 CSS -->
    

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet">


</head>

<body>

<div class="container">
  <div class="row">

    <div class="col-md-12">
      <center><img src="{{ asset('img/cintilla_prea.jpg') }}" alt="Logo" width="70%"></center>
    </div>

  </div>

  <div class="row">
  
    <div class="col-md-12">
      <center><h3>Sistema de Notificación y Análisis de Eventos Adversos Relacionados con la Seguridad del Paciente</h3></center>
    </div>

  </div>
</div>

<br>

    <div class="container mt-3">
              
        <form action="{{ route('store') }}" method="POST">

        @csrf

        <!-- ------------------------------------------------------------------------------- -->
        <!-- TIPO DE EVENTO -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Tipo de evento
            </div>
            <div class="card-body">

                <div class="form-check">
                <input class="form-check-input" type="radio" name="clasificacion_del_evento" id="clasificacion_del_evento" value="CUASI-FALLA"
                {{ old('clasificacion_del_evento') == 'CUASI-FALLA' ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleRadios1">
                    <strong>Cuasi-Falla</strong> (Evento que estuvo a punto de generar un daño al paciente, porque se detectó a tiempo)
                </label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="clasificacion_del_evento" id="clasificacion_del_evento" value="EVENTO ADVERSO"
                {{ old('clasificacion_del_evento') == 'EVENTO ADVERSO' ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleRadios2">
                    <strong>Evento Adverso</strong> (Evento no intencional que produce un daño leve o moderado al paciente)
                </label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="clasificacion_del_evento" id="clasificacion_del_evento" value="EVENTO CENTINELA"
                {{ old('clasificacion_del_evento') == 'EVENTO CENTINELA' ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleRadios3">
                    <strong>Evento Centinela</strong> (Evento inesperado que involucra la muerte del paciente, un daño físico o psicológico grave y que no está relacionado con la historia natural de la enfermedad)
                </label>
                </div>

                <!-- -- -->

                @error('clasificacion_del_evento')
                <br><div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
        </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- UNIDAD -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Unidad
            </div>
            <div class="card-body">

            <label for="unidadSelect">Unidad:</label>
                <select id="unidadSelect" name="unidad" class="form-control">
                    <option value="">Seleccione una unidad</option>
                </select>

                <!-- -- -->
                
                @error('unidad')
                <br><div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
        </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- DATOS DEL PACIENTE -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Datos del paciente
            </div>
            <div class="card-body">

            <div class="row">

            <div class="col-md-6">
              <p>Edad <small>Años cumplidos</small></p>
              <input type="number" name="edad" class="form-control" value="{{ old('edad') }}">

              <!-- -- -->
                
              @error('edad')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror

            </div>

            <div class="col-md-6">
              <p>Sexo</p>
              <select name="sexo" class="form-control">
                <option value="" disabled {{ old('sexo') == '' ? 'selected' : '' }}>[ Seleccione una opción ]</option>
                <option value="MASCULINO" {{ old('sexo') == 'MASCULINO' ? 'selected' : '' }}>MASCULINO</option>
                <option value="FEMENINO" {{ old('sexo') == 'FEMENINO' ? 'selected' : '' }}>FEMENINO</option>
            </select>

              <!-- -- -->
                
              @error('sexo')<br><div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            </div>

            </div>
        </div>

       <!-- ------------------------------------------------------------------------------- -->
        <!-- DESCRIPCION DEL EVENTO ADVERSO -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Descripción del evento adverso
            </div>
            <div class="card-body">

            <div class="row">

              <div class="col-md-12">
                  <p>¿En qué lugar o área ocurrió el evento adverso?	</p>
                  <select name="servicio" class="form-control">
                    <option value="" disabled {{ old('servicio') == '' ? 'selected' : '' }}>[ Seleccione una opción ]</option>
                    <option value="ALMACEN" {{ old('servicio') == 'ALMACEN' ? 'selected' : '' }}>ALMACEN</option>
                    <option value="CENDIS" {{ old('servicio') == 'CENDIS' ? 'selected' : '' }}>CENDIS</option>
                    <option value="CEYE" {{ old('servicio') == 'CEYE' ? 'selected' : '' }}>CEYE</option>
                    <option value="CONSULTA EXTERNA" {{ old('servicio') == 'CONSULTA EXTERNA' ? 'selected' : '' }}>CONSULTA EXTERNA</option>
                    <option value="DENTAL" {{ old('servicio') == 'DENTAL' ? 'selected' : '' }}>DENTAL</option>
                    <option value="FARMACIA" {{ old('servicio') == 'FARMACIA' ? 'selected' : '' }}>FARMACIA</option>
                    <option value="HOSPITALIZACION" {{ old('servicio') == 'HOSPITALIZACION' ? 'selected' : '' }}>HOSPITALIZACIÓN</option>
                    <option value="IMAGENOLOGIA Y RAYOS X" {{ old('servicio') == 'IMAGENOLOGIA Y RAYOS X' ? 'selected' : '' }}>IMAGENOLOGÍA Y RAYOS X</option>
                    <option value="LABORATORIO" {{ old('servicio') == 'LABORATORIO' ? 'selected' : '' }}>LABORATORIO</option>
                    <option value="MEDICINA PREVENTIVA" {{ old('servicio') == 'MEDICINA PREVENTIVA' ? 'selected' : '' }}>MEDICINA PREVENTIVA</option>
                    <option value="NUTRICION" {{ old('servicio') == 'NUTRICION' ? 'selected' : '' }}>NUTRICIÓN</option>
                    <option value="PATOLOGIA" {{ old('servicio') == 'PATOLOGIA' ? 'selected' : '' }}>PATOLOGÍA</option>
                    <option value="QUIROFANO" {{ old('servicio') == 'QUIROFANO' ? 'selected' : '' }}>QUIROFANO</option>
                    <option value="SALUD REPRODUCTIVA" {{ old('servicio') == 'SALUD REPRODUCTIVA' ? 'selected' : '' }}>SALUD REPRODUCTIVA</option>
                    <option value="TOCOCIRUGIA" {{ old('servicio') == 'TOCOCIRUGIA' ? 'selected' : '' }}>TOCOCIRUGÍA</option>
                    <option value="U.C.I. ADULTOS" {{ old('servicio') == 'U.C.I. ADULTOS' ? 'selected' : '' }}>U.C.I. ADULTOS</option>
                    <option value="U.C.I. NEONATALES" {{ old('servicio') == 'U.C.I. NEONATALES' ? 'selected' : '' }}>U.C.I. NEONATALES</option>
                    <option value="U.C.I. PEDIATRICOS" {{ old('servicio') == 'U.C.I. PEDIATRICOS' ? 'selected' : '' }}>U.C.I. PEDIATRICOS</option>
                    <option value="URGENCIAS" {{ old('servicio') == 'URGENCIAS' ? 'selected' : '' }}>URGENCIAS</option>
                  </select>
                  <!-- -- -->
                    
                  @error('servicio')
                    <br><div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>

            </div>

          <!-- -------------------------------------------------------------------- -->

          <div class="row mt-3">

          <div class="col-md-6">
              <p>Turno</p>
              <select name="turno" class="form-control">
                <option value="">[ Seleccione una opción ]</option>
                <option value="MATUTINO"{{ old('turno') == 'MATUTINO' ? 'selected' : '' }}>MATUTINO</option>
                <option value="VESPERTINO"{{ old('turno') == 'VESPERTINO' ? 'selected' : '' }}>VESPERTINO</option>
                <option value="NOCTURNO"{{ old('turno') == 'NOCTURNO' ? 'selected' : '' }}>NOCTURNO</option>
                <option value="JORNADA ACUMULADA"{{ old('turno') == 'JORNADA ACUMULADA' ? 'selected' : '' }}>JORNADA ACUMULADA</option>
              </select>
              <!-- -- -->
                
              @error('turno')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="col-md-6">
              <p>Fecha y hora</p>
              <input type="datetime-local" name="fecha_hora" class="form-control" value="{{ old('fecha_hora') }}">
              @error('fecha_hora')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          </div>

          <!-- -------------------------------------------------------- -->

          <div class="row mt-3">

            <div class="col-md-6">
              <p>Persona directamente involucrada</p>
              <select id="personaInvolucradaSelect" name="persona_involucrada" class="form-control" onchange="toggleOtroInput()">
                <option value="">[ Seleccione una opción ]</option>
                <option value="ADMINISTRATIVO"{{ old('persona_involucrada') == 'ADMINISTRATIVO' ? ' selected' : '' }}>ADMINISTRATIVO</option>
                <option value="CAMILLERO"{{ old('persona_involucrada') == 'CAMILLERO' ? ' selected' : '' }}>CAMILLERO</option>
                <option value="ENFERMERÍA"{{ old('persona_involucrada') == 'ENFERMERÍA' ? ' selected' : '' }}>ENFERMERÍA</option>
                <option value="MEDICO"{{ old('persona_involucrada') == 'MEDICO' ? ' selected' : '' }}>MÉDICO</option>
                <option value="NUTRIOLOGO"{{ old('persona_involucrada') == 'NUTRIOLOGO' ? ' selected' : '' }}>NUTRIOLOGO</option>
                <option value="ODONTOLOGO"{{ old('persona_involucrada') == 'ODONTOLOGO' ? ' selected' : '' }}>ODONTOLOGO</option>
                <option value="OTRO"{{ old('persona_involucrada') == 'OTRO' ? ' selected' : '' }}>OTRO</option>
                <option value="PERSONAL EN FORMACIÓN"{{ old('persona_involucrada') == 'PERSONAL EN FORMACIÓN' ? ' selected' : '' }}>PERSONAL EN FORMACIÓN</option>
                <option value="QUIMICO"{{ old('persona_involucrada') == 'QUIMICO' ? ' selected' : '' }}>QUIMICO</option>
                <option value="RADIOLOGO"{{ old('persona_involucrada') == 'RADIOLOGO' ? ' selected' : '' }}>RADIOLOGO</option>
              </select>
            
              @error('persona_involucrada')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="col-md-6">
              <p><small>En caso de que su respuesta anterior fuera "OTRO", favor de ingresar el cargo del personal</small></p>
              <input 
                type="text" 
                id="personaInvolucradaOtro" 
                name="persona_involucrada_otro" 
                class="form-control" 
                value="{{ old('persona_involucrada_otro') }}" 
                disabled
              >
              
              @error('persona_involucrada_otro')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

  </div>

  <!-- -------------------------------------------------- -->

  <div class="row mt-3">
    
    <div class="col-md-6">
      <p>Personas que presenciaron</p>
      <select id="personaTestigosSelect" name="persona_testigos" class="form-control" onchange="toggleTestigosInput()">
        <option value="">[ Seleccione una opción ]</option>
        <option value="ACOMPAÑANTE"{{ old('persona_testigos') == 'ACOMPAÑANTE' ? ' selected' : '' }}>ACOMPAÑANTE</option>
        <option value="ADMINISTRATIVO"{{ old('persona_testigos') == 'ADMINISTRATIVO' ? ' selected' : '' }}>ADMINISTRATIVO</option>
        <option value="CAMILLERO"{{ old('persona_testigos') == 'CAMILLERO' ? ' selected' : '' }}>CAMILLERO</option>
        <option value="ENFERMERÍA"{{ old('persona_testigos') == 'ENFERMERÍA' ? ' selected' : '' }}>ENFERMERÍA</option>
        <option value="MEDICO"{{ old('persona_testigos') == 'MEDICO' ? ' selected' : '' }}>MÉDICO</option>
        <option value="NUTRIOLOGO"{{ old('persona_testigos') == 'NUTRIOLOGO' ? ' selected' : '' }}>NUTRIOLOGO</option>
        <option value="ODONTOLOGO"{{ old('persona_testigos') == 'ODONTOLOGO' ? ' selected' : '' }}>ODONTOLOGO</option>
        <option value="OTRO"{{ old('persona_testigos') == 'OTRO' ? ' selected' : '' }}>OTRO</option>
        <option value="PERSONAL EN FORMACIÓN"{{ old('persona_testigos') == 'PERSONAL EN FORMACIÓN' ? ' selected' : '' }}>PERSONAL EN FORMACIÓN</option>
        <option value="QUIMICO"{{ old('persona_testigos') == 'QUIMICO' ? ' selected' : '' }}>QUIMICO</option>
        <option value="RADIOLOGO"{{ old('persona_testigos') == 'RADIOLOGO' ? ' selected' : '' }}>RADIOLOGO</option>        
      </select>
    
      @error('persona_testigos')
        <br><div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="col-md-6">
      <p><small>En caso de que su respuesta anterior fuera "OTRO", favor de ingresar el cargo del personal</small></p>
      <input 
        type="text" 
        id="personaTestigosOtro" 
        name="persona_testigos_otro" 
        class="form-control" 
        value="{{ old('persona_testigos_otro') }}" 
        disabled
      >
      
      @error('persona_testigos_otro')
        <br><div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

  </div>
  </div>
  </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- DESCRIPCION DETALLADA DEL EVENTO -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Descripción detallada del evento
            </div>
            <div class="card-body">

            <div class="row">

                <div class="col-md-12">
                <textarea name="descripcion" class="form-control" rows="5"> {{ old('descripcion') }}</textarea>
                
                @error('descripcion')
                  <br><div class="alert alert-danger">{{ $message }}</div>
                @enderror
              
              </div>

            </div>
                
            </div>
        </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- TIPO DE INCIDENTE -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Tipo de incidente
            </div>
            <div class="card-body">
                <!-- Select para Categorías -->
        <div class="mb-3">
            <select id="categoria" name="categoria" class="form-select">
                <option value="">Seleccione una categoría</option>
            </select>
            @error('categoria')
              <br><div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Select para Opciones -->
        <div class="mb-3">
            <select id="opcion" name="opcion" class="form-select" disabled>
                <option value="">Seleccione una opción</option>
            </select>
            @error('opcion')
              <br><div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Select para Opciones -->
          <div class="mb-3">
            <input type="text" id="incidente_otro" name="incidente_otro" class="form-control" 
            value="{{ old('incidente_otro') }}" {{ old('categoria') == 'OTRO INCIDENTE' ? '' : 'disabled' }}>
            @error('incidente_otro')
              <br><div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

            </div>
        </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- GRAVEDAD DEL DAÑO -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Gravedad del daño
            </div>
            <div class="card-body">

            <table class="table table-borderless">
              <tr>
                  <td>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gravedad" id="gravedad" value="SIN DAÑO" {{ old('gravedad') == 'SIN DAÑO' ? 'checked' : '' }}>
                          <label class="form-check-label" for="exampleRadios1">
                              Sin daño
                          </label>
                      </div>
                  </td>
                  <td>Incidente que pudo causar daño pero fue evitado o incidente que ocurrió pero no causó daño.</td>
              </tr>

              <tr>
                  <td>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gravedad" id="gravedad" value="BAJO" {{ old('gravedad') == 'BAJO' ? 'checked' : '' }}>
                          <label class="form-check-label" for="exampleRadios2">
                              Bajo
                          </label>
                      </div>
                  </td>
                  <td>Incidente que causó un daño mínimo al paciente.</td>
              </tr>

              <tr>
                  <td>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gravedad" id="gravedad" value="MODERADO" {{ old('gravedad') == 'MODERADO' ? 'checked' : '' }}>
                          <label class="form-check-label" for="exampleRadios3">
                              Moderado
                          </label>
                      </div>
                  </td>
                  <td>Incidente que causó un daño significativo pero no permanente al paciente.</td>
              </tr>

              <tr>
                  <td>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gravedad" id="gravedad" value="GRAVE" {{ old('gravedad') == 'GRAVE' ? 'checked' : '' }}>
                          <label class="form-check-label" for="exampleRadios4">
                              Grave
                          </label>
                      </div>
                  </td>
                  <td>Incidente que tiene como resultado un daño permanente al paciente.</td>
              </tr>

              <tr>
                  <td>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gravedad" id="gravedad" value="MUERTE" {{ old('gravedad') == 'MUERTE' ? 'checked' : '' }}>
                          <label class="form-check-label" for="exampleRadios5">
                              Muerte
                          </label>
                      </div>
                  </td>
                  <td>Incidente que ocasionó directamente la muerte del paciente.</td>
              </tr>
          </table>

            @error('gravedad')
              <br><div class="alert alert-danger">{{ $message }}</div>
            @enderror
                
            </div>
        </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- FACTORES DEL INCIDENTE -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Factores del incidente
            </div>
            <div class="card-body">

            <p><strong>¿Cuáles son los factores que contribuyeron al incidente? </strong> <small>Puede seleccionar más de una opción</small></p>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="factores_incidente_uno" id="defaultCheck1" {{ old('factores_incidente_uno') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Relacionados con las características del paciente.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI"  name="factores_incidente_dos" id="defaultCheck1" {{ old('factores_incidente_dos') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Relacionados con la aplicación de las indicaciones, protocolos, manuales, lineamientos y guías de práctica clínica.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI"  name="factores_incidente_tres" id="defaultCheck1" {{ old('factores_incidente_tres') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Individuales asociadas con los integrantes del equipo.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI"  name="factores_incidente_cuatro" id="defaultCheck1" {{ old('factores_incidente_cuatro') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Relacionados con el trabajo en equipo.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI"  name="factores_incidente_cinco" id="defaultCheck1" {{ old('factores_incidente_cinco') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Relacionados con el ambiente de trabajo y el entorno.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI"  name="factores_incidente_seis" id="defaultCheck1" {{ old('factores_incidente_seis') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Organizacionales del establecimiento de atención médica.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI"  name="factores_incidente_siete" id="defaultCheck1" {{ old('factores_incidente_siete') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Institucionales o del ambiente externo.
                </label>
              </div>
            </div>
          </div>

          @if ($errors->has('factores_incidente_uno') || $errors->has('factores_incidente_dos') || $errors->has('factores_incidente_tres') || $errors->has('factores_incidente_cuatro') || $errors->has('factores_incidente_cinco') || $errors->has('factores_incidente_seis') || $errors->has('factores_incidente_siete'))        
          <br>
          <div class="alert alert-danger">
              Debe seleccionar al menos un factor que haya contribuido al incidente.
          </div>
          @endif
                
            </div>
        </div>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- EVITABILIDAD -->
        <!-- ------------------------------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Evitabilidad
            </div>
            <div class="card-body">

            <div class="row">
            <div class="col-md-12">
              <p>¿Considera que se pudo haber evitado el evento adverso?</p>
              <select name="evitar_evento" class="form-control">
                <option value="">[ Seleccione una opción ]</option>
                <option value="SI" {{ old('evitar_evento') == 'SI' ? 'selected' : '' }}>SI</option>
                <option value="NO" {{ old('evitar_evento') == 'NO' ? 'selected' : '' }}>NO</option>
              </select>

              @error('evitar_evento')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-12">
              <p>¿Cómo considera que pudo haberse evitado el evento adverso?</p>
              <input type="text" name="como_evitar_evento" class="form-control"  onkeypress="return ' áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ'.includes(event.key)" value="{{ old('como_evitar_evento') }}">
              @error('como_evitar_evento')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-12">
              <p>¿Se le proporcionó información al paciente o a su familiar relacionada con el evento adverso?</p>
              <select name="proporciono_informacion" class="form-control">
                <option value="">[ Seleccione una opción ]</option>
                <option value="SI" {{ old('proporciono_informacion') == 'SI' ? 'selected' : '' }}>SI</option>
                <option value="NO" {{ old('proporciono_informacion') == 'NO' ? 'selected' : '' }}>NO</option>
              </select>
              @error('proporciono_informacion')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-12">
              <p>¿Quién la proporcionó?</p>
              <select name="quien_proporciono" class="form-control">
                <option value="" {{ old('quien_proporciono') == '' ? 'selected' : '' }} disabled>[ Seleccione una opción ]</option>
                <option value="MEDICO" {{ old('quien_proporciono') == 'MEDICO' ? 'selected' : '' }}>MÉDICO</option>
                <option value="ENFERMERÌA" {{ old('quien_proporciono') == 'ENFERMERÌA' ? 'selected' : '' }}>ENFERMERÌA</option>
                <option value="CAMILLERO" {{ old('quien_proporciono') == 'CAMILLERO' ? 'selected' : '' }}>CAMILLERO</option>
                <option value="TECNICO" {{ old('quien_proporciono') == 'TECNICO' ? 'selected' : '' }}>TÉCNICO</option>
                <option value="TRABAJO SOCIAL" {{ old('quien_proporciono') == 'TRABAJO SOCIAL' ? 'selected' : '' }}>TRABAJO SOCIAL</option>   
                <option value="NADIE" {{ old('quien_proporciono') == 'NADIE' ? 'selected' : '' }}>NADIE</option>   
              </select>
              @error('quien_proporciono')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
                
            </div>
        </div>
        

        <!-- ----------------------------------------------------------------------------------------- -->

        <div class="row mt-3">
          <div class="col-md-5"></div>
          <div class="col-md-2">

            <!-- -------------------------------------------------------------------- -->

            <img src="{{ captcha_src('flat') }}" onclick="this.src='{{ captcha_src('flat') }}'+Math.random()" style="cursor:pointer;">
            <input type="text" name="captcha" placeholder="Ingrese el código">
            @error('captcha')
              <span class="text-danger">{{ $message }}</span>
            @enderror


            <!-- -------------------------------------------------------------------- -->

            

          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <center>

            <button type="submit" class="btn btn-block mt-3" style="background-color: #6f42c1; color: #fff; border: none;">REGISTRAR EVENTO</button>

            </center>
          </div>
        </div>

        <!-- ----------------------------------------------------------------------------------------- -->

    </div>

    </form>

    <!-- Carga el script -->


    <!-- ------------------------------------------------------------------------- -->
    
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Secretaría de Salud de Coahuila. Todos los derechos reservados.</p>
            
        </div>
        <br>
        <br>
    </footer>

    <!-- ------------------------------------------------------------------------- -->

    @section('plugins.Sweetalert2', true)

    @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Registro Correcto',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                });
            </script>
        @endif

        <script>
          document.getElementById('reload').onclick = function () {
              fetch('/refresh-captcha')
                  .then(res => res.json())
                  .then(data => {
                      document.querySelector('form span').innerHTML = data.captcha;
                  });
          }
      </script>
        <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6k3I4F+VppvIEnq0u5tkU7l1RZm5SaaPqC+78LUeF9v/8gV56N4FJP" crossorigin="anonymous"></script>

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Incluye Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    

    <!-- Incluye jQuery y Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>-->

    <!-- SCRIPT PARA LLENAR LAS CATEGORIAS DE INCIDENTES -->
    <script>
        $(document).ready(function () {
    let categoriaOld = "{{ old('categoria') }}";
    let opcionOld = "{{ old('opcion') }}";

    // Cargar las categorías al cargar la página
    $.get("{{ route('incidentes.categorias') }}", function (data) {
        $.each(data, function (index, categoria) {
            let selected = (categoria.id == categoriaOld) ? 'selected' : '';
            $('#categoria').append('<option value="' + categoria.id + '" ' + selected + '>' + categoria.categoria + '</option>');
        });

        // Si hay una categoría seleccionada, disparamos el cambio para cargar sus opciones
        if (categoriaOld) {
            $('#categoria').trigger('change');
        }
    });

    // Al cambiar categoría, cargar opciones
    $('#categoria').change(function () {
        var categoria_id = $(this).val();
        var categoria_text = $("#categoria option:selected").text();
        var opcionOtra = document.getElementById('incidente_otro');

        if (categoria_text.trim().toUpperCase() === "OTRO INCIDENTE") {
            opcionOtra.disabled = false;
        } else {
            opcionOtra.disabled = true;
            opcionOtra.value = "";
        }

        if (categoria_id) {
            $.get("{{ url('incidentes/opciones') }}/" + categoria_id, function (data) {
                $('#opcion').removeAttr('disabled').empty();
                $('#opcion').append('<option value="">Seleccione una opción</option>');
                $.each(data, function (index, opcion) {
                    let selected = (opcion.id == opcionOld) ? 'selected' : '';
                    $('#opcion').append('<option value="' + opcion.id + '" ' + selected + '>' + opcion.opcion + '</option>');
                });
            });
        } else {
            $('#opcion').attr('disabled', 'disabled').empty();
            $('#opcion').append('<option value="">Seleccione una opción</option>');
        }
    });
});

    </script>
    
    <!-- UNIDADES -->
    
    <script>
    $(document).ready(function() {
        // Obtener el valor anterior seleccionado si existe
        var selectedUnidad = "{{ old('unidad') }}";

        // Hacer una solicitud GET al endpoint para obtener las unidades
        $.get("{{ route('unidades') }}", function(data) {
            // Iterar sobre los resultados y agregar las opciones al select
            $.each(data, function(index, unidad) {
                // Crear una nueva opción
                var option = new Option(unidad.nombre, unidad.id);

                // Verificar si esta unidad fue seleccionada previamente
                if (unidad.id == selectedUnidad) {
                    option.selected = true;
                }

                // Agregar la opción al select
                $('#unidadSelect').append(option);
            });
        });
    });
</script>

<script>
  // Escuchar cambios en el select
  document.getElementById('personaInvolucradaSelect').addEventListener('change', function() {
    var personaInvolucradaOtroInput = document.getElementById('persona_involucrada_otro');
    
    // Habilitar el campo si selecciona 'OTRO', de lo contrario deshabilitarlo
    if (this.value === 'OTRO') {
      personaInvolucradaOtroInput.disabled = false;
    } else {
      personaInvolucradaOtroInput.disabled = true;
    }
  });
</script>

<script>
  // Escuchar cambios en el select
  document.getElementById('personaTestigosSelect').addEventListener('change', function() {
    var personaTestigosOtroInput = document.getElementById('persona_testigos_otro');
    
    // Habilitar el campo si selecciona 'OTRO', de lo contrario deshabilitarlo
    if (this.value === 'OTRO') {
      personaTestigosOtroInput.disabled = false;
    } else {
      personaTestigosOtroInput.disabled = true;
    }
  });
</script>

<script>
  // Función para habilitar/deshabilitar el campo de texto
  function toggleOtroInput() {
    const select = document.getElementById('personaInvolucradaSelect');
    const otroInput = document.getElementById('personaInvolucradaOtro');
    
    if (select.value === 'OTRO') {
      otroInput.disabled = false; // Habilita el campo
      otroInput.focus(); // Opcional: Enfoca el campo
    } else {
      otroInput.disabled = true; // Deshabilita el campo
      otroInput.value = ''; // Limpia el valor del campo
    }
  }

  // Verifica el estado inicial al cargar la página
  window.addEventListener('DOMContentLoaded', (event) => {
    toggleOtroInput();
  });
</script>

<script>
  // Función para habilitar/deshabilitar el campo de texto
  function toggleTestigosInput() {
    const select = document.getElementById('personaTestigosSelect');
    const otroInput = document.getElementById('personaTestigosOtro');
    
    if (select.value === 'OTRO') {
      otroInput.disabled = false; // Habilita el campo
      otroInput.focus(); // Opcional: Enfoca el campo
    } else {
      otroInput.disabled = true; // Deshabilita el campo
      otroInput.value = ''; // Limpia el valor del campo
    }
  }

  // Verifica el estado inicial al cargar la página
  window.addEventListener('DOMContentLoaded', (event) => {
    toggleTestigosInput();
  });
</script>

<script>
  $(document).ready(function() {
      $('#unidadSelect').select2({
          placeholder: "Seleccione una unidad",
          allowClear: true,
          theme: "bootstrap4"
      });
  });
</script>

</body>
</html>