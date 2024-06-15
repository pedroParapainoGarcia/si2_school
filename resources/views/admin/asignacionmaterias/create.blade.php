@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nueva Asignacion de Materia</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/asignacionmaterias ') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="docente_id">Docente</label>
                                    <select required class="form-control" name="docente_id" id="docente_id">
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="grado_id">Materia</label>
                                    <select required class="form-control" name="materia_id" id="materia_id">
                                        @foreach ($materias as $materia)
                                            <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            


                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/asignacionmaterias') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2"></i> Guardar
                                    registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
