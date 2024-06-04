@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Grados de Escolaridad</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/grados/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo Grado Escolar</a>
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
                                    <center>Curso</center>
                                </th>                                
                                <th>
                                    <center>Nivel</center>
                                </th>

                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grados as $grado)
                                <tr>
                                    <td style="text-align: center">{{ $grado->id }}</td>
                                    <td> {{ $grado->curso }} </td>                                    
                                    <td>
                                        @foreach ($niveles as $nivel)
                                            @if ($grado->nivel_id == $nivel->id)
                                                <span>{{ $nivel->nivel . ' - ' . $nivel->turno }}</span>
                                            @endif
                                        @endforeach
                                    </td>


                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('grados.show', $grado->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('grados.edit', $grado->id) }}" type="button"
                                                class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('grados.destroy', $grado->id) }}"
                                                onclick="preguntar{{ $grado->id }}(event)"
                                                method="post"id="miFormulario{{ $grado->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="border-radius: 0px 5px 5px 0px"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
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
                                                            var form = $('#miFormulario'+id);
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
