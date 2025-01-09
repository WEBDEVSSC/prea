<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left; /* O usa 'center' si prefieres */
        }
        th {
            background-color: #f2f2f2; /* Color de fondo para el encabezado */
        }
    </style>
</head>
<body>
    <h1>Lista de eventos registrados en el sistema P.R.E.A. Coah <?php echo date('d-m-Y'); ?></h1>
    <table>
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>TIPO DE EVENTO</strong></th>
                <th><strong>UNIDAD</strong></th>
                <th><strong>EDAD</strong></th>
                <th><strong>SEXO</strong></th>
                <th><strong>LUGAR / AREA DONDE OCURRIO</strong></th>
                <th><strong>TURNO</strong></th>
                <th><strong>FECHA / HORA</strong></th>
                <th><strong>PERSONA INVOLUCRADA</strong></th>
                <th><strong>OTRO</strong></th>
                <th><strong>PERSONA QUE PRESENCIARON</strong></th>
                <th><strong>OTRO</strong></th>
                <th><strong>DESCRIPCION</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->clasificacion_del_evento }}</td>
                    <td>{{ $evento->unidad }} - {{$evento->unidad_nombre}}</td>
                    <td>{{ $evento->edad }}</td>
                    <td>{{ $evento->sexo }}</td>
                    <td>{{ $evento->servicio }}</td>
                    <td>{{ $evento->turno }}</td>
                    <td>{{ $evento->fecha_hora }}</td>
                    <td>{{ $evento->persona_involucrada }}</td>
                    <td>{{ $evento->persona_involucrada_otro }}</td>
                    <td>{{ $evento->persona_testigos }}</td>
                    <td>{{ $evento->persona_testigos_otro }}</td>
                    <td>{{ $evento->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
