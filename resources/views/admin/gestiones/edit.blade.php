@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos de la Gestion</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/gestiones',$gestion->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre de la Gestion</label>
                                    <input type="text" value="{{$gestion->nombreGestion}}" name="nombreGestion" 
                                    class="form-control" required>
                                    @error('nombreGestion')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                                 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <select name="estado" id="" class="form-control">
                                            <option value="1" {{ $gestion->estado == 1 ? 'selected' : '' }}> Activo </option>
                                            <option value="0" {{ $gestion->estado == 0 ? 'selected' : '' }}> Inactivo </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                                     

                        
                          
                        </div>

                                              
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{url('admin/gestiones')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Actualizar registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
