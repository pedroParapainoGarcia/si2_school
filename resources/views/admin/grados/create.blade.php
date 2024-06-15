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
                                    <select name="grado" id="" class="form-control">
                                        <option value="1° primaria">1° primaria</option>
                                        <option value="2° primaria">2° primaria</option>
                                        <option value="3° primaria">3° primaria</option>
                                        <option value="4° primaria">4° primaria</option>
                                        <option value="5° primaria">5° primaria</option>
                                        <option value="6° primaria">6° primaria</option>
                                        <option value="1° secundaria">1° secundaria</option>
                                        <option value="2° secundaria">2° secundaria</option>
                                        <option value="3° secundaria">3° secundaria</option>
                                        <option value="4° secundaria">4° secundaria</option>
                                        <option value="5° secundaria">5° secundaria</option>
                                        <option value="6° secundaria">6° ecundaria</option>
                                    </select>
                                </div>
                            </div>                           


                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="nivel_id">Nivel</label>
                                    <select required class="form-control" name="nivel_id" id="nivel_id">
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->id }}">{{ $nivel->nombre}}</option>
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
