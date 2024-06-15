@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del Nivel</h1>
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
                                <label for="">Nombre del Nivel</label>
                                <p>{{ $nivel->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Gestion</label>
                            @foreach ($gestiones as $gestion)
                                @if ($nivel->gestion_id == $gestion->id)
                                    <p>{{ $gestion->nombreGestion }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>


                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="">Colegio</label>
                            @foreach ($colegio as $cole)
                                @if ($aula->colegio_id == $cole->id)
                                    <p>{{ $cole->name }}</p>
                                @endif
                            @endforeach
                        </div>

                    </div>



                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/niveles') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
