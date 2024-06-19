@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de usuarios</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        @can('usuarios.create')
                            <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i class="bi bi-person-fill-add"></i>
                                Nuevo usuario</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    {{-- <table class="table table-bordered table-sm table-striped table-hover"> --}}
                    <table id="users" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>Nro</center>
                                </th>
                                <th>
                                    <center>Nombre</center>
                                </th>
                                <th>
                                    <center>Email</center>
                                </th>
                                <th>
                                    <center>Ci</center>
                                </th>
                                <th>
                                    <center>Rol</center>
                                </th>
                                <th>
                                    <center>Tipo Usuario</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 0; @endphp

                            @foreach ($usuarios as $usuario)
                                @php
                                    $contador = $contador + 1;
                                    $id = $usuario->id;
                                @endphp
                                <tr>
                                    <td style="text-align: center">{{ $contador }}</td>

                                    <td>
                                        <span>{{ $usuario->nombre . ' ' . $usuario->apellidoPaterno . ' ' . $usuario->apellidoMaterno }}</span>
                                    </td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->ci }}</td>

                                    <td>
                                        @foreach ($usuario->roles as $rol)
                                            <span>{{ $rol->name }}</span><br>
                                        @endforeach
                                    </td>

                                    <td>{{ $usuario->type }}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('usuarios.show', $usuario->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @can('usuarios.edit')
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" type="button"
                                                    class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            @endcan
                                            @can('usuarios.destroy')
                                                <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                    onclick="preguntar<?= $id ?>(event)" method="post"
                                                    id="miFormulario<?= $id ?>">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        style="border-radius: 0px 5px 5px 0px"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            @endcan

                                            <script>
                                                function preguntar<?= $id ?>(event) {
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>



    <!-- SUM()  Datatables-->
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

    <script>
        $(document).ready(function() {
            $('#users').DataTable({

                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar" +
                        `<select>
                <option value = '5'>5</option>
                <option value = '10'>10</option>
                <option value = '25'>25</option>
                <option value='100'>100</option>
                <option value='-1'>All</option>
                </select>` +
                        "registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrando de _MAX_ registros totales)",
                    'search': 'Buscar:',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },


            });





        });
    </script>

@stop
