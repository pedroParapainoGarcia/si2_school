@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Datos del Paralelo</h1>
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
                                <label for="">Nombre</label>
                                <p>{{ $paralelo->nombre }}</p>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Cupo</label>
                                <p>{{ $paralelo->cupo }}</p>
                            </div>
                        </div>
                  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Curso</label>
                                @foreach ($grado as $level)
                                    @if ($paralelo->grado_id == $level->id)
                                        <p>{{ $level->grado }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tutor</label>
                                <p>{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno. ' ' . $docente->usuario->apellidoMaterno }}</p>
                            </div>
                        </div>
                    </div>

                    

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/paralelos') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
