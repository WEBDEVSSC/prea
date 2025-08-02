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

        <!-- ------------------------------------------------------------------ -->
        <center><img src="{{ public_path('img/cintilla_prea.jpg') }}" width="50%" alt="Cintilla PREA"></center>

        <table class="sin-bordes">
            <tr>
                <td>
                    <center><h2>PLATAFORMA DE REGISTRO DE EVENTOS ADVERSOS</h2></center> 
                    <center><p>Fecha de reporte del {{ $fechaInicio}} al {{ $fechaFin }}</p></center> 
                </td>
            </tr>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <h6><strong>EVENTOS REGISTRADOS</strong></h6>

        <table>
            <tbody>
                <tr>
                    <td width="25%" class="fondo-gris"><p>TOTAL</p></td>
                    <td width="25%"><p>{{ $contadorEventos }}</p></td>
                    <td colspan="2" rowspan="4"><center><img src="{{ $imageBase64Eventos }}" style="width: 100%; height: auto;"></center></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>ADVERSO</p></td>
                <td><p>{{ $eventosAdverso }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>CUASI-FALLA</p></td>
                    <td><p>{{ $eventosCuasiFalla }}</p></td>
                </tr>
                <tr>
                <td class="fondo-gris"><p>CENTINELA</p></td>
                <td><p>{{ $eventosCentinela }}</p></td>
            </tr>
            </tbody>
        </table>

            
        <!-- ------------------------------------------------------------------ -->

        <h6><strong>POR JURISDICCIÓN</strong></h6>

        <table>
            <tbody>
                <tr>
                    <td width="25%" class="fondo-gris"><p>J1 - PIEDRAS NEGRAS</p></td>
                    <td width="25%"><p>{{ $totalJ1 }}</p></td>
                    <td colspan="2" rowspan="8"><center><img src="{{ $imageBase64Jurisdiccion }}" style="width: 100%; height: auto;"></center></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J2 - ACUÑA</p></td>
                <td><p>{{ $totalJ2 }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J3 - SABINAS</p></td>
                    <td><p>{{ $totalJ3 }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J4 - MONCLOVA</p></td>
                    <td><p>{{ $totalJ4 }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J5 - C. CIÉNEGAS</p></td>
                    <td><p>{{ $totalJ5 }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J6 - TORREÓN</p></td>
                    <td><p>{{ $totalJ6 }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J7 - FCO. I. MADERO</p></td>
                    <td><p>{{ $totalJ7 }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>J8 - SALTILLO</p></td>
                    <td><p>{{ $totalJ8 }}</p></td>
                </tr>
            </tbody>
        </table>

        <!-- ------------------------------------------------------------------ -->
        <div style="page-break-before: always;"></div>
        <!-- ------------------------------------------------------------------ -->

        <h6><strong>POR SEXO</strong></h6>

        <table>
            <tbody>
                <tr>
                    <td width="25%" class="fondo-gris"><p>MASCULINO</p></td>
                    <td width="25%"><p>{{ $totalMasculino }}</p></td>
                    <td colspan="2" rowspan="2"><center><img src="{{ $imageBase64Sexo }}" style="width: 100%; height: auto;"></center></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>FEMENINO</p></td>
                    <td><p>{{ $totalFemenino }}</p></td>
                </tr>
            </tbody>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <h6><strong>POR RANGOS DE EDAD</strong></h6>

        <table>
            <tbody>
                <tr>
                    <td width="25%" class="fondo-gris"><p>PRIMERA INFANCIA<br>(0-5)</p></td>
                    <td width="25%"><p>{{ $totalPrimeraInfancia }}</p></td>
                    <td colspan="2" rowspan="6"><center><img src="{{ $imageBase64RangoDeEdad }}" style="width: 100%; height: auto;"></center></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>INFANCIA<br>(6-11)</p></td>
                    <td><p>{{ $totalInfancia }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>ADOLESCENCIA<br>(12-15)</p></td>
                    <td><p>{{ $totalAdolescencia }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>JUVENTUD<br>(16-26)</p></td>
                    <td><p>{{ $totalJuventud }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>ADULTEZ<br>(27-59)</p></td>
                    <td><p>{{ $totalAdultez }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>ADULTO MAYOR<br>(+ 60)</p></td>
                    <td><p>{{ $totalPersonaMayor }}</p></td>
                </tr>
            </tbody>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <h6><strong>TURNO</strong></h6>

         <table>
            <tbody>
                <tr>
                    <td width="25%" class="fondo-gris"><p>MATUTINO</p></td>
                    <td width="25%"><p>{{ $totalMatutino }}</p></td>
                    <td colspan="2" rowspan="4"><center><img src="{{ $imageBase64Turno }}" style="width: 100%; height: auto;"></center></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>VESPERTINO</p></td>
                    <td><p>{{ $totalVespertino }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>NOCTURNO</p></td>
                    <td><p>{{ $totalNocturno }}</p></td>
                </tr>
                <tr>
                    <td class="fondo-gris"><p>JORNADA ACUMULADA</p></td>
                    <td><p>{{ $totalJornadaAcumulada }}</p></td>
                </tr>
            </tbody>
        </table>

        <!-- ------------------------------------------------------------------ -->

        <h6><strong>DISTRIBUCIÓN POR LUGAR O AREA DEL EVENTO</strong></h6>

        <table>
            <thead>
                <tr>
                    <th class="fondo-gris"><p>ALMACEN</p></th>
                    <td><p>{{ $almacen }}</p></td>
                    <th class="fondo-gris"><p>CENDIS</p></th>
                    <td><p>{{ $cendis }}</p></td>
                    <th class="fondo-gris"><p>CEYE</p></th>
                    <td><p>{{ $ceye }}</p></td>
                    <th class="fondo-gris"><p>CONSULTA EXTERNA</p></th>
                    <td><p>{{ $consultaExterna }}</p></td>
                    <th class="fondo-gris"><p>DENTAL</p></th>
                    <td><p>{{ $dental }}</p></td>
                </tr>
                <tr>
                    <th class="fondo-gris"><p>FARMACIA</p></th>
                    <td><p>{{ $farmacia }}</p></td>
                    <th class="fondo-gris"><p>HOSPITALIZACIÓN</p></th>
                    <td><p>{{ $hospitalizacion }}</p></td>
                    <th class="fondo-gris"><p>IMAGENOLOGIÍA</p></th>
                    <td><p>{{ $imagenologia }}</p></td>
                    <th class="fondo-gris"><p>LABORATORIO</p></th>
                    <td><p>{{ $laboratorio }}</p></td>
                    <th class="fondo-gris"><p>MEDICINA PREVENTIVA</p></th>
                    <td><p>{{ $medicinaPreventiva }}</p></td>
                </tr>
                <tr>
                    <th class="fondo-gris"><p>NUTRICIÓN</p></th>
                    <td><p>{{ $nutricion }}</p></td>
                    <th class="fondo-gris"><p>PATOLOGÍA</p></th>
                    <td><p>{{ $patologia }}</p></td>
                    <th class="fondo-gris"><p>QUIROFANO</p></th>
                    <td><p>{{ $quirofano }}</p></td>
                    <th class="fondo-gris"><p>SALUD REPRODUCTIVA</p></th>
                    <td><p>{{ $saludReproductiva }}</p></td>
                    <th class="fondo-gris"><p>TOCOCIRUGÍA</p></th> 
                    <td><p>{{ $tocoCirugia }}</p></td>                   
                </tr>
                <tr>      
                    <th class="fondo-gris"><p>UCI ADULTOS</p></th>
                    <td><p>{{ $UCIAdultos }}</p></td>
                    <th class="fondo-gris"><p>UCI NEONATALES</p></th>
                    <td><p>{{ $UCINeonatales }}</p></td>
                    <th class="fondo-gris"><p>UCI PEDIATRICOS</p></th>
                    <td><p>{{ $UCIPediatricos }}</p></td>
                    <th class="fondo-gris"><p>URGENCIAS</p></th>
                    <td><p>{{ $urgencias }}</p></td>
                    <th class="fondo-gris"><p></p></th>
                    <td><p></p></td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td colspan="10" style="text-align: center; padding-top: 20px;">
                        <img src="{{ $imageBase64Lugar }}" style="width: 80%; height: auto; margin-top: 10px;">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- ------------------------------------------------------------------ -->
        <div style="page-break-after: always;"></div>
        <!-- ------------------------------------------------------------------ -->

        <h6><strong>TODOS LOS EVENTOS</strong></h6>
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