@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Docentes</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('usuarios.create')
                            <a href="{{ route('usuarios.create', ['tipo' => 'prof.']) }}" class="btn btn-primary">
                                <i class="bi bi-person-fill-add"></i> Nuevo Docente</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <center>Id Docente</center>
                                </th>
                                <th>
                                    <center>Nombre</center>
                                </th>

                                <th>
                                    <center>Sexo</center>
                                </th>
                                <th>
                                    <center>Telefono</center>
                                </th>
                                <th>
                                    <center>Especialidad</center>
                                </th>
                                <th>
                                    <center>Nivel Formacion</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($docentes as $docente)
                                <tr>
                                    <td style="text-align: center">{{ $docente->id }}</td>
                                    @php
                                        $usuario = $usuarios->firstWhere('id', $docente->id);
                                        // $paralelo = $paralelos->firstWhere('id', $docente->paralelo_id);
                                    @endphp

                                    <td>{{ $usuario ? $usuario->apellidoPaterno . ' ' . $usuario->apellidoMaterno . ' ' . $usuario->nombre : '' }}
                                    </td>
                                    <td>{{ $usuario ? $usuario->sexo : '' }}</td>
                                    <td>{{ $usuario ? $usuario->telefono : '' }}</td>
                                    <td>{{ $docente->especialidad }}</td>
                                    <td>{{ $docente->nivelFormacion }}</td>

                                    {{-- <td>{{ $paralelo ? $paralelo->grado_escolaridad->name . '-' . $paralelo->sigla : '' }}</td> --}}



                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('docentes.show', $docente->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('docentes.edit')
                                                <a href="{{ route('docentes.edit', $docente->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan

                                            @can('docentes.destroy')
                                                <form action="{{ route('docentes.destroy', $docente->id) }}"
                                                    onclick="preguntar{{ $docente->id }}(event)" method="post"
                                                    id="miFormulario{{ $docente->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        style="border-radius: 0px 5px 5px 0px"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            @endcan

                                            <script>
                                                function preguntar{{ $docente->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $docente->id }}');
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
