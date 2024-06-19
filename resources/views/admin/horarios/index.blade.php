@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Horarios</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('horarios.create')
                            <a href="{{ route('horarios.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                Nueva Horario</a>
                        @endcan

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
                                    <center>Turno</center>
                                </th>
                                <th>
                                    <center>Dia</center>
                                </th>
                                <th>
                                    <center>Periodo</center>
                                </th>
                                <th>
                                    <center>Hora</center>
                                </th>
                                <th>
                                    <center>Aula</center>
                                </th>
                                <th>
                                    <center>Curso</center>
                                </th>
                                <th>
                                    <center>Materia</center>
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
                            @foreach ($horarios as $horario)
                                <tr>
                                    <td style="text-align: center">{{ $horario->id }}</td>
                                    <td>{{ $horario->turno }}</td>
                                    <td>
                                        @foreach ($dias as $dia)
                                            @if ($horario->dia_id == $dia->id)
                                                <span>{{ $dia->nombre }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($periodos as $periodo)
                                            @if ($horario->periodo_id == $periodo->id)
                                                <span>{{ $periodo->nombre }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($intervalos as $intervalo)
                                            @if ($horario->intervalo_id == $intervalo->id)
                                                <span>{{ $intervalo->horaInicio . '-' . $intervalo->horaFin }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($aulas as $aula)
                                            @if ($horario->aula_id == $aula->id)
                                                <span>{{ $aula->tipo . ' : ' . $aula->numero }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($paralelos as $paralelo)
                                            @if ($horario->paralelo_id == $paralelo->id)
                                                <span>{{ $paralelo->nombre }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($asignacionmaterias as $asignacion)
                                            @if ($horario->docentemateria_id == $asignacion->id)
                                                @php
                                                    $materia = $materias->firstWhere('id', $asignacion->materia_id);
                                                @endphp

                                                <span>{{ $materia ? $materia->name : '' }}</span>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach ($asignacionmaterias as $asignacion)
                                            @if ($horario->docentemateria_id == $asignacion->id)
                                                @php
                                                    $docente = $usuarios->firstWhere('id', $asignacion->docente_id);
                                                @endphp

                                                <span>{{ $docente ? $docente->nombre . ' ' . $docente->apellidoPaterno . ' ' . $docente->apellidoMaterno : '' }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('horarios.show', $horario->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('horarios.edit')
                                                <a href="{{ route('horarios.edit', $horario->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan

                                            @can('horarios.destroy')
                                                <form action="{{ route('horarios.destroy', $horario->id) }}"
                                                    onclick="preguntar{{ $horario->id }}(event)"
                                                    method="post"id="miFormulario{{ $horario->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        style="border-radius: 0px 5px 5px 0px"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            @endcan

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
