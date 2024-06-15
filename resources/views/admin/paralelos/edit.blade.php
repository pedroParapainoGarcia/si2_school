@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos del Grado de Escolaridad</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/paralelos', $paralelo->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del paralelo</label>
                                    <input type="text" value="{{ $paralelo->nombre}}" name="nombre"
                                        class="form-control" required>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>                         
                             
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Cupo del paralelo</label>
                                    <input type="number" value="{{ $paralelo->cupo}}" name="cupo"
                                        class="form-control" required>
                                    @error('cupo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>      

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('grado_id', 'Curso') }}
                                    {{ Form::select('grado_id', $grado, $paralelo->grado_id, ['class' => 'form-control' . ($errors->has('grado_id') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('grado_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('docente_id', 'Tutor') }}
                                    <select required class="form-control" name="docente_id" id="docente_id">
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}" {{ $docente->id == $paralelo->docente_id ? 'selected' : '' }}>
                                                {{ $docente->usuario->name . ' ' . $docente->usuario->apellidoPaterno }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/paralelos') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i>
                                    Actualizar registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
