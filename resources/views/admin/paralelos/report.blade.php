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
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Reporte de Estudiantes del Paralelo {{ $paralelo->nombre }}</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>                
                <th>CI</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paralelo->estudiante as $estudiante)
                <tr>                   
                    <td>{{ $estudiante->usuario->apellidoPaterno.' '. $estudiante->usuario->apellidoMaterno.' '.$estudiante->usuario->nombre}}</td>                   
                    <td>{{ $estudiante->usuario->ci }}</td>
                    <td>{{ $estudiante->usuario->fechaNacimiento }}</td>
                    <td>{{ $estudiante->usuario->telefono }}</td>
                    <td>{{ $estudiante->usuario->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
