@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nueva Gestion </h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/gestiones') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre de la Gestion</label>
                                    <input type="text" value="{{ old('nombreGestion') }}" name="nombreGestion"
                                        class="form-control" required>
                                    @error('nombreGestion')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Estado</label>
                                    <select name="estado" id="" class="form-control">
                                        <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}> Activo </option>
                                        <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}> Inactivo </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/gestiones') }}" class="btn btn-secondary">Cancelar</a>
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
