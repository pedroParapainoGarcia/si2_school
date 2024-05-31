@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos de la Gestion</h1>
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
                                <label for="">Nombre de la Gestion</label>
                                <p>{{ $gestion->nombreGestion }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha y Hora de Creacion</label>
                                <p>{{ $gestion->fechaHoraCreacion }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <p>
                                    @if ($gestion->estado == 1)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/gestiones') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
