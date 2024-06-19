@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos del Rol</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $rol->id) }}" method="post">
                        @csrf
                        @method('PUT')


                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Rol:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $rol->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="permissions" class="form-label">Permisos para este Rol:</label>
                        <div class="row g-3">
                            @foreach ($permission as $permiso)
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group form-switch">
                                    <input class="form-check-input" type="checkbox" name="permission[]" role="switch"
                                        id="{{ $permiso->name }}" value="{{ $permiso->name }}"
                                        {{ in_array($permiso->name, $rol->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $permiso->name }}">
                                        <span>{{ $permiso->description }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        </div>





                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i>
                                    Actualizar registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
