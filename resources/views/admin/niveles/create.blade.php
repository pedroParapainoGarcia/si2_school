@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nuevo Nivel</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/niveles') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre de Nivel</label>
                                    <select name="nivel" id="" class="form-control">
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="gestion_id">Gestion</label>
                                    <select required class="form-control" name="gestion_id" id="gestion_id">
                                        @foreach ($gestiones as $gestion)
                                            <option value="{{ $gestion->id }}">{{ $gestion->nombreGestion }}</option>
                                        @endforeach
                                    </select>
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
                                <a href="{{ url('admin/niveles') }}" class="btn btn-secondary">Cancelar</a>
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
