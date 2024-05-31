@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nuevo Grado</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/grados') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Curso</label>
                                    <select name="curso" id="" class="form-control">
                                        <option value="Primaria-1">Primaria-1</option>
                                        <option value="Primaria-2">Primaria-2</option>
                                        <option value="Primaria-3">Primaria-3</option>
                                        <option value="Primaria-4">Primaria-4</option>
                                        <option value="Primaria-5">Primaria-5</option>
                                        <option value="Primaria-6">Primaria-6</option>
                                        <option value="Secundaria-1">Secundaria-1</option>
                                        <option value="Secundaria-2">Secundaria-2</option>
                                        <option value="Secundaria-3">Secundaria-3</option>
                                        <option value="Secundaria-4">Secundaria-4</option>
                                        <option value="Secundaria-5">Secundaria-5</option>
                                        <option value="Secundaria-6">Secundaria-6</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Paralelo</label>
                                    <select name="paralelo" id="" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">B</option>
                                        <option value="E">C</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="nivel_id">Nivel</label>
                                    <select required class="form-control" name="nivel_id" id="nivel_id">
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->id }}">{{ $nivel->nivel . ' - ' . $nivel->turno }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/grados') }}" class="btn btn-secondary">Cancelar</a>
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
