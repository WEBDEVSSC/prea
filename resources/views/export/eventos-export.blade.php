<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

</head>
<body>
    <table>
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>FECHA</strong></th>
                <th><strong>FOLIO</strong></th>
                <th><strong>TIPO DE EVENTO</strong></th>
                <th><strong>UNIDAD</strong></th>
                <th><strong>JURISDICCION</strong></th>
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
                <th><strong>CATEGORIA</strong></th>
                <th><strong>GRAVEDAD DEL DAÑO</strong></th>

                <th><strong>RELACIONADO CON LAS CARACTERISTICAS DEL PACIENTE</strong></th>
                <th><strong>RELACIONADO CON LA APLICACIÓN DE LAS INDICACIONES...</strong></th>
                <th><strong>Individuales asociadas con los integrantes del equipo.</strong></th>
                <th><strong>Relacionados con el trabajo en equipo.</strong></th>
                <th><strong>Relacionados con el ambiente de trabajo y el entorno.</strong></th>
                <th><strong>Organizacionales del establecimiento de atención médica.</strong></th>
                <th><strong>Institucionales o del ambiente externo.</strong></th>

                <th><strong>¿Considera que se pudo haber evitado el evento adverso?</strong></th>
                <th><strong>¿Cómo considera que pudo haberse evitado el evento adverso?</strong></th>
                <th><strong>¿Se le proporcionó información al paciente o a su familiar relacionada con el evento adverso?</strong></th>
                <th><strong>¿Quién la proporcionó?</strong></th>

                <th><strong>¿Se realizó alguna acción correctiva después del evento adverso?</strong></th>

                <th><strong>Capacitación al personal de nuevo ingreso y estudiantes.</strong></th>
                <th><strong>Mejoramiento de la infraestructura.</strong></th>
                <th><strong>Gestión de los recursos(humanos, financieros y materiales) alineado a la mejora continua.</strong></th>
                <th><strong>Fortalecimiento de una cultura de calidad y seguridad del paciente mediante el Modelo de Gestión de la Calidad.</strong></th>
                <th><strong>Impulso al apego de las Guías de Práctica Clínica.</strong></th>
                <th><strong>Implementación de mecanismos de supervisión operativa para el monitoreo de la calidad y la seguridad del paciente.</strong></th>
                <th><strong>Desarrollo de un Programa de Calidad y Seguridad del Paciente para el establecimiento.</strong></th>
                <th><strong>Capacitación a pacientes y familiares para prevenir eventos adversos.</strong></th>

            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->created_at }}</td>
                    <td>{{ $evento->folio }}</td>
                    <td>{{ $evento->clasificacion_del_evento }}</td>
                    <td>{{ $evento->unidad }} - {{$evento->unidad_nombre}}</td>
                    <td>{{ $evento->jurisdiccion }}</td>
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
                    <td>{{ $evento->incidente_categoria_label }}</td>
                    <td>{{ $evento->gravedad }}</td>

                    <td>{{ $evento->factores_incidente_uno }}</td>
                    <td>{{ $evento->factores_incidente_dos }}</td>
                    <td>{{ $evento->factores_incidente_tres }}</td>
                    <td>{{ $evento->factores_incidente_cuatro }}</td>
                    <td>{{ $evento->factores_incidente_cinco }}</td>
                    <td>{{ $evento->factores_incidente_seis }}</td>
                    <td>{{ $evento->factores_incidente_siete }}</td>

                    <td>{{ $evento->evitar_evento }}</td>
                    <td>{{ $evento->como_evitar_evento }}</td>
                    <td>{{ $evento->proporciono_informacion }}</td>
                    <td>{{ $evento->quien_proporciono }}</td>

                    <td>{{ $evento->acciones_mejora }}</td>

                    <td>{{ $evento->acciones_mejora_uno }}</td>
                    <td>{{ $evento->acciones_mejora_dos }}</td>
                    <td>{{ $evento->acciones_mejora_tres }}</td>
                    <td>{{ $evento->acciones_mejora_cuatro }}</td>
                    <td>{{ $evento->acciones_mejora_cinco }}</td>
                    <td>{{ $evento->acciones_mejora_seis }}</td>
                    <td>{{ $evento->acciones_mejora_siete }}</td>
                    <td>{{ $evento->acciones_mejora_ocho }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
