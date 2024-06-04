@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos del Grado de Escolaridad</h1>
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
                                    <label for="">Curso</label>
                                    <select name="curso" id="" class="form-control">
                                        <option value="Primaria-1" {{ $grado->curso == 'Primaria-1' ? 'selected' : '' }}>
                                            Primaria-1
                                        </option>
                                        <option value="Primaria-2" {{ $grado->curso == 'Primaria-2' ? 'selected' : '' }}>
                                            Primaria-2 </option>
                                        <option value="Primaria-3" {{ $grado->curso == 'Primaria-3' ? 'selected' : '' }}>
                                            Primaria-3
                                        </option>
                                        <option value="Primaria-4" {{ $grado->curso == 'Primaria-4' ? 'selected' : '' }}>
                                            Primaria-4 </option>
                                        <option value="Primaria-5" {{ $grado->curso == 'Primaria-5' ? 'selected' : '' }}>
                                            Primaria-5
                                        </option>
                                        <option value="Primaria-6" {{ $grado->curso == 'Primaria-6' ? 'selected' : '' }}>
                                            Primaria-6 </option>
                                        <option value="Secundaria-1"
                                            {{ $grado->curso == 'Secundaria-1' ? 'selected' : '' }}> Secundaria-1
                                        </option>
                                        <option value="Secundaria-2"
                                            {{ $grado->curso == 'Secundaria-2' ? 'selected' : '' }}>
                                            Secundaria-2 </option>
                                        <option value="Secundaria-3"
                                            {{ $grado->curso == 'Secundaria-3' ? 'selected' : '' }}> Secundaria-3
                                        </option>
                                        <option value="Secundaria-4"
                                            {{ $grado->curso == 'Secundaria-4' ? 'selected' : '' }}>
                                            Secundaria-4 </option>
                                        <option value="Secundaria-5"
                                            {{ $grado->curso == 'Secundaria-5' ? 'selected' : '' }}> Secundaria-5
                                        </option>
                                        <option value="Secundaria-6"
                                            {{ $grado->curso == 'Secundaria-6' ? 'selected' : '' }}>
                                            Secundaria-6 </option>
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
