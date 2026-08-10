<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Evento Adverso</title>
    <style>
        @page {
            margin: 25px 30px;
        }

        body {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 8pt;
            color: #2b2b2b;
            line-height: 1.3;
        }

        /* Tabla Encabezado */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            border-bottom: 2px solid #1a365d;
            padding-bottom: 8px;
        }

        .header-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .header-title h2 {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 14pt;
            font-weight: bold;
            color: #1a365d;
            margin: 0 0 4px 0;
            text-transform: uppercase;
        }

        .header-title small {
            font-size: 8.5pt;
            color: #4a5568;
            font-weight: 600;
        }

        /* Tablas de Datos */
        table.data-table {
            width: 100%;
            margin-bottom: 8px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table.data-table td {
            padding: 5px 7px;
            border: 1px solid #cbd5e0;
            vertical-align: top;
            word-wrap: break-word;
        }

        /* Encabezados de celdas */
        .fondo-gris {
            background-color: #edf2f7;
            font-weight: bold;
            color: #2d3748;
            font-size: 7.5pt;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        p {
            margin: 0;
            padding: 0;
        }

        /* Estilo de Listas */
        ul.list-factores {
            margin: 2px 0;
            padding-left: 18px;
        }

        ul.list-factores li {
            margin-bottom: 3px;
            color: #2d3748;
        }

        del {
            color: #a0aec0;
            text-decoration: line-through;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>

    <!-- Encabezado Principal -->
    <table class="header-table">
        <tr>
            <td class="header-title">
                <h2>Plataforma de Registro de Eventos Adversos</h2>
                <small>Secretaría de Salud de Coahuila de Zaragoza</small>
            </td>
            <td style="text-align: right; width: 105px;">
                <img src="data:image/png;base64,{{ $imageData }}" alt="QR Code" width="90px">
            </td>
        </tr>
    </table>

    <!-- Bloque 1: Generalidades -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris" style="width: 30%;"><p>CLASIFICACIÓN DEL EVENTO</p></td>
            <td class="fondo-gris" style="width: 20%;"><p>FOLIO</p></td>
            <td class="fondo-gris" style="width: 25%;"><p>FECHA REGISTRO</p></td>
            <td class="fondo-gris" style="width: 25%;"><p>GRAVEDAD</p></td>
        </tr>
        <tr>
            <td><p><strong>{{ $evento->clasificacion_del_evento }}</strong></p></td>
            <td><p>{{ $evento->folio }}</p></td>
            <td><p>{{ $evento->created_at }}</p></td>
            <td><p>{{ $evento->gravedad }}</p></td>
        </tr>
    </table>

    <!-- Bloque 2: Ubicación -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris" style="width: 70%;"><p>UNIDAD</p></td>
            <td class="fondo-gris" style="width: 30%;"><p>JURISDICCIÓN</p></td>
        </tr>
        <tr>
            <td><p>{{ $evento->unidad }} <br><span style="color: #4a5568;">{{ $evento->unidad_nombre }}</span></p></td>
            <td><p>{{ $evento->jurisdiccion }}</p></td>
        </tr>
    </table>

    <!-- Bloque 3: Datos Paciente / Turno -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris" style="width: 15%;"><p>EDAD</p></td>
            <td class="fondo-gris" style="width: 15%;"><p>SEXO</p></td>
            <td class="fondo-gris" style="width: 45%;"><p>SERVICIO</p></td>
            <td class="fondo-gris" style="width: 25%;"><p>TURNO</p></td>
        </tr>
        <tr>
            <td><p>{{ $evento->edad }}</p></td>
            <td><p>{{ $evento->sexo }}</p></td>
            <td><p>{{ $evento->servicio }}</p></td>
            <td><p>{{ $evento->turno }}</p></td>
        </tr>
    </table>

    <!-- Bloque 4: Involucrados -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris" style="width: 25%;"><p>FECHA/HORA</p></td>
            <td class="fondo-gris" style="width: 37.5%;"><p>PERSONA INVOLUCRADA</p></td>
            <td class="fondo-gris" style="width: 37.5%;"><p>TESTIGOS</p></td>
        </tr>
        <tr>
            <td><p>{{ $evento->fecha_hora }}</p></td>
            <td><p>{{ $evento->persona_involucrada }}</p></td>
            <td><p>{{ $evento->persona_testigos }}</p></td>
        </tr>
    </table>

    <!-- Bloque 5: Descripción -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris"><p>DESCRIPCIÓN</p></td>
        </tr>
        <tr>
            <td style="text-align: justify;"><p>{{ $evento->descripcion }}</p></td>
        </tr>
    </table>

    <!-- Bloque 6: Categoría -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris"><p>CLASIFICACIÓN DEL INCIDENTE</p></td>
        </tr>
        <tr>
            <td><p>{{ $evento->incidente_categoria_label }} - {{ $evento->incidente_descripcion_label }}</p></td>
        </tr>
    </table>

    <!-- Bloque 7: Factores -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris"><p>FACTORES DEL INCIDENTE</p></td>
        </tr>
        <tr>
            <td>
                <ul class="list-factores">
                    <li>
                        <p>
                        @if($evento->factores_incidente_uno)
                            Relacionados con las características del paciente
                        @else
                            <del>Relacionados con las características del paciente</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_dos)
                            Relacionados con la aplicación de las indicaciones, protocolos, manuales, lineamientos y guías de práctica clínica.
                        @else
                            <del>Relacionados con la aplicación de las indicaciones, protocolos, manuales, lineamientos y guías de práctica clínica.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_tres)
                            Individuales asociadas con los integrantes del equipo.
                        @else
                            <del>Individuales asociadas con los integrantes del equipo.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_cuatro)
                            Relacionados con el trabajo en equipo.
                        @else
                            <del>Relacionados con el trabajo en equipo.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_cinco)
                            Relacionados con el ambiente de trabajo y el entorno.
                        @else
                            <del>Relacionados con el ambiente de trabajo y el entorno.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_seis)
                            Organizacionales del establecimiento de atención médica.
                        @else
                            <del>Organizacionales del establecimiento de atención médica.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_siete)
                            Institucionales o del ambiente externo.
                        @else
                            <del>Institucionales o del ambiente externo.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->factores_incidente_ocho)
                            Otro
                        @else
                            <del>Otro</del>
                        @endif
                        </p>
                    </li>
                </ul>
            </td>
        </tr>
    </table>

    <!-- Bloque 8: Evitabilidad -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris" style="width: 50%;"><p>¿CONSIDERA QUE SE PUDO HABER EVITADO?</p></td>
            <td style="width: 50%;"><p>{{ $evento->evitar_evento }}</p></td>
        </tr>
        <tr>
            <td class="fondo-gris"><p>¿CÓMO CONSIDERA QUE SE PUDO HABER EVITADO?</p></td>
            <td><p>{{ $evento->como_evitar_evento }}</p></td>
        </tr>
        <tr>
            <td class="fondo-gris"><p>¿SE LE PROPORCIONÓ INFORMACIÓN AL PACIENTE O SU FAMILIA?</p></td>
            <td><p>{{ $evento->proporciono_informacion }}</p></td>
        </tr>
        <tr>
            <td class="fondo-gris"><p>¿QUIÉN LA PROPORCIONÓ?</p></td>
            <td><p>{{ $evento->quien_proporciono }}</p></td>
        </tr>
    </table>

    <!-- Salto de página -->
    <div class="page-break"></div>

    <!-- Bloque 9: Acciones Correctivas (Página 2) -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris" style="width: 60%;"><p>¿SE REALIZÓ ALGUNA ACCIÓN CORRECTIVA DESPUÉS DEL EVENTO ADVERSO?</p></td>
            <td style="width: 40%;"><p>{{ $evento->acciones_mejora }}</p></td>
        </tr>
    </table>

    <!-- Bloque 10: Lista de Acciones -->
    <table class="data-table">
        <tr>
            <td class="fondo-gris"><p>ACCIONES DE MEJORA QUE SE REALIZARON</p></td>
        </tr>
        <tr>
            <td>
                <ul class="list-factores">
                    <li>
                        <p>
                        @if($evento->acciones_mejora_uno)
                            Capacitación al personal de nuevo ingreso y estudiantes.
                        @else
                            <del>Capacitación al personal de nuevo ingreso y estudiantes.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_dos)
                            Mejoramiento de la infraestructura.
                        @else
                            <del>Mejoramiento de la infraestructura.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_tres)
                            Gestión de los recursos (humanos, financieros y materiales) alineado a la mejora continua.
                        @else
                            <del>Gestión de los recursos (humanos, financieros y materiales) alineado a la mejora continua.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_cuatro)
                            Fortalecimiento de una cultura de calidad y seguridad del paciente mediante el Modelo de Gestión de la Calidad.
                        @else
                            <del>Fortalecimiento de una cultura de calidad y seguridad del paciente mediante el Modelo de Gestión de la Calidad.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_cinco)
                            Impulso al apego de las Guías de Práctica Clínica.
                        @else
                            <del>Impulso al apego de las Guías de Práctica Clínica.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_seis)
                            Implementación de mecanismos de supervisión operativa para el monitoreo de la calidad y la seguridad del paciente.
                        @else
                            <del>Implementación de mecanismos de supervisión operativa para el monitoreo de la calidad y la seguridad del paciente.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_siete)
                            Desarrollo de un Programa de Calidad y Seguridad del Paciente para el establecimiento.
                        @else
                            <del>Desarrollo de un Programa de Calidad y Seguridad del Paciente para el establecimiento.</del>
                        @endif
                        </p>
                    </li>
                    <li>
                        <p>
                        @if($evento->acciones_mejora_ocho)
                            Capacitación a pacientes y familiares para prevenir eventos adversos.
                        @else
                            <del>Capacitación a pacientes y familiares para prevenir eventos adversos.</del>
                        @endif
                        </p>
                    </li>
                </ul>
            </td>
        </tr>
    </table>

</body>
</html>