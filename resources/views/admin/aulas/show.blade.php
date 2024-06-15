@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del Aula</h1>
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
                                <label for="">Numero de Aula</label>
                                <p>{{ $aula->numero }}</p>
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tipo de Aula</label>
                                <p>{{ $aula->tipo }}</p>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Capacidad de Aula</label>
                                <p>{{ $aula->capacidad }}</p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                             
                                <div class="form-group">
                                    <label for="">Colegio</label>
                                    @foreach ($colegio as $cole)
                                        @if ($aula->colegio_id == $cole->id)
                                            <p>{{ $cole->name }}</p>
                                        @endif
                                    @endforeach
                                </div>
                             
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/aulas') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
