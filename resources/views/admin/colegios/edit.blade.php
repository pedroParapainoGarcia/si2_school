@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Modificación de datos del colegio</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/colegios',$colegio->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre del colegio</label>
                                    <input type="text" value="{{$colegio->name}}" name="name" 
                                    class="form-control" required>
                                    @error('name')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Codigo del colegio</label>
                                    <input type="text" value="{{$colegio->codigo}}" name="codigo" 
                                    class="form-control" required>
                                    @error('codigo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Correo </label>
                                    <input type="text" value="{{$colegio->correo}}" name="correo" 
                                    class="form-control" required>
                                    @error('correo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                                             
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Telefono</label>
                                    <input type="text" value="{{$colegio->telefono}}" name="telefono" 
                                    class="form-control" required>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                       

                        
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Ubicacion del colegio</label>
                                    <input type="text" value="{{$colegio->ubicacion}}" name="ubicacion" 
                                    class="form-control" required>
                                    @error('ubicacion')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                                              
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{url('admin/colegios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Actualizar registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
