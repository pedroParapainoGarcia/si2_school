@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Periodos</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('periodos.create')
                            <a href="{{ route('periodos.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                Nuevo Periodo</a>
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
                                    <center>Nombre del Periodo</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 0; @endphp

                            @foreach ($periodos as $periodo)
                                @php
                                    $contador = $contador + 1;
                                    $id = $periodo->id;
                                @endphp
                                <tr>
                                    <td style="text-align: center">{{ $contador }}</td>

                                    <td> {{ $periodo->nombre }} </td>


                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('periodos.show', $periodo->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('periodos.edit')
                                                <a href="{{ route('periodos.edit', $periodo->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan
                                            @can('periodos.destroy')
                                                <form action="{{ route('periodos.destroy', $periodo->id) }}"
                                                    onclick="preguntar{{ $periodo->id }}(event)"
                                                    method="post"id="miFormulario{{ $periodo->id }}">
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
