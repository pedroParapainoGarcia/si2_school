@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del periodo</h1>
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
                                <label for="">Nombre del Periodo</label>
                                <p>{{ $periodo->nombre }}</p>
                            </div>
                        </div>
                    </div>                  
                   
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/periodos') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
