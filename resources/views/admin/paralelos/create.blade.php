@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nuevo Paralelo</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/paralelos ') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre de Paralelo</label>
                                    <input type="text" value="{{ old('nombre') }}" name="nombre" class="form-control"
                                        required>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Cupo de Paralelo</label>
                                    <input type="number" value="{{ old('cupo') }}" name="cupo" class="form-control"
                                        required>
                                    @error('cupo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="grado_id">Curso</label>
                                    <select required class="form-control" name="grado_id" id="grado_id">
                                        @foreach ($grados as $grado)
                                            <option value="{{ $grado->id }}">{{ $grado->grado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="docente_id">Tutor</label>
                                    <select required class="form-control" name="docente_id" id="docente_id">
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->usuario->nombre . ' ' . $docente->usuario->apellidoPaterno }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 


                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/paralelos') }}" class="btn btn-secondary">Cancelar</a>
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
