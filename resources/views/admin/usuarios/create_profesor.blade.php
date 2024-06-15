@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Registro de nuevo Docente</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/usuarios') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre del usuario</label>
                                    <input type="text" autocomplete="off" value="{{ old('nombre') }}" name="nombre"
                                        id="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="apellidoPaterno">Apellido Paterno </label>
                                    <input type="text" value="{{ old('apellidoPaterno') }}" name="apellidoPaterno"
                                        id="apellidoPaterno" class="form-control" required autocomplete="off">
                                    @error('apellidoPaterno')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="apellidoMaterno">Apellido Materno </label>
                                        <input type="text" value="{{ old('apellidoMaterno') }}" name="apellidoMaterno"
                                            id="apellidoMaterno" class="form-control" required autocomplete="off">
                                        @error('apellidoMaterno')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ci">Nro. Ci</label>
                                        <input type="text" value="{{ old('ci') }}" name="ci" id="ci"
                                            class="form-control" required autocomplete="off">
                                        @error('ci')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ci">Fecha Nacimiento</label>
                                        <input type="date" value="{{ old('fechaNacimiento') }}" name="fechaNacimiento"
                                            id="fechaNacimiento" class="form-control" required autocomplete="off">
                                        @error('fechaNacimiento')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono </label>
                                    <input type="text" value="{{ old('telefono') }}" name="telefono" id="telefono"
                                        class="form-control" required autocomplete="off">
                                    @error('telefono')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label class="mr-3">Sexo</label>

                                <div class="form-group d-flex align-items-center">
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_masculino"
                                            value="M" {{ old('sexo') == 'M' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sexo_masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_femenino"
                                            value="F" {{ old('sexo') == 'F' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sexo_femenino">Femenino</label>
                                    </div>

                                    @error('sexo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror


                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="direccion">DIRECCION</label>
                                    <input type="text" name="direccion" id="direccion"
                                        class="form-control" required autocomplete="off">
                                    @error('direccion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">

                                    <label for="email">Email</label>
                                    <input type="email" value="{{ old('email') }}" name="email" id="email"
                                        class="form-control" required autocomplete="off">

                                    @error('email')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="roleSelect">Rol</label>
                                    <select required class="form-control" name="roles" id="roleSelect">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                      

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <input type="text" value="{{ old('especialidad') }}" name="especialidad" id="especialidad"
                                        class="form-control">
                                    @error('especialidad')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="nivelFormacion">Nivel Formacion</label>
                                    <input type="text" value="{{ old('nivelFormacion') }}" name="nivelFormacion" id="nivelFormacion"
                                        class="form-control">
                                    @error('nivelFormacion')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                             





                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
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
