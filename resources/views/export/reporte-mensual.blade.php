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

        <h2 style="text-align:center; margin-bottom: 10px;">Distribución General de Eventos</h2>

        <table style="width: 100%; border-collapse: collapse; font-size: 10pt;">
            <thead>
                <tr style="background-color: #f4f4f4;">
                    <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                    <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Tipo de Evento</th>
                    <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid #ccc; text-align:center;">
                        <span style="display:inline-block; width:12px; height:12px; background-color:#38bdf8; border-radius:2px;"></span>
                    </td>
                    <td style="border: 1px solid #ccc; padding: 5px;">Eventos Adversos</td>
                    <td style="border: 1px solid #ccc; text-align:center;">{{ $eventosAdverso }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ccc; text-align:center;">
                        <span style="display:inline-block; width:12px; height:12px; background-color:#facc15; border-radius:2px;"></span>
                    </td>
                    <td style="border: 1px solid #ccc; padding: 5px;">Cuasi-falla</td>
                    <td style="border: 1px solid #ccc; text-align:center;">{{ $eventosCuasiFalla }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ccc; text-align:center;">
                        <span style="display:inline-block; width:12px; height:12px; background-color:#ef4444; border-radius:2px;"></span>
                    </td>
                    <td style="border: 1px solid #ccc; padding: 5px;">Centinela</td>
                    <td style="border: 1px solid #ccc; text-align:center;">{{ $eventosCentinela }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ccc;"></td>
                    <td style="border: 1px solid #ccc; padding: 5px;">Total de Eventos</td>
                    <td style="border: 1px solid #ccc; text-align:center;">{{ $contadorEventos }}</td>
                </tr>
            </tbody>
        </table>

        <div style="text-align:center; margin-top:20px;">
            <img src="{{ $imageBase64Eventos }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
        </div>


    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>

    <h2 style="text-align:center; margin-bottom: 10px;">Distribución por Nivel de Atención</h2>

    <table style="width: 100%; border-collapse: collapse; font-size: 10pt;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Nivel de Atención</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #eab308; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Primer Nivel</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalPrimerNivel }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #a855f7; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Segundo Nivel</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalSegundoNivel }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f97316; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Tercer Nivel</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalTercerNivel }}</td>
            </tr>
        </tbody>
    </table>


    <div style="text-align:center; margin-top:20px;">
        <img src="{{ $imageBase64NivelDeAtencion }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
    </div>


    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>

    <h2 style="text-align:center; margin-bottom: 10px;">Distribución Geográfica</h2>
    <h3 style="text-align:center; margin-bottom: 10px;">Por Jurisdicción Sanitaria</h3>

    <table style="width: 100%; border-collapse: collapse; font-size: 10pt;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Jurisdicción Sanitaria</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #facc15; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J1 - Piedras Negras</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ1 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f97316; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J2 - Acuña</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ2 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f87171; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J3 - Sabinas</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ3 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #34d399; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J4 - Monclova</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ4 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #60a5fa; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J5 - Cuatro Ciénegas</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ5 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #a78bfa; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J6 - Torreón</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ6 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f472b6; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J7 - Fco. I. Madero</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ7 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #fb923c; margin: auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">J8 - Saltillo</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJ8 }}</td>
            </tr>
        </tbody>
    </table>


    <div style="text-align:center; margin-top:20px;">
        <img src="{{ $imageBase64Jurisdiccion }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
    </div>


    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>

    <h2 style="text-align:center; margin-bottom: 10px;">Distribución Demográfica</h2>
    <h3 style="text-align:center; margin-bottom: 10px;">Por Sexo</h3>

    <table style="width: 60%; margin: 0 auto; border-collapse: collapse; font-size: 10pt;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Sexo</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #60a5fa; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Masculino</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalMasculino }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f472b6; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Femenino</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalFemenino }}</td>
            </tr>
        </tbody>
    </table>


    <div style="text-align:center; margin-top:20px;">
        <img src="{{ $imageBase64Sexo }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>

    <h2 style="text-align:center; margin-bottom: 10px;">Distribución Demográfica</h2>
    <h3 style="text-align:center; margin-bottom: 10px;">Por Rango de Edad</h3>

    <table style="width: 70%; margin: 0 auto; border-collapse: collapse; font-size: 10pt;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Rango de Edad</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #facc15; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Primera infancia (0-5 años)</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalPrimeraInfancia }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f97316; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Infancia (6-11 años)</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalInfancia }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f87171; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Adolescencia (12-15 años)</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalAdolescencia }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #34d399; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Juventud (16-26 años)</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJuventud }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #60a5fa; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Adultez (27-59 años)</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalAdultez }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #a78bfa; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Persona Mayor (60 años o más)</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalPersonaMayor }}</td>
            </tr>
        </tbody>
    </table>


    <div style="text-align:center; margin-top:20px;">
        <img src="{{ $imageBase64RangoDeEdad }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>

    <h2 style="text-align:center; margin-bottom: 10px;">Distribución Laboral</h2>
    <h3 style="text-align:center; margin-bottom: 10px;">Por Turno</h3>

    <table style="width: 60%; margin: 0 auto; border-collapse: collapse; font-size: 10pt;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Turno</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #f43f5e; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Matutino</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalMatutino }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #10b981; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Vespertino</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalVespertino }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #3b82f6; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Nocturno</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalNocturno }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <div style="width: 15px; height: 15px; background-color: #8b5cf6; margin: 0 auto; border-radius: 3px;"></div>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Jornada Acumulada</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $totalJornadaAcumulada }}</td>
            </tr>
        </tbody>
    </table>


    <div style="text-align:center; margin-top:20px;">
        <img src="{{ $imageBase64Turno }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
    </div>


    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->

    <div class="page-break"></div>

<h2 style="text-align: center; margin-bottom: 10px;">Distribución por área del evento</h2>

<table style="width: 100%; border-collapse: collapse; font-size: 9pt; margin-top: 10px;">
    <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Área</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Total</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Área</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Total</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Área</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#f43f5e;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Almacén</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $almacen }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#10b981;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">CENDIS</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $cendis }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#3b82f6;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">CEYE</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $ceye }}</td>
            </tr>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#8b5cf6;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Consulta externa</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $consultaExterna }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#f59e0b;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Dental</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $dental }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#ef4444;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Farmacia</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $farmacia }}</td>
            </tr>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#14b8a6;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Hospitalización</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $hospitalizacion }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#6366f1;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Imagenología</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $imagenologia }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#84cc16;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Laboratorio</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $laboratorio }}</td>
            </tr>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#ec4899;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Medicina preventiva</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $medicinaPreventiva }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#0ea5e9;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Nutrición</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $nutricion }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#eab308;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Patología</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $patologia }}</td>
            </tr>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#a855f7;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Quirófano</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $quirofano }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#22c55e;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Salud reproductiva</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $saludReproductiva }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#e11d48;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Tococirugía</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $tocoCirugia }}</td>
            </tr>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#3f3f46;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">UCI Adultos</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $UCIAdultos }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#f97316;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">UCI Neonatales</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $UCINeonatales }}</td>

                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#4ade80;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">UCI Pediátricos</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $UCIPediatricos }}</td>
            </tr>
            <tr>
                <td style="text-align:center;"><div style="width:15px;height:15px;background-color:#6b7280;border-radius:3px;margin:auto;"></div></td>
                <td style="padding:6px;border:1px solid #ddd;">Urgencias</td>
                <td style="text-align:right;padding:6px;border:1px solid #ddd;">{{ $urgencias }}</td>
                <td colspan="6" style="border: 1px solid #ddd;"></td>
            </tr>
        </tbody>
    </table>


<div style="text-align:center; margin-top:20px;">
    <img src="{{ $imageBase64Lugar }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
</div>


     <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    
    <div class="page-break"></div>

    <h2 style="text-align:center; margin-bottom: 10px;">Distribución por Tipo de Incidente</h2>

    <table style="width: 100%; border-collapse: collapse; font-size: 10pt;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Color</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Tipo de Incidente</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: center;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#ef4444; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Acciones Esenciales para la Seguridad del Paciente</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoAESP }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#f97316; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Medicación</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoMMU }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#eab308; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Prevención y Control de Infecciones</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoPCI }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#22c55e; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Dispositivos y Equipos Biomédicos</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoDEB }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#14b8a6; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Acceso y Continuidad de la Atención</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoACC }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#0ea5e9; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Derechos del Paciente</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoPFR }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#3b82f6; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Servicios Auxiliares de Diagnóstico</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoSAP }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#6366f1; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Nutrición</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoNUT }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#a855f7; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Anestesia y Atención Quirúrgica</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoASC }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#ec4899; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Gestión de la Comunicación y la Información</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoMCI }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; text-align:center;">
                    <span style="display:inline-block; width:14px; height:14px; background-color:#6b7280; border-radius:3px;"></span>
                </td>
                <td style="border: 1px solid #ccc; padding: 5px;">Otro Incidente</td>
                <td style="border: 1px solid #ccc; text-align:center;">{{ $tipoOTRO }}</td>
            </tr>
        </tbody>
    </table>


    <div style="text-align:center; margin-top:20px;">
        <img src="{{ $imageBase64TipoDeIncidente }}" class="chart" style="width: 500px; height: 300px; object-fit: contain;">
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
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Tipo</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Fecha</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Unidad</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Folio</th>
                <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">Clasificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listaDeEventos as $evento)
            <tr>
                <td style="border: 1px solid #ccc; padding: 5px;">{{ $evento->clasificacion_del_evento }}</td>
                <td style="border: 1px solid #ccc; padding: 5px;">{{ $evento->fecha_hora }}</td>
                <td style="border: 1px solid #ccc; padding: 5px;">{{ $evento->unidad_nombre }}</td>
                <td style="border: 1px solid #ccc; padding: 5px;">{{ $evento->folio }}</td>
                <td style="border: 1px solid #ccc; padding: 5px;">{{ $evento->incidente_categoria_label }}</td>
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
