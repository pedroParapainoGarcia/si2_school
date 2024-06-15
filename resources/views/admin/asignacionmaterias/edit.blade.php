@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos de Asignacion de materias a Docentes</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/asignacionmaterias', $asignacion->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('docente_id', 'Docente') }}
                                    <select required class="form-control" name="docente_id" id="docente_id">
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}"
                                                {{ $docente->id == $asignacion->docente_id ? 'selected' : '' }}>
                                                {{ $docente->usuario->name . ' ' . $docente->usuario->apellidoPaterno }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('materia_id', 'Materia') }}
                                    {{ Form::select('materia_id', $materia, $asignacion->materia_id, ['class' => 'form-control' . ($errors->has('materia_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('materia_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>



                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/asignacionmaterias') }}" class="btn btn-secondary">Cancelar</a>
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
