<html>
    <body>
        <style>
            body {
                font-family: Helvetica, sans-serif; /* Fuente estándar */
            }

            h1 {
                color: blue;
                font-family: 'Times-Roman', serif; /* Fuente Times-Roman */
            }

            p {
                font-size: 8pt;
                margin: 0; /* Eliminar márgenes */
                padding: 0; /* Eliminar padding */
                line-height: 1.2; /* Controla el espaciado entre líneas */
            }

            table {
                width: 100%;
                margin-bottom: 10px;
                border-collapse: collapse; /* Esto asegura que las líneas entre celdas sean continuas */
            }

            td {
                padding: 8px; /* Espaciado interno de las celdas */
                border: 1px solid black; /* Línea negra alrededor de cada celda */
            }

            th {
                padding: 8px;
                border: 1px solid black; /* Líneas también para las cabeceras (si las tienes) */
                text-align: left;
            }

            .fondo-gris {
                background-color: #D3D3D3; /* Gris claro */
                font-weight: bold; /* Opcional: hace el texto en negrita */
            }
        </style>

        <table>
            <tr>
                <td><h2>Plataforma de Registro de Eventos Adversos</h2><br><small>Secretaría de Salud de Coahuila de Zaragoza</small></td>
                <td><img src="data:image/png;base64,{{ $imageData }}" alt="QR Code" width="100px"></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->
       
        <table>
            <tr>
                <td class="fondo-gris"><p>CLASIFICACIÓN DEL EVENTO</p></td>
                <td class="fondo-gris"><p>FOLIO</p></td>
                <td class="fondo-gris"><p>FECHA REGISTRO</p></td>
                <td class="fondo-gris"><p>GRAVEDAD</p></td>
            </tr>
            <tr>
                <td><p>{{ $evento->clasificacion_del_evento }}</p></td>
                <td><p>{{ $evento->folio }}</p></td>
                <td><p>{{ $evento->created_at }}</p></td>
                <td><p>{{ $evento->gravedad }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>UNIDAD</p></td>
                <td class="fondo-gris"><p>JURISDICCIÓN</p></td>
            </tr>
            <tr>
                <td><p>{{ $evento->unidad }} <br> {{ $evento->unidad_nombre }}</p></td>
                <td><p>{{ $evento->jurisdiccion }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>EDAD</p></td>
                <td class="fondo-gris"><p>SEXO</p></td>
                <td class="fondo-gris"><p>SERVICIO</p></td>
                <td class="fondo-gris"><p>TURNO</p></td>
            </tr>
            <tr>
                <td><p>{{ $evento->edad }}</p></td>
                <td><p>{{ $evento->sexo }}</p></td>
                <td><p>{{ $evento->servicio }}</p></td>
                <td><p>{{ $evento->turno }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>FECHA/HORA</p></td>
                <td class="fondo-gris"><p>PERSONA INVOLUCRADA</p></td>
                <td class="fondo-gris"><p>TESTIGOS</p></td>
            </tr>
            <tr>
                <td><p>{{ $evento->fecha_hora }}</p></td>
                <td><p>{{ $evento->persona_involucrada }}</p></td>
                <td><p>{{ $evento->persona_testigos }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>DESCRIPCIÓN</p></td>
            </tr>
            <tr>
                <td><p>{{ $evento->descripcion }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>CLASIFICACIÓN</p></td>
            </tr>
            <tr>
                <td><p>{{ $evento->incidente_categoria_label }} - {{ $evento->incidente_descripcion_label }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>FACTORES DEL INCIDENTE</p></td>
            </tr>
            <tr>
                <td>

                    <ul>
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

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>¿CONSIDERA QUE SE PUDO HABER EVITADO?</p></td>
                <td><p>{{ $evento->evitar_evento }}</p></td>
            </tr>
            <tr>
                <td class="fondo-gris"><p>¿COMO CONSIDERA QUE SE PUDO HABER EVITADO?</p></td>
                <td><p>{{ $evento->como_evitar_evento }}</p></td>
            </tr>
            <tr>
                <td class="fondo-gris"><p>¿SE LE PROPORCIONO INFORMACIÓN AL PACIENTE O SU FAMILIA?</p></td>
                <td><p>{{ $evento->proporciono_informacion }}</p></td>
            </tr>
            <tr>
                <td class="fondo-gris"><p>¿QUIEN LA PROPORCIONO?</p></td>
                <td><p>{{ $evento->quien_proporciono }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <div style="page-break-before: always;"></div>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>¿SE REALIZÓ ALUGUNA ACCIÓN CORRECTIVA DESPUÉS DEL EVENTO ADVERSO?</p></td>
                <td><p>{{ $evento->acciones_mejora }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->


        <table>
            <tr>
                <td class="fondo-gris"><p>ACCIONES DE MEJORA QUE SE REALIZARÓN</p></td>
            </tr>
            <tr>
                <td>

                    <ul>
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
                                    Gestión de los recursos(humanos, financieros y materiales) alineado a la mejora continua.
                                @else
                                    <del>Gestión de los recursos(humanos, financieros y materiales) alineado a la mejora continua.</del>
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

        <!-- ------------------------------------------------------------------ -->

    </body>

</html>
