@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Nuevo usuario</h1>
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
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="nombre">Nombre del usuario</label>
                                    <input type="text" autocomplete="off" value="{{ old('nombre') }}" name="nombre"
                                        id="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="apellidoPaterno">Apellido Paterno </label>
                                    <input type="text" value="{{ old('apellidoPaterno') }}" name="apellidoPaterno"
                                        id="apellidoPaterno" class="form-control" required autocomplete="off">
                                    @error('apellidoPaterno')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
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

                            <div class="col-xs-12 col-sm-12 col-md-2">
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

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="telefono">Telefono </label>
                                    <input type="text" value="{{ old('telefono') }}" name="telefono" id="telefono"
                                        class="form-control" required autocomplete="off">
                                    @error('telefono')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <label class="mr-3">Sexo</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexo_masculino"
                                        value="M" {{ old('sexo') == 'M' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sexo_masculino">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexo_femenino"
                                        value="F" {{ old('sexo') == 'F' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sexo_femenino">Femenino</label>
                                </div>

                                @error('sexo')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror


                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-2">
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
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="password_confirmation">Repetir Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required autocomplete="new-password">
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

                        </div>

                        <div class="row">

                            <div id="adminCargo" class="additional-inputs col-xs-12 col-sm-12 col-md-2"
                                style="display: none;">
                                <div class="form-group">
                                    <label for="cargo">Cargo del Admin.</label>
                                    <input type="text" value="{{ old('cargo') }}" name="cargo" id="cargo"
                                        class="form-control">
                                    @error('cargo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div id="idColegio" class="additional-inputs col-xs-12 col-sm-12 col-md-4"
                                style="display: none;">
                                <div class="form-group">
                                    <label for="colegio_id">Colegio</label>
                                    <select required class="form-control" name="colegio_id" id="colegio_id">
                                        @foreach ($colegios as $colegio)
                                            <option value="{{ $colegio->id }}">{{ $colegio->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div id="idEspecialidad" class="additional-inputs col-xs-12 col-sm-12 col-md-2"
                                style="display: none;">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad </label>
                                    <input type="text" value="{{ old('especialidad') }}" name="especialidad"
                                        id="especialidad" class="form-control">
                                    @error('especialidad')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div id="idParalelo" class="additional-inputs col-xs-12 col-sm-12 col-md-4" style="display: none;">
                                <div class="form-group">
                                    <label for="paralelo_id">Paralelo</label>
                                    <select required class="form-control" name="paralelo_id" id="paralelo_id">
                                        @foreach ($paralelos as $paralelo)
                                            <option value="{{ $paralelo->id }}">{{ $paralelo->grado_escolaridad->name . ' - ' . $paralelo->sigla }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}


                            <div id="estudianteRude" class="additional-inputs col-xs-12 col-sm-12 col-md-2"
                                style="display: none;">
                                <div class="form-group">
                                    <label for="nro_rude">Nro Rude </label>
                                    <input type="text" value="{{ old('nro_rude') }}" name="nro_rude" id="nro_rude"
                                        class="form-control">
                                    @error('nro_rude')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div id="idGrupo" class="additional-inputs col-xs-12 col-sm-12 col-md-4"
                                style="display: none;">
                                <div class="form-group">
                                    <label for="grupo">Grupo </label>
                                    <input type="text" value="{{ old('grupo') }}" name="grupo" id="grupo"
                                        class="form-control">
                                    @error('grupo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> --}}

                            <div id="idParentesco" class="additional-inputs col-xs-12 col-sm-12 col-md-2"
                                style="display: none;">
                                <div class="form-group">
                                    <label for="parentesco">Parentesco </label>
                                    <input type="text" value="{{ old('parentesco') }}" name="parentesco"
                                        id="parentesco" class="form-control">
                                    @error('parentesco')
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

@section('js')
    <script src="{{ asset('plugins/jquery/script.js') }}"></script>

@stop
