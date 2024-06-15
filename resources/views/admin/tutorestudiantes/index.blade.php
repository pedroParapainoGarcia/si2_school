@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Tutores y Estudiantes</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        {{-- <a href="{{ route('tutorestudiantes.create', ['tipo' => 'Adm.']) }}" class="btn btn-primary">
                            <i class="bi bi-person-fill-add"></i> Nuevo Administrador</a> --}}
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
                                    <center>Tutor</center>
                                </th>

                                <th>
                                    <center>Estudiante</center>
                                </th>
                                <th>
                                    <center>Parentesco</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tutorestudiantes as $tutorestudiante)
                                <tr>
                                    <td style="text-align: center">{{ $tutorestudiante->id }}</td>

                                    <td>
                                        @foreach ($tutores as $tutor)
                                            @if ($tutorestudiante->tutor_id == $tutor->id)
                                                <span>{{  $tutor->usuario->apellidoPaterno . ' ' . $tutor->usuario->apellidoMaterno . ' ' . $tutor->usuario->nombre }}</span>
                                            @endif
                                        @endforeach
                                    </td>


                                    <td>
                                        @foreach ($estudiantes as $estudiante)
                                            @if ($tutorestudiante->estudiante_id == $estudiante->id)
                                                <span>{{$estudiante->usuario->apellidoPaterno . ' ' . $estudiante->usuario->apellidoMaterno . ' ' . $estudiante->usuario->nombre}}</span>
                                            @endif
                                        @endforeach
                                    </td>


                                    <td>{{ $tutorestudiante->parentesco}}</td>

                                     



                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('tutorestudiantes.show', $tutorestudiante->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('tutorestudiantes.edit', $tutorestudiante->id) }}" type="button"
                                                class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('tutorestudiantes.destroy', $tutorestudiante->id) }}"
                                                onclick="preguntar{{ $tutorestudiante->id }}(event)" method="post"
                                                id="miFormulario{{ $tutorestudiante->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="border-radius: 0px 5px 5px 0px"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $tutorestudiante->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $tutorestudiante->id }}');
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
