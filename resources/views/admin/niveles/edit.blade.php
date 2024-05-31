@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos del Aula</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/niveles', $nivel->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nivel</label>
                                        <select name="nivel" id="" class="form-control">
                                            <option value="Primaria" {{ $nivel->nivel == 'Primaria' ? 'selected' : '' }}>
                                                Primaria </option>
                                            <option value="Secundaria" {{ $nivel->nivel == 'Secundaria' ? 'selected' : '' }}>
                                                Secundaria </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Turno</label>
                                        <select name="turno" id="" class="form-control">
                                            <option value="Mañana" {{ $nivel->turno == 'Mañana' ? 'selected' : '' }}>
                                                Mañana </option>
                                            <option value="Tarde" {{ $nivel->turno == 'Tarde' ? 'selected' : '' }}>
                                                Tarde </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('gestion_id', 'Gestion') }}
                                    {{ Form::select('gestion_id', $gestion, $nivel->gestion_id, ['class' => 'form-control' . ($errors->has('gestion_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('gestion_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/niveles') }}" class="btn btn-secondary">Cancelar</a>
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
