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
                <td><h2>Plataforma de Registro de Eventos Adversos</h2></td>
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



    </body>
</html>
