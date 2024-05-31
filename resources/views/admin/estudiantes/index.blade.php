@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Estudiantes</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados de estudiantes</h3>
                    <div class="card-tools">
                        <a href="{{ route('usuarios.create', ['tipo' => 'Est.']) }}" class="btn btn-primary">
                            <i class="bi bi-person-fill-add"></i> Nuevo Estudiante</a>
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
                                    <center>Ap.Paterno</center>
                                </th>
                                <th>
                                    <center>Ap.Materno</center>
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
                                    <center>Nro Rude</center>
                                </th>
                                <th>
                                    <center>Nivel</center>
                                </th>
                                <th>
                                    <center>Grado</center>
                                </th>
                                <th>
                                    <center>Padre</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <td style="text-align: center">{{ $estudiante->id }}</td>
                                    @php
                                        $usuario = $usuarios->firstWhere('id', $estudiante->id); 
                                        $padre = $usuarios->firstWhere('id', $estudiante->padre_id);                                       
                                        $nivel = $niveles->firstWhere('id', $estudiante->nivel_id);
                                        $grado = $grados->firstWhere('id', $estudiante->grado_id);
                                    @endphp

                                    <td>{{ $usuario ? $usuario->nombre : '' }}</td>
                                    <td>{{ $usuario ? $usuario->apellidoPaterno : '' }}</td>
                                    <td>{{ $usuario ? $usuario->apellidoMaterno : '' }}</td>
                                    <td>{{ $usuario ? $usuario->ci : '' }}</td>
                                    <td>{{ $usuario ? $usuario->fechaNacimiento: '' }}</td>
                                    <td>{{ $usuario ? $usuario->telefono : '' }}</td>
                                    <td>{{ $usuario ? $usuario->sexo : '' }}</td>
                                    
                                    <td>{{ $estudiante->nro_rude }}</td>
                                    
                                    <td>{{ $nivel ? $nivel->nivel . '-' . $nivel->turno : '' }}</td>
                                    <td>{{ $grado ? $grado->curso . '-' . $grado->paralelo : '' }}</td>
                                    <td>{{ $padre ? $padre->nombre . ' ' . $padre->apellidoPaterno : '' }}</td>


                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('estudiantes.show', $estudiante->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" type="button"
                                                class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}"
                                                onclick="preguntar{{ $estudiante->id }}(event)" method="post"
                                                id="miFormulario{{ $estudiante->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="border-radius: 0px 5px 5px 0px"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $estudiante->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $estudiante->id }}');
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
