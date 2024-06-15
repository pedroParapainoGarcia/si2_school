@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del Intervalo de Tiempo</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Hora Inicio de Periodo</label>
                                <p>{{ $intervalo->horaInicio }}</p>
                            </div>
                        </div>
                    </div>            
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Hora Fin de Periodo</label>
                                <p>{{ $intervalo->horaFin }}</p>
                            </div>
                        </div>
                    </div>  
                   
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/intervalos') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
