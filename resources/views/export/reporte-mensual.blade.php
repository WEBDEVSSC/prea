<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Eventos Adversos</title>
    <style>
        @page {
            margin: 60px 40px;
        }

        body {
            font-family: "Helvetica", Arial, sans-serif;
            font-size: 9pt;
            color: #2e2e2e;
            line-height: 1.4;
        }

        /* ---------------------- PORTADA ---------------------- */
        .portada {
            text-align: center;
            margin-top: 200px;
        }

        .portada .cintilla {
            width: 100%;
            text-align: center;
            margin-bottom: 60px;
        }

        .portada .cintilla img {
            width: 60%;
        }

        .portada h1 {
            font-size: 20pt;
            color: #6A1B9A;
            text-transform: uppercase;
            font-weight: bold;
        }

        .portada h2 {
            font-size: 12pt;
            color: #8E24AA;
            margin-top: 10px;
        }

        .portada .info {
            margin-top: 100px;
            font-size: 10pt;
            color: #555;
        }

        /* ---------------------- ENCABEZADO ---------------------- */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 45%;
            margin-bottom: 10px;
        }

        .title {
            font-size: 16pt;
            color: #6A1B9A;
            font-weight: bold;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 11pt;
            color: #8E24AA;
        }

        /* ---------------------- TITULOS ---------------------- */
        h2 {
            font-size: 12pt;
            color: #6A1B9A;
            border-bottom: 2px solid #6A1B9A;
            text-transform: uppercase;
            margin-top: 30px;
            padding-bottom: 4px;
        }

        h3 {
            font-size: 10pt;
            color: #8E24AA;
            margin-top: 20px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        /* ---------------------- TABLAS ---------------------- */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #E1BEE7;
            color: #4A148C;
            font-weight: bold;
            text-align: center;
        }

        .fondo-gris {
            background-color: #f5f5f5;
            font-weight: bold;
            color: #333;
            width: 25%;
        }

        .center {
            text-align: center;
        }

        .chart {
            width: 90%;
            height: auto;
            margin: 5px 0;
        }

        /* ---------------------- PÁGINAS ---------------------- */
        .page-break {
            page-break-before: always;
        }

        /* ---------------------- PIE DE PÁGINA ---------------------- */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8pt;
            color: #777;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
    </style>
