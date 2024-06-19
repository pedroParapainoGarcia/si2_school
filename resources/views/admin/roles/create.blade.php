@extends('layouts.admin')
@section('content_header')
    <h1>Nota de Salidas</h1>
@stop

@section('content')
    <div class="row">
        <h1>Nuevo Rol</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/roles') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre del rol</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                        required>
                                    @error('name')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <label for="">Permisos para este Rol:</label>
                        <div class="row g-3">
                            <br />
                            @foreach ($permission as $permiso)
                                <div class="col-md-3">
                                    <div class="form-group form-switch">
                                        <input class="form-check-input" type="checkbox" name="permission[]" role="switch"
                                            id="{{ $permiso->name }}" value="{{ $permiso->name }}">
                                        <label class="form-check-label" for="{{ $permiso->name }}">
                                            <span>{{ $permiso->description }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/roles') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2"></i> Guardar
                                    registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
