@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Materias</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/materias/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nueva Materia</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <center>Id</center>
                                </th>
                                <th>
                                    <center>Nombre</center>
                                </th>
                                <th>
                                    <center>Docente</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 0; @endphp

                            @foreach ($materias as $materia)
                                @php
                                    $contador = $contador + 1;
                                    $id = $materia->id;

                                @endphp
                                <tr>
                                    <td style="text-align: center">{{ $materia->id }}</td>
                                    <td> {{ $materia->name }} </td>
                                    <td>
                                        @foreach ($docentes as $docente)
                                            @if ($materia->docente_id == $docente->id)
                                                <span>{{ $docente->usuario->name . '-' . $docente->usuario->apellidoPaterno }}</span>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('materias.show', $materia->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('materias.edit', $materia->id) }}" type="button"
                                                class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('materias.destroy', $materia->id) }}"
                                                onclick="preguntar<?= $id ?>(event)" method="post"
                                                id="miFormulario<?= $id ?>">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="border-radius: 0px 5px 5px 0px"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar<?= $id ?>(event) {
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
                                                            var form = $('#miFormulario<?= $id ?>');
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
