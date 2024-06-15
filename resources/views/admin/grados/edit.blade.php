@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos del Curso</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/grados', $grado->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Grado</label>
                                    <select name="grado" id="" class="form-control">
                                        <option value="1° primaria" {{ $grado->grado == '1° primaria' ? 'selected' : '' }}>
                                            1° primaria
                                        </option>
                                        <option value="2° primaria" {{ $grado->grado == '2° primaria' ? 'selected' : '' }}>
                                            2° primaria </option>
                                        <option value="3° primaria" {{ $grado->grado == '3° primaria' ? 'selected' : '' }}>
                                            3° primaria
                                        </option>
                                        <option value="4° primaria" {{ $grado->grado == '4° primaria' ? 'selected' : '' }}>
                                            4° primaria </option>
                                        <option value="5° primaria" {{ $grado->grado == '5° primaria' ? 'selected' : '' }}>
                                            5° primaria
                                        </option>
                                        <option value="6° primaria" {{ $grado->grado == '6° primaria' ? 'selected' : '' }}>
                                            6° primaria </option>
                                        <option value="1° secundaria"
                                            {{ $grado->grado == '1° secundaria' ? 'selected' : '' }}> 1° secundaria
                                        </option>
                                        <option value="2° secundaria"
                                            {{ $grado->grado == '2° secundaria' ? 'selected' : '' }}>
                                            2° secundaria </option>
                                        <option value="3° secundaria"
                                            {{ $grado->grado == '3° secundaria' ? 'selected' : '' }}> 3° secundaria
                                        </option>
                                        <option value="4° secundaria"
                                            {{ $grado->grado == '4° secundaria' ? 'selected' : '' }}>
                                            4° secundaria </option>
                                        <option value="5° secundaria"
                                            {{ $grado->grado == '5° secundaria' ? 'selected' : '' }}> 5° secundaria
                                        </option>
                                        <option value="6° secundaria"
                                            {{ $grado->grado == '6° secundaria' ? 'selected' : '' }}>
                                            6° secundaria </option>
                                    </select>
                                </div>
                            </div>                         


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('nivel_id', 'Nivel') }}
                                    {{ Form::select('nivel_id', $nivel, $grado->nivel_id, ['class' => 'form-control' . ($errors->has('nivel_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('nivel_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/grados') }}" class="btn btn-secondary">Cancelar</a>
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
