@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del Horario</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Turno</label>
                                <p>{{ $horario->turno }}</p>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Dia</label>
                                @foreach ($dias as $dia)
                                    @if ($horario->dia_id == $dia->id)
                                        <p>{{ $dia->nombre }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Periodo</label>
                                @foreach ($periodos as $periodo)
                                    @if ($horario->periodo_id == $periodo->id)
                                        <p>{{ $periodo->nombre }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Hora</label>
                                @foreach ($intervalos as $intervalo)
                                    @if ($horario->intervalo_id == $intervalo->id)
                                        <p>{{ $intervalo->horaInicio . '-' . $intervalo->horaFin }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>




                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Aula</label>
                                @foreach ($aulas as $aula)
                                    @if ($horario->aula_id == $aula->id)
                                        <p>{{ $aula->tipo . '-' . $aula->numero }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                     
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Curso</label>
                                @foreach ($paralelos as $paralelo)
                                    @if ($horario->paralelo_id == $paralelo->id)
                                        <p>{{ $paralelo->nombre }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                     
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Materia</label>
                                <p>{{ $materia->name }}</p>
                            </div>
                        </div>
                     
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Docente</label>
                                <p>{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno . ' ' . $docente->usuario->apellidoMaterno }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
