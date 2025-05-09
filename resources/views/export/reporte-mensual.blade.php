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

            .sin-bordes td,
            .sin-bordes th {
                border: none;
            }

            .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
                font-size: 8pt;
                color: gray;
            }
        </style>

        <table class="sin-bordes">
            <tr>
                <td><h2>Plataforma de Registro de Eventos Adversos</h2>
            </tr>
            <tr>
                <td><p>Secretaría de Salud de Coahuila de Zaragoza</p></td>
                <td><p>Fecha de reporte del {{ $fechaInicio}} al {{ $fechaFin }}</p></td>
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

        <p>RANGOS DE EDAD LACTANTES {{ $rangoEdadLactantes }}</p>

        <p><strong>TODOS LOS EVENTOS</strong></p>
        <table>
            <thead>
                <tr>
                    <th class="fondo-gris"><p>TIPO</p></th>
                    <th class="fondo-gris"><p>FECHA</p></th>
                    <th class="fondo-gris"><p>UNIDAD</p></th>
                    <th class="fondo-gris"><p>FOLIO</p></th>
                    <th class="fondo-gris"><p>CLASIFICACION</p></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listaDeEventos as $evento)
                    <tr>
                        <td><p>{{ $evento->clasificacion_del_evento }}</p></td>
                        <td><p>{{ $evento->fecha_hora }}</p></td>
                        <td><p>{{ $evento->unidad_nombre}}</p></td>                        
                        <td><p>{{ $evento->folio }}</p></td>
                        <td><p>{{ $evento->incidente_categoria_label }}</p></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Secretaría de Salud de Coahuila | Subdirección de Calidad | Unidad de Planeación</p>
        </div>

    </body>
</html>