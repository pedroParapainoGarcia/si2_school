@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación del Intervalo de Tiempo</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/intervalos', $intervalo->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Hora Inicio</label>
                                    <input type="time" value="{{ $intervalo->horaInicio }}" name="horaInicio" class="form-control"
                                        required>
                                    @error('horaInicio')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Hora Fin</label>
                                    <input type="time" value="{{ $intervalo->horaFin }}" name="horaFin" class="form-control"
                                        required>
                                    @error('horaFin')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/intervalos') }}" class="btn btn-secondary">Cancelar</a>
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
