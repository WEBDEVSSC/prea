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
                <td><h2>Plataforma de Registro de Eventos Adversos</h2>
                <br>
                <small>Secretaría de Salud de Coahuila de Zaragoza</small>
                <br>
                <p>Fecha de reporte del {{ $fechaInicio}} al {{ $fechaFin }}</p></td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <table>
            <tr>
                <td class="fondo-gris"><p>TOTAL DE EVENTOS</p></td>
                <td class="fondo-gris"><p>ADVERSO</p></td>
                <td class="fondo-gris"><p>CUASI-FALLA</p></td>
                <td class="fondo-gris"><p>CENTINELA</p></td>
            </tr>
            <tr>
                <td><p>{{ $contadorEventos }}</p></td>
                <td><p>{{ $eventosAdverso }}</p></td>
                <td><p>{{ $eventosCuasiFalla }}</p></td>
                <td><p>{{ $eventosCentinela }}</p></td>
            </tr>
        </table>
    </body>
</html>