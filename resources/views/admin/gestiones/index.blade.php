@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Gestiones</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('gestiones.create')
                            <a href="{{ route('gestiones.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                Nueva Gestion</a>
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
                                    <center>Nombre de Gestion</center>
                                </th>

                                <th>
                                    <center>Fecha y Hora de Creacion</center>
                                </th>

                                <th>
                                    <center>Estado</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 0; @endphp

                            @foreach ($gestiones as $gestione)
                                @php
                                    $contador = $contador + 1;
                                    $id = $gestione->id;
                                @endphp
                                <tr>
                                    <td style="text-align: center">{{ $contador }}</td>

                                    <td> {{ $gestione->nombreGestion }} </td>
                                    <td>{{ $gestione->fechaHoraCreacion }}</td>


                                    <td>
                                        @if ($gestione->estado == 1)
                                            <button class="btn btn-success btn-sm"
                                                style="border-radius: 20px">Activo</button>
                                        @else
                                            <button class="btn btn-danger btn-sm"
                                                style="border-radius: 20px">Inactivo</button>
                                        @endif



                                    </td>

                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('gestiones.show', $gestione->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('gestiones.edit')
                                                <a href="{{ route('gestiones.edit', $gestione->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan

                                            @can('gestiones.destroy')
                                                <form action="{{ route('gestiones.destroy', $gestione->id) }}"
                                                    onclick="preguntar{{ $gestione->id }}(event)"
                                                    method="post"id="miFormulario{{ $gestione->id }}">
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
