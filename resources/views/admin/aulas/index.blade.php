@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Aulas</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('aulas.create')
                            <a href="{{ route('aulas.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                Nuevo Aula</a>
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
                                    <center>Numero</center>
                                </th>
                                <th>
                                    <center>Tipo Aula</center>
                                </th>

                                <th>
                                    <center>Capacidad</center>
                                </th>
                                <th>
                                    <center>Colegio</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aulas as $aula)
                                <tr>
                                    <td style="text-align: center">{{ $aula->id }}</td>
                                    <td> {{ $aula->numero }} </td>
                                    <td> {{ $aula->tipo }} </td>
                                    <td> {{ $aula->capacidad }} </td>
                                    <td>
                                        @foreach ($colegios as $colegio)
                                            @if ($aula->colegio_id == $colegio->id)
                                                <span>{{ $colegio->name }}</span>
                                            @endif
                                        @endforeach
                                    </td>


                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('aulas.show', $aula->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('aulas.edit')
                                                <a href="{{ route('aulas.edit', $aula->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan
                                            @can('aulas.destroy')
                                                <form action="{{ route('aulas.destroy', $aula->id) }}"
                                                    onclick="preguntar{{ $aula->id }}(event)"
                                                    method="post"id="miFormulario{{ $aula->id }}">
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
