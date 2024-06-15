@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos de Asignacion de materias a Docentes</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/horarios', $horario->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Turno</label>
                                    <select name="turno" id="" class="form-control">
                                        <option value="Mañana" {{ $horario->turno == 'Mañana' ? 'selected' : '' }}>
                                            Mañana </option>
                                        <option value="Tarde" {{ $horario->turno == 'Tarde' ? 'selected' : '' }}>
                                            Tarde </option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('dia_id', 'Dia') }}
                                    {{ Form::select('dia_id', $dia, $horario->dia_id, ['class' => 'form-control' . ($errors->has('dia_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('dia_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('periodo_id', 'Periodo') }}
                                    {{ Form::select('periodo_id', $periodo, $horario->periodo_id, ['class' => 'form-control' . ($errors->has('periodo_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('periodo_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('intervalo_id', 'Hora') }}
                                    {{ Form::select('intervalo_id', $intervalo, $horario->intervalo_id, ['class' => 'form-control' . ($errors->has('intervalo_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('intervalo_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('aula_id', 'Aula') }}
                                    {{ Form::select('aula_id', $aula, $horario->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('paralelo_id', 'Curso') }}
                                    {{ Form::select('paralelo_id', $paralelo, $horario->paralelo_id, ['class' => 'form-control' . ($errors->has('paralelo_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('paralelo_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="docentemateria_id">Asignacion Materia </label>
                                    <select required class="form-control" name="docentemateria_id" id="docentemateria_id">
                                        @foreach ($asignacionmaterias as $asignacion)
                                            <option value="{{ $asignacion->id }}"
                                                {{ $horario->docentemateria_id == $asignacion->id ? 'selected' : '' }}>
                                                {{ 'Materia: ' . ($asignacion->materia->name ?? 'Sin materia') }} ;
                                                {{ 'Docente: ' . ($asignacion->docente->usuario->nombre ?? 'Sin docente') }}
                                                {{ $asignacion->docente->usuario->apellidoPaterno ?? '' }}
                                                {{ $asignacion->docente->usuario->apellidoMaterno ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
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
