@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Tutores</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('usuarios.create')
                            <a href="{{ route('usuarios.create', ['tipo' => 'Adm.']) }}" class="btn btn-primary">
                                <i class="bi bi-person-fill-add"></i> Nuevo Tutor</a>
                        @endcan

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
                                    <center>Nro. Ci</center>
                                </th>
                                <th>
                                    <center>Fecha Nac.</center>
                                </th>
                                <th>
                                    <center>Telefono</center>
                                </th>
                                <th>
                                    <center>Sexo</center>
                                </th>

                                <th>
                                    <center>DIRECCION</center>
                                </th>

                                <th>
                                    <center>Ocupacion</center>
                                </th>
                                <th>
                                    <center>Grado Instruccion</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tutores as $tutor)
                                <tr>
                                    <td style="text-align: center">{{ $tutor->id }}</td>
                                    @php
                                        $usuario = $usuarios->firstWhere('id', $tutor->id);

                                    @endphp
                                    <td>{{ $usuario ? $usuario->apellidoPaterno . ' ' . $usuario->apellidoMaterno . ' ' . $usuario->nombre : '' }}
                                    </td>
                                    <td>{{ $usuario ? $usuario->ci : '' }}</td>
                                    <td>{{ $usuario ? $usuario->fechaNacimiento : '' }}</td>
                                    <td>{{ $usuario ? $usuario->telefono : '' }}</td>
                                    <td>{{ $usuario ? $usuario->sexo : '' }}</td>
                                    <td>{{ $usuario ? $usuario->direccion : '' }}</td>


                                    <td>{{ $tutor->ucupacionLaboral }}</td>

                                    <td>{{ $tutor->mayorGradoInstruccion }}</td>



                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('tutores.show', $tutor->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            @can('tutores.edit')
                                                <a href="{{ route('tutores.edit', $tutor->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan
                                            @can('tutores.destroy')
                                                <form action="{{ route('tutores.destroy', $tutor->id) }}"
                                                    onclick="preguntar{{ $tutor->id }}(event)" method="post"
                                                    id="miFormulario{{ $tutor->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        style="border-radius: 0px 5px 5px 0px"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            @endcan

                                            <script>
                                                function preguntar{{ $tutor->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $tutor->id }}');
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
