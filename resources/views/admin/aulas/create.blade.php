@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Registro de Nuevo Aula</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/aulas') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Nro de Aula</label>
                                    <input type="text" value="{{ old('numero') }}" name="numero" class="form-control"
                                        required>
                                    @error('numero')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>     
                            
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Tipo de Aula</label>
                                    <input type="text" value="{{ old('tipo') }}" name="tipo" class="form-control"
                                        required>
                                    @error('tipo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>  
                            
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Capacidad</label>
                                    <input type="number" value="{{ old('capacidad') }}" name="capacidad" class="form-control"
                                        required>
                                    @error('capacidad')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>   


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="colegio_id">Colegio</label>
                                    <select required class="form-control" name="colegio_id" id="colegio_id">
                                        @foreach ($colegios as $colegio)
                                            <option value="{{ $colegio->id }}">{{ $colegio->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/aulas') }}" class="btn btn-secondary">Cancelar</a>
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
