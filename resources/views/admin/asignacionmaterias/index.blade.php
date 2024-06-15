@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Asignaciones de Materias</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/asignacionmaterias/create') }}" class="btn btn-primary"><i
                                class="fas fa-plus-circle"></i> Nueva Asignacion</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <center>ID</center>
                                </th>

                                <th>
                                    <center>Docente</center>
                                </th>
                                <th>
                                    <center>Materia</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaciones as $asignacionmateria)
                                <tr>
                                    <td style="text-align: center">{{ $asignacionmateria->id }}</td>
                                    <td>
                                        @foreach ($docentes as $docente)
                                            @if ($asignacionmateria->docente_id == $docente->id)
                                                <span>{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno . ' ' . $docente->usuario->apellidoMaterno}}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($materias as $materia)
                                            @if ($asignacionmateria->materia_id == $materia->id)
                                                <span>{{ $materia->name }}</span>
                                            @endif
                                        @endforeach
                                    </td>




                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('asignacionmaterias.show', $asignacionmateria->id) }}"
                                                type="button" class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('asignacionmaterias.edit', $asignacionmateria->id) }}"
                                                type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('asignacionmaterias.destroy', $asignacionmateria->id) }}"
                                                onclick="preguntar{{ $asignacionmateria->id }}(event)"
                                                method="post"id="miFormulario{{ $asignacionmateria->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="border-radius: 0px 5px 5px 0px"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar(id) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Eliminar registro',
                                                        text: '¿Desea eliminar este registro?',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#miFormulario' + id);
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
