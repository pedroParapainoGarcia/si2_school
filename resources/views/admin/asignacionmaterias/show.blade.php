@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos de la asignacion de materia</h1>
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
                                <label for="">Docente</label>
                                <p>{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Materia</label>
                                @foreach ($materia as $mater)
                                    @if ($asignacion->materia_id == $mater->id)
                                        <p>{{ $mater->name }}</p>
                                    @endif
                                @endforeach
                            </div>

                        </div>


                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/asignacionmaterias') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
