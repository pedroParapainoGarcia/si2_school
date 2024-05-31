@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1 class="agenda-escolar">Listado de Roles</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo Rol</a>
                   
          
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th><center>Id</center></th>
                                <th><center>Nombre</center></th>
                                <th><center>Acciones</center></th>                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>                               
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('roles.show', $role->id) }}" type="button" class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('roles.edit', $role->id) }}" type="button" class="btn btn-success">
                                                <i class="bi bi-pencil"></i>
                                            </a>
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