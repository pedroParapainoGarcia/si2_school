@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Paralelos</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('paralelos.create')
                            <a href="{{ url('paralelos.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                Nuevo Paralelo</a>
                        @endcan

                    </div>






                    {{-- </div> --}}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <center>ID</center>
                                </th>

                                <th>
                                    <center>Nombre</center>
                                </th>
                                <th>
                                    <center>Cupo</center>
                                </th>

                                <th>
                                    <center>Curso</center>
                                </th>

                                <th>
                                    <center>Tutor</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paralelos as $paralelo)
                                <tr>
                                    <td style="text-align: center">{{ $paralelo->id }}</td>
                                    <td> {{ $paralelo->nombre }} </td>
                                    <td> {{ $paralelo->cupo }} </td>
                                    <td>
                                        @foreach ($grados as $grado)
                                            @if ($paralelo->grado_id == $grado->id)
                                                <span>{{ $grado->grado }}</span>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach ($docentes as $docente)
                                            @if ($paralelo->docente_id == $docente->id)
                                                <span>{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno }}</span>
                                            @endif
                                        @endforeach
                                    </td>


                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('paralelos.generatePDF', $paralelo->id) }}" type="button"
                                                class="btn btn-danger" target="_blank">Reporte <i
                                                    class="fas fa-file-pdf ml-2"></i></a>

                                            <a href="{{ route('paralelos.show', $paralelo->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('paralelos.edit')
                                                <a href="{{ route('paralelos.edit', $paralelo->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan
                                            @can('paralelos.destroy')
                                                <form action="{{ route('paralelos.destroy', $paralelo->id) }}"
                                                    onclick="preguntar{{ $paralelo->id }}(event)"
                                                    method="post"id="miFormulario{{ $paralelo->id }}">
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
