

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.R.E.A. Coah</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>

<br>
<br>

<div class="container">
  <div class="col-md-12">
    <center><h3>Sistema de Notificación y Análisis de Eventos Adversos Relacionados con la Seguridad del Paciente</h3></center>
  </div>
</div>

<br>

    <div class="container mt-3">
              
        <form action="{{ route('store') }}" method="POST">

        @csrf

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

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Descripción del evento adverso -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

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
                    <option value="ARCHIVO CLINICO" {{ old('servicio') == 'ARCHIVO CLINICO' ? 'selected' : '' }}>ARCHIVO CLINICO</option>
                    <option value="CAJA" {{ old('servicio') == 'CAJA' ? 'selected' : '' }}>CAJA</option>
                    <option value="CIRUGIA" {{ old('servicio') == 'CIRUGIA' ? 'selected' : '' }}>CIRUGÍA</option>
                    <option value="ENFERMERIA" {{ old('servicio') == 'ENFERMERIA' ? 'selected' : '' }}>ENFERMERÍA</option>
                    <option value="ESTACIONAMIENTO" {{ old('servicio') == 'ESTACIONAMIENTO' ? 'selected' : '' }}>ESTACIONAMIENTO</option>
                    <option value="FARMACIA" {{ old('servicio') == 'FARMACIA' ? 'selected' : '' }}>FARMACIA</option>
                    <option value="GINECOLOGIA/OBSTETRICIA" {{ old('servicio') == 'GINECOLOGIA/OBSTETRICIA' ? 'selected' : '' }}>GINECOLOGÍA / OBSTETRICIA</option>
                    <option value="HOSPITALIZACION" {{ old('servicio') == 'HOSPITALIZACION' ? 'selected' : '' }}>HOSPITALIZACIÓN</option>
                    <option value="IMAGENOLOGIA Y RAYOS X" {{ old('servicio') == 'IMAGENOLOGÍA Y RAYOS X' ? 'selected' : '' }}>IMAGENOLOGÍA Y RAYOS X</option>
                    <option value="LABORATORIO" {{ old('servicio') == 'LABORATORIO' ? 'selected' : '' }}>LABORATORIO</option>
                    <option value="MEDICINA INTERNA" {{ old('servicio') == 'MEDICINA INTERNA' ? 'selected' : '' }}>MEDICINA INTERNA</option>
                    <option value="MODULO DE INCAPACIDADES" {{ old('servicio') == 'MODULO DE INCAPACIDADES' ? 'selected' : '' }}>MÓDULO DE INCAPACIDADES</option>
                    <option value="PEDIATRIA" {{ old('servicio') == 'PEDIATRIA' ? 'selected' : '' }}>PEDIATRÍA</option>
                    <option value="RECEPCION" {{ old('servicio') == 'RECEPCION' ? 'selected' : '' }}>RECENPCIÓN</option>
                    <option value="TRABAJO SOCIAL" {{ old('servicio') == 'TRABAJO SOCIAL' ? 'selected' : '' }}>TRABAJO SOCIAL</option>
                    <option value="URGENCIAS" {{ old('servicio') == 'URGENCIAS' ? 'selected' : '' }}>URGENCIAS</option>
                    <option value="CONSULTA EXTERNA" {{ old('servicio') == 'CONSULTA EXTERNA' ? 'selected' : '' }}>CONSULTA EXTERNA</option>
                    <option value="VIGILANCIA" {{ old('servicio') == 'VIGILANCIA' ? 'selected' : '' }}>VIGILANCIA</option>
                    <option value="U.C.I. ADULTOS" {{ old('servicio') == 'U.C.I. ADULTOS' ? 'selected' : '' }}>U.C.I. ADULTOS</option>
                    <option value="U.C.I. PEDIATRICOS" {{ old('servicio') == 'U.C.I. PEDIATRICOS' ? 'selected' : '' }}>U.C.I. PEDIATRICOS</option>
                    <option value="U.C.I. NEONATALES" {{ old('servicio') == 'U.C.I. NEONATALES' ? 'selected' : '' }}>U.C.I. NEONATALES</option>
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
      <select id="personaInvolucradaSelect" name="persona_involucrada" class="form-control">
        <option value="">[ Seleccione una opción ]</option>
        <option value="MEDICO"{{ old('persona_involucrada') == 'MEDICO' ? ' selected' : '' }}>MÉDICO</option>
        <option value="ENFERMERÍA"{{ old('persona_involucrada') == 'ENFERMERÍA' ? ' selected' : '' }}>ENFERMERÍA</option>
        <option value="CAMILLERO"{{ old('persona_involucrada') == 'CAMILLERO' ? ' selected' : '' }}>CAMILLERO</option>
        <option value="TECNICO"{{ old('persona_involucrada') == 'TECNICO' ? ' selected' : '' }}>TÉCNICO</option>
        <option value="PASANTE"{{ old('persona_involucrada') == 'PASANTE' ? ' selected' : '' }}>PASANTE</option>
        <option value="OTRO"{{ old('persona_involucrada') == 'OTRO' ? ' selected' : '' }}>OTRO</option>
      </select>

      @error('persona_involucrada')
        <br><div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <p><small>En caso de que su respuesta anterior fuera "OTRO", favor de ingresar el cargo del personal</small></p>
      <input type="text" name="persona_involucrada_otro" class="form-control" value="{{ old('persona_involucrada_otro') }}">
      
      @error('persona_involucrada_otro')
        <br><div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

  </div>

  <!-- -------------------------------------------------- -->

  <div class="row mt-3">
    
    <div class="col-md-6">
      <p>Personas que presenciaron</p>
      <select id="personaTestigosSelect" name="persona_testigos" class="form-control">
        <option value="">[ Seleccione una opción ]</option>
        <option value="MEDICO"{{ old('persona_testigos') == 'MEDICO' ? ' selected' : '' }}>MÉDICO</option>
        <option value="ENFERMERIA"{{ old('persona_testigos') == 'ENFERMERÍA' ? ' selected' : '' }}>ENFERMERÍA</option>
        <option value="CAMILLERO"{{ old('persona_testigos') == 'CAMILLERO' ? ' selected' : '' }}>CAMILLERO</option>
        <option value="TECNICO"{{ old('persona_testigos') == 'TECNICO' ? ' selected' : '' }}>TÉCNICO</option>
        <option value="FAMILIAR"{{ old('persona_testigos') == 'FAMILIAR' ? ' selected' : '' }}>FAMILIAR</option>
        <option value="OTRO"{{ old('persona_testigos') == 'OTRO' ? ' selected' : '' }}>OTRO</option>
      </select>

      @error('persona_testigos')
        <br><div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <p><small>En caso de que su respuesta anterior fuera "OTRO", favor de ingresar el cargo del personal</small></p>
      <input type="text" name="persona_testigos_otro" class="form-control" value="{{ old('persona_testigos_otro') }}">
      
      @error('persona_testigos_otro')
        <br><div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

  </div>
  </div>
  </div>

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Descripción detallada del evento -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

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

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Tipo de incidente -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

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
            </div>
        </div>

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Gravedad del daño -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

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

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Factores del incidente -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

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

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Evitabilidad -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

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

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- Acciones de mejora -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-header" style="color: white; font-weight: bold; background-color: #6f42c1;">
                Acciones de mejora
            </div>
            <div class="card-body">
            <div class="row">
            <div class="col-md-12">
              <p>¿Se realizó alguna acción correctiva después del evento adverso?</p>
              <select name="acciones_mejora" class="form-control">
                <option value="" {{ old('acciones_mejora') == '' ? 'selected' : '' }} disabled>[ Seleccione una opción ]</option>
                <option value="SI" {{ old('acciones_mejora') == 'SI' ? 'selected' : '' }}>SI</option>
                <option value="NO" {{ old('acciones_mejora') == 'NO' ? 'selected' : '' }}>NO</option>
              </select>
              @error('acciones_mejora')
                <br><div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <br>

          <p>¿Cuáles son las acciones de mejora que se realizaron? <small>Puede seleccionar más de una opción</small></p>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_uno" id="defaultCheck1" {{ old('acciones_mejora_uno') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Capacitación al personal de nuevo ingreso y estudiantes.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_dos" id="defaultCheck1" {{ old('acciones_mejora_dos') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Mejoramiento de la infraestructura.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_tres" id="defaultCheck1" {{ old('acciones_mejora_tres') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Gestión de los recursos(humanos, financieros y materiales) alineado a la mejora continua.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_cuatro" id="defaultCheck1" {{ old('acciones_mejora_cuatro') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Fortalecimiento de una cultura de calidad y seguridad del paciente mediante el Modelo de Gestión de la Calidad.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_cinco" id="defaultCheck1" {{ old('acciones_mejora_cinco') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Impulso al apego de las Guías de Práctica Clínica.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_seis" id="defaultCheck1" {{ old('acciones_mejora_seis') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Implementación de mecanismos de supervisión operativa para el monitoreo de la calidad y la seguridad del paciente.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_siete" id="defaultCheck1" {{ old('acciones_mejora_siete') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Desarrollo de un Programa de Calidad y Seguridad del Paciente para el establecimiento.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="SI" name="acciones_mejora_ocho" id="defaultCheck1" {{ old('acciones_mejora_ocho') ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultCheck1">
                Capacitación a pacientes y familiares para prevenir eventos adversos.
                </label>
              </div>
            </div>
          </div>

          @if ($errors->has('acciones_mejora_uno') || $errors->has('acciones_mejora_dos') || $errors->has('acciones_mejora_tres') || $errors->has('acciones_mejora_cuatro') || $errors->has('acciones_mejora_cinco') || $errors->has('acciones_mejora_seis') || $errors->has('acciones_mejora_siete') || $errors->has('acciones_mejora_ocho'))        
          <br>
          <div class="alert alert-danger">
              Debe seleccionar al menos una acción de mejora
          </div>
          @endif

            </div>
        </div>

        <!-- ----------------------------------------------------------------------------------------- -->

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

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <center>
            <p><strong>Secretaría de Salud de Coahuila <?php echo date('Y'); ?></strong></p>
          </center>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>

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
            // Cargar las categorías al cargar la página
            $.get("{{ route('incidentes.categorias') }}", function (data) {
                $.each(data, function (index, categoria) {
                    $('#categoria').append('<option value="' + categoria.id + '">' + categoria.categoria + '</option>');
                });
            });

            // SCRIPT PARA LLENAR LAS OPCIONES SEGUN CADA CATEGORIA
            $('#categoria').change(function () {
                var categoria_id = $(this).val();
                if (categoria_id) {
                    $.get("{{ url('incidentes/opciones') }}/" + categoria_id, function (data) {
                        $('#opcion').removeAttr('disabled').empty();
                        $.each(data, function (index, opcion) {
                            $('#opcion').append('<option value="' + opcion.id + '">' + opcion.opcion + '</option>');
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

</body>
</html>
