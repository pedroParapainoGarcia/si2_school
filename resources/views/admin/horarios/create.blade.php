@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nueva Horario</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/horarios ') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label for="">Turno</label>
                                    <select name="turno" id="" class="form-control">
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dia_id">Dia</label>
                                    <select required class="form-control" name="dia_id" id="dia_id">
                                        @foreach ($dias as $dia)
                                            <option value="{{ $dia->id }}">{{ $dia->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="periodo_id">Periodo</label>
                                    <select required class="form-control" name="periodo_id" id="periodo_id">
                                        @foreach ($periodos as $periodo)
                                            <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="intervalo_id">Hora</label>
                                    <select required class="form-control" name="intervalo_id" id="intervalo_id">
                                        @foreach ($intervalos as $intervalo)
                                            <option value="{{ $intervalo->id }}">
                                                {{ $intervalo->horaInicio . '-' . $intervalo->horaFin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="aula_id">Aula</label>
                                    <select required class="form-control" name="aula_id" id="aula_id">
                                        @foreach ($aulas as $aula)
                                            <option value="{{ $aula->id }}">{{ $aula->tipo . ':' . $aula->numero }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="paralelo_id">Curso</label>
                                    <select required class="form-control" name="paralelo_id" id="paralelo_id">
                                        @foreach ($paralelos as $paralelo)
                                            <option value="{{ $paralelo->id }}">{{ $paralelo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="docentemateria_id">Asignacion Materia </label>
                                    <select required class="form-control" name="docentemateria_id" id="docentemateria_id">
                                        @foreach ($asignaciones as $asignacion)
                                            <option value="{{ $asignacion->id }}">
                                                {{ 'materia: ' . $asignacion->materia->name ?? 'Sin materia' }} ;
                                                {{ 'docente:' . $asignacion->docente->usuario->nombre ?? 'Sin docente' }}
                                                {{ $asignacion->docente->usuario->apellidoPaterno ?? '' }}
                                                {{ $asignacion->docente->usuario->apellidoMaterno ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>






                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
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