</head>
<body>

    <!-- ============================================================= -->
    <!--                          PORTADA                              -->
    <!-- ============================================================= -->
    <div class="portada">
        <div class="cintilla">
            <img src="{{ public_path('img/cintilla_prea.jpg') }}" alt="Cintilla Institucional">
        </div>
        <h1>Secretaría de Salud de Coahuila</h1>
        <h2>Subsecretaría de Atención a la Salud - Subdirección de Calidad</h2>
        <div class="info">
            <p><strong>Reporte de Eventos Adversos</strong></p>
            <p>Periodo del <strong>{{ $fechaInicio }}</strong> al <strong>{{ $fechaFin }}</strong></p>
            <p>Generado automáticamente por la Plataforma de Registro de Eventos Adversos</p>
        </div>
    </div>

    <div class="page-break"></div>

    <!-- ============================================================= -->
    <!--                          CONTENIDO                            -->
    <!-- ============================================================= -->

    <h2>Resumen general</h2>
    <table>
        <tbody>
            <tr>
                <td class="fondo-gris">Total de eventos</td>
                <td>{{ $contadorEventos }}</td>
                <td class="fondo-gris">Adversos</td>
                <td>{{ $eventosAdverso }}</td>
            </tr>
            <tr>
                <td class="fondo-gris">Cuasi-falla</td>
                <td>{{ $eventosCuasiFalla }}</td>
                <td class="fondo-gris">Centinela</td>
                <td>{{ $eventosCentinela }}</td>
            </tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64Eventos }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h2>Distribución por nivel de atención</h2>
    <table>
        <tbody>
            <tr>
                <td class="fondo-gris">Primer nivel</td>
                <td>{{ $totalPrimerNivel }}</td>
                <td class="fondo-gris">Segundo nivel</td>
                <td>{{ $totalSegundoNivel }}</td>
            </tr>
            <tr>
                <td class="fondo-gris">Tercer nivel</td>
                <td>{{ $totalTercerNivel }}</td>
                <td class="fondo-gris">Total</td>
                <td>{{ $contadorEventos }}</td>
            </tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64NivelDeAtencion }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h2>Distribución geográfica</h2>
    <h3>Por Jurisdicción Sanitaria</h3>
    <table>
        <tbody>
            <tr><td class="fondo-gris">J1 - Piedras Negras</td><td>{{ $totalJ1 }}</td></tr>
            <tr><td class="fondo-gris">J2 - Acuña</td><td>{{ $totalJ2 }}</td></tr>
            <tr><td class="fondo-gris">J3 - Sabinas</td><td>{{ $totalJ3 }}</td></tr>
            <tr><td class="fondo-gris">J4 - Monclova</td><td>{{ $totalJ4 }}</td></tr>
            <tr><td class="fondo-gris">J5 - Cuatro Ciénegas</td><td>{{ $totalJ5 }}</td></tr>
            <tr><td class="fondo-gris">J6 - Torreón</td><td>{{ $totalJ6 }}</td></tr>
            <tr><td class="fondo-gris">J7 - Fco. I. Madero</td><td>{{ $totalJ7 }}</td></tr>
            <tr><td class="fondo-gris">J8 - Saltillo</td><td>{{ $totalJ8 }}</td></tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64Jurisdiccion }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h2>Distribución demográfica</h2>

    <h3>Por sexo</h3>
    <table>
        <tbody>
            <tr><td class="fondo-gris">Masculino</td><td>{{ $totalMasculino }}</td></tr>
            <tr><td class="fondo-gris">Femenino</td><td>{{ $totalFemenino }}</td></tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64Sexo }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h3>Por rango de edad</h3>
    <table>
        <tbody>
            <tr><td class="fondo-gris">Primera infancia (0-5)</td><td>{{ $totalPrimeraInfancia }}</td></tr>
            <tr><td class="fondo-gris">Infancia (6-11)</td><td>{{ $totalInfancia }}</td></tr>
            <tr><td class="fondo-gris">Adolescencia (12-15)</td><td>{{ $totalAdolescencia }}</td></tr>
            <tr><td class="fondo-gris">Juventud (16-26)</td><td>{{ $totalJuventud }}</td></tr>
            <tr><td class="fondo-gris">Adultez (27-59)</td><td>{{ $totalAdultez }}</td></tr>
            <tr><td class="fondo-gris">Adulto mayor (+60)</td><td>{{ $totalPersonaMayor }}</td></tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64RangoDeEdad }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h2>Distribución laboral</h2>

    <h3>Por turno</h3>
    <table>
        <tbody>
            <tr><td class="fondo-gris">Matutino</td><td>{{ $totalMatutino }}</td></tr>
            <tr><td class="fondo-gris">Vespertino</td><td>{{ $totalVespertino }}</td></tr>
            <tr><td class="fondo-gris">Nocturno</td><td>{{ $totalNocturno }}</td></tr>
            <tr><td class="fondo-gris">Jornada acumulada</td><td>{{ $totalJornadaAcumulada }}</td></tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64Turno }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->

    <div class="page-break"></div>
    <h2>Distribución por área del evento</h2>
    <table>
        <thead>
            <tr>
                <th class="fondo-gris">Área</th><th class="fondo-gris">Total</th>
                <th class="fondo-gris">Área</th><th class="fondo-gris">Total</th>
                <th class="fondo-gris">Área</th><th class="fondo-gris">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Almacén</td><td>{{ $almacen }}</td><td>CENDIS</td><td>{{ $cendis }}</td><td>CEYE</td><td>{{ $ceye }}</td></tr>
            <tr><td>Consulta externa</td><td>{{ $consultaExterna }}</td><td>Dental</td><td>{{ $dental }}</td><td>Farmacia</td><td>{{ $farmacia }}</td></tr>
            <tr><td>Hospitalización</td><td>{{ $hospitalizacion }}</td><td>Imagenología</td><td>{{ $imagenologia }}</td><td>Laboratorio</td><td>{{ $laboratorio }}</td></tr>
            <tr><td>Medicina preventiva</td><td>{{ $medicinaPreventiva }}</td><td>Nutrición</td><td>{{ $nutricion }}</td><td>Patología</td><td>{{ $patologia }}</td></tr>
            <tr><td>Quirófano</td><td>{{ $quirofano }}</td><td>Salud reproductiva</td><td>{{ $saludReproductiva }}</td><td>Tococirugía</td><td>{{ $tocoCirugia }}</td></tr>
            <tr><td>UCI Adultos</td><td>{{ $UCIAdultos }}</td><td>UCI Neonatales</td><td>{{ $UCINeonatales }}</td><td>UCI Pediátricos</td><td>{{ $UCIPediatricos }}</td></tr>
            <tr><td>Urgencias</td><td>{{ $urgencias }}</td><td colspan="4"></td></tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64Lugar }}" class="chart" style="width: 80%;">
    </div>

     <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h2>Distribución Por Tipo de Incidente</h2>

    <h3>Por turno</h3>
    <table>
        <tbody>
            <tr><td class="fondo-gris">Acciones Esenciales para la Seguridad del Paciente</td><td>{{ $tipoAESP }}</td></tr>
            <tr><td class="fondo-gris">Medicación</td><td>{{ $tipoMMU }}</td></tr>
            <tr><td class="fondo-gris">Prevención y Control de Infecciones</td><td>{{ $tipoPCI }}</td></tr>
            <tr><td class="fondo-gris">Dispositivos y Equipos Biomédicos</td><td>{{ $tipoDEB }}</td></tr>
            <tr><td class="fondo-gris">Acceso y Continuidad de la Atención</td><td>{{ $tipoACC }}</td></tr>
            <tr><td class="fondo-gris">Derechos del Paciente</td><td>{{ $tipoPFR }}</td></tr>
            <tr><td class="fondo-gris">Servicios Auxiliares de Diagnóstico</td><td>{{ $tipoSAP }}</td></tr>
            <tr><td class="fondo-gris">Nutrición</td><td>{{ $tipoNUT }}</td></tr>
            <tr><td class="fondo-gris">Anestesia y Atención Quirúrgica</td><td>{{ $tipoASC }}</td></tr>
            <tr><td class="fondo-gris">Gestión de la Comunicación y la Información</td><td>{{ $tipoMCI }}</td></tr>
            <tr><td class="fondo-gris">Otro Incidente</td><td>{{ $tipoOTRO }}</td></tr>
        </tbody>
    </table>
    <div class="center">
        <img src="{{ $imageBase64TipoDeIncidente }}" class="chart">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>
    <h2>Listado detallado de eventos</h2>
    <table>
        <thead>
            <tr>
                <th class="fondo-gris">Tipo</th>
                <th class="fondo-gris">Fecha</th>
                <th class="fondo-gris">Unidad</th>
                <th class="fondo-gris">Folio</th>
                <th class="fondo-gris">Clasificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listaDeEventos as $evento)
            <tr>
                <td>{{ $evento->clasificacion_del_evento }}</td>
                <td>{{ $evento->fecha_hora }}</td>
                <td>{{ $evento->unidad_nombre }}</td>
                <td>{{ $evento->folio }}</td>
                <td>{{ $evento->incidente_categoria_label }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ============================================================= -->
    <div class="footer">
        Secretaría de Salud de Coahuila | Subdirección de Calidad | Unidad de Planeación
    </div>

</body>
</html>
