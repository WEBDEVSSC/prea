<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Eventos Adversos</title>
    <style>
        /* ---------------------- CONFIGURACIÓN GENERAL ---------------------- */
        @page {
            margin: 100px 45px 50px 45px;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 8.5pt;
            color: #2c3e50;
            line-height: 1.5;
            background-color: #ffffff;
        }

        /* ---------------------- PORTADA ---------------------- */
        .portada {
            text-align: center;
            margin-top: 120px;
        }

        .portada .cintilla {
            width: 100%;
            text-align: center;
            margin-bottom: 50px;
        }

        .portada .cintilla img {
            width: 75%;
            max-width: 500px;
        }

        .portada h1 {
            font-size: 22pt;
            color: #4a148c;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .portada h2 {
            font-size: 11pt;
            color: #7b1fa2;
            margin-top: 0;
            font-weight: 500;
            border: none;
            padding: 0;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .portada .divider {
            width: 80px;
            height: 3px;
            background-color: #ab47bc;
            margin: 30px auto;
            border-radius: 2px;
        }

        .portada .info {
            margin-top: 60px;
            font-size: 10pt;
            color: #546e7a;
            line-height: 1.8;
        }

        .portada .info strong {
            color: #2c3e50;
        }

        /* ---------------------- ENCABEZADO Y PIE FIJOS ---------------------- */
        .header-fixed {
            position: fixed;
            top: -75px;
            left: 0;
            right: 0;
            height: 60px;
            border-bottom: 2px solid #e1bee7;
            padding-bottom: 8px;
        }

        .header-fixed table {
            margin: 0;
        }

        .header-fixed td {
            border: none;
            padding: 0;
        }

        .footer-fixed {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            height: 30px;
            border-top: 1px solid #e0e0e0;
            padding-top: 8px;
            font-size: 7.5pt;
            color: #78909c;
        }

        .footer-fixed td {
            border: none;
            padding: 0;
        }

        /* ---------------------- TITULOS Y SECCIONES ---------------------- */
        .section-header {
            margin-top: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            font-size: 13pt;
            color: #4a148c;
            text-transform: uppercase;
            margin: 0 0 5px 0;
            padding-bottom: 4px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        h3 {
            font-size: 10pt;
            color: #7b1fa2;
            margin: 0 0 15px 0;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* ---------------------- TABLAS ELEGANTES ---------------------- */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #6a1b9a;
            color: #ffffff;
            font-size: 8pt;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            padding: 8px 10px;
            border: none;
        }

        td {
            padding: 7px 10px;
            border-bottom: 1px solid #e0e0e0;
            color: #37474f;
            vertical-align: middle;
        }

        tr:nth-child(even) td {
            background-color: #fcfaff;
        }

        tr.total-row td {
            background-color: #f3e5f5;
            font-weight: bold;
            color: #4a148c;
            border-top: 2px solid #ab47bc;
            border-bottom: 2px solid #ab47bc;
        }

        .color-badge {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 3px;
            vertical-align: middle;
            box-shadow: 0 1px 2px rgba(0,0,0,0.15);
        }

        /* ---------------------- CONTENEDOR DE GRÁFICOS ---------------------- */
        .chart-container {
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #fafafa;
            border-radius: 6px;
            border: 1px solid #f0f0f0;
        }

        .chart {
            width: 480px;
            height: 280px;
            object-fit: contain;
        }

        /* ---------------------- PÁGINAS Y UTILIDADES ---------------------- */
        .page-break {
            page-break-before: always;
        }

        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
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
        <h2>Subsecretaría de Atención a la Salud | Subdirección de Calidad</h2>
        
        <div class="divider"></div>

        <div class="info">
            <p style="font-size: 13pt; color: #4a148c; font-weight: bold; margin-bottom: 5px;">
                Reporte de Eventos Adversos
            </p>
            <p>Periodo del <strong>{{ $fechaInicio }}</strong> al <strong>{{ $fechaFin }}</strong></p>
            <p style="font-size: 8.5pt; color: #90a4ae; margin-top: 40px;">
                Generado automáticamente por la Plataforma de Registro de Eventos Adversos
            </p>
        </div>
    </div>

    <!-- ============================================================= -->
    <!--                  ENCABEZADO Y PIE REPETITIVOS                 -->
    <!-- ============================================================= -->
    <div class="header-fixed">
        <table style="width: 100%;">
            <tr>
                <td style="width: 70%; text-align: left;">
                    <span style="font-size: 9pt; font-weight: bold; color: #4a148c;">Secretaría de Salud de Coahuila</span><br>
                    <span style="font-size: 7.5pt; color: #78909c;">Subdirección de Calidad | Reporte Estadístico</span>
                </td>
                <td style="width: 30%; text-align: right;">
                    <span style="font-size: 8pt; color: #7b1fa2; font-weight: bold;">PREA</span>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer-fixed">
        <table style="width: 100%;">
            <tr>
                <td style="width: 70%; text-align: left;">
                    Secretaría de Salud de Coahuila | Subdirección de Calidad | Unidad de Planeación
                </td>
                <td style="width: 30%; text-align: right;">
                    Periodo: {{ $fechaInicio }} - {{ $fechaFin }}
                </td>
            </tr>
        </table>
    </div>

    <!-- ============================================================= -->
    <!--                     DISTRIBUCIÓN GENERAL                      -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución General de Eventos</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;" class="text-center">Color</th>
                <th style="width: 65%;" class="text-left">Tipo de Evento</th>
                <th style="width: 25%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    <span class="color-badge" style="background-color:#38bdf8;"></span>
                </td>
                <td class="text-left">Eventos Adversos</td>
                <td class="text-center font-bold">{{ $eventosAdverso }}</td>
            </tr>
            <tr>
                <td class="text-center">
                    <span class="color-badge" style="background-color:#facc15;"></span>
                </td>
                <td class="text-left">Cuasi-falla</td>
                <td class="text-center font-bold">{{ $eventosCuasiFalla }}</td>
            </tr>
            <tr>
                <td class="text-center">
                    <span class="color-badge" style="background-color:#ef4444;"></span>
                </td>
                <td class="text-left">Centinela</td>
                <td class="text-center font-bold">{{ $eventosCentinela }}</td>
            </tr>
            <tr class="total-row">
                <td></td>
                <td class="text-left">Total de Eventos</td>
                <td class="text-center">{{ $contadorEventos }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64Eventos }}" class="chart" alt="Gráfico Distribución General">
    </div>

    <!-- ============================================================= -->
    <!--                 DISTRIBUCIÓN POR NIVEL                        -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución por Nivel de Atención</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;" class="text-center">Color</th>
                <th style="width: 65%;" class="text-left">Nivel de Atención</th>
                <th style="width: 25%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    <span class="color-badge" style="background-color: #eab308;"></span>
                </td>
                <td class="text-left">Primer Nivel</td>
                <td class="text-center font-bold">{{ $totalPrimerNivel }}</td>
            </tr>
            <tr>
                <td class="text-center">
                    <span class="color-badge" style="background-color: #a855f7;"></span>
                </td>
                <td class="text-left">Segundo Nivel</td>
                <td class="text-center font-bold">{{ $totalSegundoNivel }}</td>
            </tr>
            <tr>
                <td class="text-center">
                    <span class="color-badge" style="background-color: #f97316;"></span>
                </td>
                <td class="text-left">Tercer Nivel</td>
                <td class="text-center font-bold">{{ $totalTercerNivel }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64NivelDeAtencion }}" class="chart" alt="Gráfico Nivel de Atención">
    </div>

    <!-- ============================================================= -->
    <!--                 DISTRIBUCIÓN GEOGRÁFICA                       -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución Geográfica</h2>
        <h3>Por Jurisdicción Sanitaria</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;" class="text-center">Color</th>
                <th style="width: 65%;" class="text-left">Jurisdicción Sanitaria</th>
                <th style="width: 25%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #facc15;"></span></td>
                <td class="text-left">J1 - Piedras Negras</td>
                <td class="text-center font-bold">{{ $totalJ1 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f97316;"></span></td>
                <td class="text-left">J2 - Acuña</td>
                <td class="text-center font-bold">{{ $totalJ2 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f87171;"></span></td>
                <td class="text-left">J3 - Sabinas</td>
                <td class="text-center font-bold">{{ $totalJ3 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #34d399;"></span></td>
                <td class="text-left">J4 - Monclova</td>
                <td class="text-center font-bold">{{ $totalJ4 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #60a5fa;"></span></td>
                <td class="text-left">J5 - Cuatro Ciénegas</td>
                <td class="text-center font-bold">{{ $totalJ5 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #a78bfa;"></span></td>
                <td class="text-left">J6 - Torreón</td>
                <td class="text-center font-bold">{{ $totalJ6 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f472b6;"></span></td>
                <td class="text-left">J7 - Fco. I. Madero</td>
                <td class="text-center font-bold">{{ $totalJ7 }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #fb923c;"></span></td>
                <td class="text-left">J8 - Saltillo</td>
                <td class="text-center font-bold">{{ $totalJ8 }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64Jurisdiccion }}" class="chart" alt="Gráfico Jurisdicciones">
    </div>

    <!-- ============================================================= -->
    <!--                 DISTRIBUCIÓN POR SEXO                         -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución Demográfica</h2>
        <h3>Por Sexo</h3>
    </div>

    <table style="width: 70%; margin: 0 auto 20px auto;">
        <thead>
            <tr>
                <th style="width: 15%;" class="text-center">Color</th>
                <th style="width: 55%;" class="text-left">Sexo</th>
                <th style="width: 30%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #60a5fa;"></span></td>
                <td class="text-left">Masculino</td>
                <td class="text-center font-bold">{{ $totalMasculino }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f472b6;"></span></td>
                <td class="text-left">Femenino</td>
                <td class="text-center font-bold">{{ $totalFemenino }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64Sexo }}" class="chart" alt="Gráfico Sexo">
    </div>

    <!-- ============================================================= -->
    <!--             DISTRIBUCIÓN POR RANGO DE EDAD                    -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución Demográfica</h2>
        <h3>Por Rango de Edad</h3>
    </div>

    <table style="width: 80%; margin: 0 auto 20px auto;">
        <thead>
            <tr>
                <th style="width: 12%;" class="text-center">Color</th>
                <th style="width: 63%;" class="text-left">Rango de Edad</th>
                <th style="width: 25%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #facc15;"></span></td>
                <td class="text-left">Primera infancia (0-5 años)</td>
                <td class="text-center font-bold">{{ $totalPrimeraInfancia }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f97316;"></span></td>
                <td class="text-left">Infancia (6-11 años)</td>
                <td class="text-center font-bold">{{ $totalInfancia }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f87171;"></span></td>
                <td class="text-left">Adolescencia (12-15 años)</td>
                <td class="text-center font-bold">{{ $totalAdolescencia }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #34d399;"></span></td>
                <td class="text-left">Juventud (16-26 años)</td>
                <td class="text-center font-bold">{{ $totalJuventud }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #60a5fa;"></span></td>
                <td class="text-left">Adultez (27-59 años)</td>
                <td class="text-center font-bold">{{ $totalAdultez }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #a78bfa;"></span></td>
                <td class="text-left">Persona Mayor (60 años o más)</td>
                <td class="text-center font-bold">{{ $totalPersonaMayor }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64RangoDeEdad }}" class="chart" alt="Gráfico Rango de Edad">
    </div>

    <!-- ============================================================= -->
    <!--                 DISTRIBUCIÓN POR TURNO                        -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución Laboral</h2>
        <h3>Por Turno</h3>
    </div>

    <table style="width: 70%; margin: 0 auto 20px auto;">
        <thead>
            <tr>
                <th style="width: 15%;" class="text-center">Color</th>
                <th style="width: 55%;" class="text-left">Turno</th>
                <th style="width: 30%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #f43f5e;"></span></td>
                <td class="text-left">Matutino</td>
                <td class="text-center font-bold">{{ $totalMatutino }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #10b981;"></span></td>
                <td class="text-left">Vespertino</td>
                <td class="text-center font-bold">{{ $totalVespertino }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #3b82f6;"></span></td>
                <td class="text-left">Nocturno</td>
                <td class="text-center font-bold">{{ $totalNocturno }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color: #8b5cf6;"></span></td>
                <td class="text-left">Jornada Acumulada</td>
                <td class="text-center font-bold">{{ $totalJornadaAcumulada }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64Turno }}" class="chart" alt="Gráfico Turnos">
    </div>

    <!-- ============================================================= -->
    <!--                  DISTRIBUCIÓN POR ÁREA                        -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución por Área del Evento</h2>
    </div>

    <table style="font-size: 8pt;">
        <thead>
            <tr>
                <th style="width: 5%;" class="text-center">#</th>
                <th style="width: 23%;" class="text-left">Área</th>
                <th style="width: 5%;" class="text-right">Total</th>
                
                <th style="width: 5%;" class="text-center">#</th>
                <th style="width: 23%;" class="text-left">Área</th>
                <th style="width: 5%;" class="text-right">Total</th>
                
                <th style="width: 5%;" class="text-center">#</th>
                <th style="width: 24%;" class="text-left">Área</th>
                <th style="width: 5%;" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#f43f5e;"></span></td>
                <td class="text-left">Almacén</td>
                <td class="text-right font-bold">{{ $almacen }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#10b981;"></span></td>
                <td class="text-left">CENDIS</td>
                <td class="text-right font-bold">{{ $cendis }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#3b82f6;"></span></td>
                <td class="text-left">CEYE</td>
                <td class="text-right font-bold">{{ $ceye }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#8b5cf6;"></span></td>
                <td class="text-left">Consulta externa</td>
                <td class="text-right font-bold">{{ $consultaExterna }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#f59e0b;"></span></td>
                <td class="text-left">Dental</td>
                <td class="text-right font-bold">{{ $dental }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#ef4444;"></span></td>
                <td class="text-left">Farmacia</td>
                <td class="text-right font-bold">{{ $farmacia }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#14b8a6;"></span></td>
                <td class="text-left">Hospitalización</td>
                <td class="text-right font-bold">{{ $hospitalizacion }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#6366f1;"></span></td>
                <td class="text-left">Imagenología</td>
                <td class="text-right font-bold">{{ $imagenologia }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#84cc16;"></span></td>
                <td class="text-left">Laboratorio</td>
                <td class="text-right font-bold">{{ $laboratorio }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#ec4899;"></span></td>
                <td class="text-left">Medicina preventiva</td>
                <td class="text-right font-bold">{{ $medicinaPreventiva }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#0ea5e9;"></span></td>
                <td class="text-left">Nutrición</td>
                <td class="text-right font-bold">{{ $nutricion }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#eab308;"></span></td>
                <td class="text-left">Patología</td>
                <td class="text-right font-bold">{{ $patologia }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#a855f7;"></span></td>
                <td class="text-left">Quirófano</td>
                <td class="text-right font-bold">{{ $quirofano }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#22c55e;"></span></td>
                <td class="text-left">Salud reproductiva</td>
                <td class="text-right font-bold">{{ $saludReproductiva }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#e11d48;"></span></td>
                <td class="text-left">Tococirugía</td>
                <td class="text-right font-bold">{{ $tocoCirugia }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#3f3f46;"></span></td>
                <td class="text-left">UCI Adultos</td>
                <td class="text-right font-bold">{{ $UCIAdultos }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#f97316;"></span></td>
                <td class="text-left">UCI Neonatales</td>
                <td class="text-right font-bold">{{ $UCINeonatales }}</td>

                <td class="text-center"><span class="color-badge" style="background-color:#4ade80;"></span></td>
                <td class="text-left">UCI Pediátricos</td>
                <td class="text-right font-bold">{{ $UCIPediatricos }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#6b7280;"></span></td>
                <td class="text-left">Urgencias</td>
                <td class="text-right font-bold">{{ $urgencias }}</td>
                <td colspan="6"></td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64Lugar }}" class="chart" alt="Gráfico Áreas">
    </div>

    <!-- ============================================================= -->
    <!--               DISTRIBUCIÓN POR INCIDENTE                      -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Distribución por Tipo de Incidente</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;" class="text-center">Color</th>
                <th style="width: 65%;" class="text-left">Tipo de Incidente</th>
                <th style="width: 25%;" class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#ef4444;"></span></td>
                <td class="text-left">Acciones Esenciales para la Seguridad del Paciente</td>
                <td class="text-center font-bold">{{ $tipoAESP }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#f97316;"></span></td>
                <td class="text-left">Medicación</td>
                <td class="text-center font-bold">{{ $tipoMMU }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#eab308;"></span></td>
                <td class="text-left">Prevención y Control de Infecciones</td>
                <td class="text-center font-bold">{{ $tipoPCI }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#22c55e;"></span></td>
                <td class="text-left">Dispositivos y Equipos Biomédicos</td>
                <td class="text-center font-bold">{{ $tipoDEB }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#14b8a6;"></span></td>
                <td class="text-left">Acceso y Continuidad de la Atención</td>
                <td class="text-center font-bold">{{ $tipoACC }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#0ea5e9;"></span></td>
                <td class="text-left">Derechos del Paciente</td>
                <td class="text-center font-bold">{{ $tipoPFR }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#3b82f6;"></span></td>
                <td class="text-left">Servicios Auxiliares de Diagnóstico</td>
                <td class="text-center font-bold">{{ $tipoSAP }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#6366f1;"></span></td>
                <td class="text-left">Nutrición</td>
                <td class="text-center font-bold">{{ $tipoNUT }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#a855f7;"></span></td>
                <td class="text-left">Anestesia y Atención Quirúrgica</td>
                <td class="text-center font-bold">{{ $tipoASC }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#ec4899;"></span></td>
                <td class="text-left">Gestión de la Comunicación y la Información</td>
                <td class="text-center font-bold">{{ $tipoMCI }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#06b6d4;"></span></td>
                <td class="text-left">Hemoderivados</td>
                <td class="text-center font-bold">{{ $tipoHEMO }}</td>
            </tr>
            <tr>
                <td class="text-center"><span class="color-badge" style="background-color:#6b7280;"></span></td>
                <td class="text-left">Otro Incidente</td>
                <td class="text-center font-bold">{{ $tipoOTRO }}</td>
            </tr>
        </tbody>
    </table>

    <div class="chart-container">
        <img src="{{ $imageBase64TipoDeIncidente }}" class="chart" alt="Gráfico Tipo de Incidente">
    </div>

    <!-- ============================================================= -->
    <!--                 LISTADO DETALLADO DE EVENTOS                  -->
    <!-- ============================================================= -->
    <div class="page-break"></div>

    <div class="section-header">
        <h2>Listado Detallado de Eventos</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 20%;" class="text-left">Tipo</th>
                <th style="width: 15%;" class="text-left">Fecha</th>
                <th style="width: 30%;" class="text-left">Unidad</th>
                <th style="width: 15%;" class="text-left">Folio</th>
                <th style="width: 20%;" class="text-left">Clasificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listaDeEventos as $evento)
            <tr>
                <td class="text-left font-bold">{{ $evento->clasificacion_del_evento }}</td>
                <td class="text-left">{{ $evento->fecha_hora }}</td>
                <td class="text-left">{{ $evento->unidad_nombre }}</td>
                <td class="text-left"><span style="color:#6a1b9a; font-weight:bold;">{{ $evento->folio }}</span></td>
                <td class="text-left">{{ $evento->incidente_categoria_label }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>