@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del Grado de Escolaridad</h1>
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
                                <label for="">Nombre del Grado de Escolaridad</label>
                                <p>{{ $grado->curso }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Paralelo del Grado</label>
                                <p>{{ $grado->paralelo }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             
                                <div class="form-group">
                                    <label for="">Nivel</label>
                                    @foreach ($nivel as $level)
                                        @if ($grado->nivel_id == $level->id)
                                            <p>{{ $level->nivel . ' - ' . $level->turno }}</p>
                                        @endif
                                    @endforeach
                                </div>
                             
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/grados') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
