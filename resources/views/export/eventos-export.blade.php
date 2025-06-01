<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>
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
                <th><strong>DESCRIPCIÓN</strong></th>
                <th><strong>(OTRO)</strong></th>
                <th><strong>GRAVEDAD DEL DAÑO</strong></th>

                <th><strong>RELACIONADO CON LAS CARACTERISTICAS DEL PACIENTE</strong></th>
                <th><strong>RELACIONADO CON LA APLICACIÓN DE LAS INDICACIONES...</strong></th>
                <th><strong>INDIVIDUALES ASOCIADAS CON LOS INTEGRANTES DEL EQUIPO.</strong></th>
                <th><strong>RELACIONADOS CON EL TRABAJO EN EQUIPO.</strong></th>
                <th><strong>RELACIONADOS CON EL AMBIENTE DE TRABAJO Y EL ENTORNO.</strong></th>
                <th><strong>ORGANIZACIONALES DEL ESTABLECIMIENTO DE ATENCIÓN MÉDICA.</strong></th>
                <th><strong>INSTITUCIONALES O DEL AMBIENTE EXTERNO.</strong></th>

                <th><strong>¿CONSIDERA QUE SE PUDO HABER EVITADO EL EVENTO ADVERSO?</strong></th>
                <th><strong>¿CÓMO CONSIDERA QUE PUDO HABERSE EVITADO EL EVENTO ADVERSO?</strong></th>
                <th><strong>¿SE LE PROPORCIONÓ INFORMACIÓN AL PACIENTE O A SU FAMILIAR RELACIONADA CON EL EVENTO ADVERSO?</strong></th>
                <th><strong>¿QUIÉN LA PROPORCIONÓ?</strong></th>

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
                    <td>{{ $evento->incidente_descripcion_label }}</td>
                    <td>{{ $evento->incidente_otro }}</td>

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

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
