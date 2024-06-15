<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Paralelo</title>
    <style>
       
        /* Estilos para el PDF */
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header-table th {
            background-color: #ffffff;
            border: none;
        }

        .header-table td {
            border: none;
            font-size: 12px;
        }

        /* Disminuir el tamaño de fuente de la tabla */
        .content-table th,
        .content-table td {
            font-size: 12px; /* Puedes ajustar el tamaño de la fuente según tus necesidades */
        }

        /* Estilo para los encabezados de la tabla de contenido */
        .content-table th {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <h3>Reporte de Estudiantes del Paralelo {{ $paralelo->nombre }}</h3>
    <table class="header-table">
        <tr>
            <th>Colegio:</th>
            <td>{{ $paralelo->grado->nivel->colegio->name ?? 'N/A' }}</td>
            <th>Dirección del Colegio:</th>
            <td>{{ $paralelo->grado->nivel->colegio->ubicacion ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Docente (Tutor):</th>
            <td>{{ $paralelo->docente->usuario->nombre ?? 'N/A' }} {{ $paralelo->docente->usuario->apellidoPaterno ?? 'N/A' }}</td>
            <th>Nivel:</th>
            <td>{{ $paralelo->grado->nivel->nombre ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Grado:</th>
            <td>{{ $paralelo->grado->grado ?? 'N/A' }}</td>
            <th>Gestión:</th>
            <td>{{ $paralelo->grado->nivel->gestion->nombreGestion ?? 'N/A' }}</td>
        </tr>
    </table>
    <br>
    <table class="content-table">
        <thead>
            <tr>
               
                <th>RUDE</th>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>F.NACIMIENTO</th>
                <th>TELEFONO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paralelo->estudiante as $estudiante)
                <tr>
                    <td>{{ $estudiante->nro_rude }}</td>
                    <td>{{ $estudiante->usuario->ci }}</td>
                    <td>{{ $estudiante->usuario->apellidoPaterno . ' ' . $estudiante->usuario->apellidoMaterno . ' ' . $estudiante->usuario->nombre }}</td>
                    <td>{{ $estudiante->usuario->fechaNacimiento }}</td>
                    <td>{{ $estudiante->usuario->telefono }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
