@extends('layouts.admin')

@section('content')
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo Estudiante</h1>
            </div>
            <form action="{{ route('usuarios.store') }}" method="post" id="formularioEstudiante">
                @csrf
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Datos del Estudiante</h3>
                            </div>
                            <div class="card-body">
                                <!-- Datos del Estudiante -->
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nombre">Nombre </label>
                                            <input type="text" name="nombre" id="nombre" class="form-control"
                                                required autocomplete="off">
                                            @error('nombre')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidoPaterno">Apellido Paterno</label>
                                            <input type="text" name="apellidoPaterno" id="apellidoPaterno"
                                                class="form-control" required autocomplete="off">
                                            @error('apellidoPaterno')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidoMaterno">Apellido Materno</label>
                                            <input type="text" name="apellidoMaterno" id="apellidoMaterno"
                                                class="form-control" required autocomplete="off">
                                            @error('apellidoMaterno')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ci">Nro. Ci</label>
                                            <input type="text" name="ci" id="ci" class="form-control"
                                                required autocomplete="off">
                                            @error('ci')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fechaNacimiento">Fecha Nacimiento</label>
                                            <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                                                class="form-control" required>
                                            @error('fechaNacimiento')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="number" name="telefono" id="telefono" class="form-control"
                                                required autocomplete="off">
                                            @error('telefono')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <span class="info-box-text"><b>Sexo</b></span>
                                        <div class="form-group d-flex align-items-center">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="sexo"
                                                    id="sexo_masculino" value="M"
                                                    {{ old('sexo') == 'M' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="sexo_masculino">Masculino</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="sexo"
                                                    id="sexo_femenino" value="F"
                                                    {{ old('sexo') == 'F' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="sexo_femenino">Femenino</label>
                                            </div>
                                            @error('sexo')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                required autocomplete="off">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="roles">Rol</label>
                                            <select required class="form-control" name="roles" id="roles">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ $role->name == 'Estudiante' ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Datos academicos</h3>
                            </div>
                            <div class="card-body">
                                <!-- Datos academico del Estudiante -->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="nivel_id">Nivel</label>
                                            <select name="nivel_id" id="nivel_id" class="form-control">
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->id }}">
                                                        {{ $nivel->nivel . ' - ' . $nivel->turno }}</option>
                                                @endforeach
                                            </select>
                                            @error('nivel_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="grado_id">Grado</label>
                                            <select required class="form-control" name="grado_id" id="grado_id">
                                                @foreach ($grados as $grado)
                                                    <option value="{{ $grado->id }}">
                                                        {{ $grado->curso . ' - ' . $grado->paralelo }}</option>
                                                @endforeach
                                            </select>
                                            @error('grado_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nro_rude">Nro Rude</label>
                                            <input type="text" name="nro_rude" id="nro_rude" class="form-control"
                                                required autocomplete="off">
                                        </div>
                                        @error('nro_rude')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Datos del padre de familia o tutor legal</h3>
                            </div>
                            <div class="card-body">
                                <!-- Datos del ppff -->
                                <div class="row">
                                    <div id="consulta" class="additional-inputs col-xs-12 col-sm-12 col-md-4">

                                        <div class="form-group">
                                            <span class="info-box-text"><b>¿Tiene un padre registrado?</b></span>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="parent_status"
                                                    id="parent_status_yes" value="yes">
                                                <label class="form-check-label" for="parent_status_yes">Sí</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="parent_status"
                                                    id="parent_status_no" value="no">
                                                <label class="form-check-label" for="parent_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div id="ci-check" style="display: none;" class="col-md-3">
                                        <div class="form-group">
                                            <label for="ciPF_check">CI del Padre:</label>
                                            <input type="text" name="ciPF_check" id="ciPF_check"
                                                class="form-control">
                                            <button type="button" id="checkParent"
                                                class="btn btn-primary mt-2">Verificar</button>
                                            <small id="ci-error" class="text-danger" style="display: none;">Registro no
                                                encontrado, Registrar Datos: </small>
                                        </div>
                                    </div>
                                    <div id="parent-details" class="row" style="display: none;">
                                        <div class="row">

                                            <div id="nombrePFS" class="additional-inputs col-xs-12 col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="nombre_Padres">Nombre</label>
                                                    <input type="text" name="namePadres" id="nombre_Padres"
                                                        autocomplete="off" class="form-control">
                                                    @error('namePadres')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div id="ap_paternoPF" class="additional-inputs col-xs-12 col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="apellido_paternoPF">Apellido Paterno</label>
                                                    <input type="text" name="apellidoPaternoPF"
                                                        id="apellido_paternoPF" class="form-control" autocomplete="off">
                                                    @error('apellidoPaternoPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="ap_maternoPF" class="additional-inputs col-xs-12 col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="apellido_maternoPF">Apellido Materno</label>
                                                    <input type="text" name="apellidoMaternoPF"
                                                        id="apellido_maternoPF" class="form-control" autocomplete="off">
                                                    @error('apellidoMaternoPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="carnet_PF" class="additional-inputs col-xs-12 col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="ci_PF">Nro. Ci</label>
                                                    <input type="text" name="ciPF" id="ci_PF"
                                                        class="form-control" autocomplete="off">
                                                    @error('ciPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="fnacimientoPF"
                                                class="additional-inputs col-xs-12 col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="fecha_nacimientoPF">Fecha Nacimiento</label>
                                                    <input type="date" name="fechaNacimientoPF"
                                                        id="fecha_nacimientoPF" class="form-control" autocomplete="off">
                                                    @error('fechaNacimientoPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="telPF" class="additional-inputs col-xs-12 col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="telefono_PF">Teléfono</label>
                                                    <input type="number" name="telefonoPF" id="telefono_PF"
                                                        class="form-control" autocomplete="off">
                                                    @error('telefonoPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="sexo_PF" class="additional-inputs col-xs-12 col-sm-12 col-md-3">
                                                <span class="info-box-text"><b>Sexo</b></span>
                                                <div class="form-group d-flex align-items-center">
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="sexoPF"
                                                            id="sexo_masculinoPF" value="M"
                                                            {{ old('sexoPF') == 'M' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="sexo_masculinoPF">Masculino</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="sexoPF"
                                                            id="sexo_femeninoPF" value="F"
                                                            {{ old('sexoPF') == 'F' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="sexo_femeninoPF">Femenino</label>
                                                    </div>
                                                    @error('sexoPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="correoPF" class="additional-inputs col-xs-12 col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="email_PF">Email</label>
                                                    <input type="email" name="emailPF" id="email_PF"
                                                        class="form-control" autocomplete="off">
                                                    @error('emailPF')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div id="rolPadre" class="additional-inputs col-xs-12 col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="role_Padre">Rol</label>
                                                    <select required class="form-control" name="rolePadre"
                                                        id="role_Padre">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                {{ $role->name == 'Padre de Familia' ? 'selected' : '' }}>
                                                                {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="ocupacionPF" class="additional-inputs col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="ocupacion_Laboral">Ocupación Laboral</label>
                                                    <input type="text" name="ocupacionLaboral" id="ocupacion_Laboral"
                                                        autocomplete="off" class="form-control"
                                                        value="{{ old('ocupacionLaboral') }}">
                                                    @error('ocupacionLaboral')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div id="GradoInstruccionPF"
                                                class="additional-inputs col-xs-12 col-sm-12 col-md-5">
                                                <div class="form-group">
                                                    <label for="mayor_Grado_Instruccion">Mayor Grado de Instrucción</label>
                                                    <select id="mayor_Grado_Instruccion" name="mayorGradoInstruccion"
                                                        class="form-control">
                                                        <option value="sin_instruccion">Sin instrucción formal</option>
                                                        <option value="primaria_incompleta">Educación primaria incompleta
                                                        </option>
                                                        <option value="primaria_completa">Educación primaria completa
                                                        </option>
                                                        <option value="secundaria_incompleta">Educación secundaria
                                                            incompleta
                                                        </option>
                                                        <option value="secundaria_completa">Educación secundaria completa
                                                        </option>
                                                        <option value="tecnica_incompleta">Educación técnica o vocacional
                                                            incompleta</option>
                                                        <option value="tecnica_completa">Educación técnica o vocacional
                                                            completa</option>
                                                        <option value="universitaria_incompleta">Educación universitaria
                                                            incompleta</option>
                                                        <option value="universitaria_completa">Educación universitaria
                                                            completa
                                                        </option>
                                                        <option value="postgrado_incompleto">Postgrado (especialización,
                                                            maestría, doctorado) incompleto</option>
                                                        <option value="postgrado_completo">Postgrado (especialización,
                                                            maestría, doctorado) completo</option>
                                                    </select>
                                                    @error('mayorGradoInstruccion')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div id="tipo_P_TL" class="additional-inputs col-xs-12 col-sm-12 col-md-3">
                                                <span class="info-box-text"><b>Tipo</b></span>
                                                <div class="form-group d-flex align-items-center">
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="tipo"
                                                            id="tipo_padre" value="PF"
                                                            {{ old('tipo') == 'PF' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="tipo_padre">Padre/Madre</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0">
                                                        <input class="form-check-input" type="radio" name="tipo"
                                                            id="tipo_tutor" value="TL"
                                                            {{ old('tipo') == 'TL' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="tipo_tutor">Tutor
                                                            Legal</label>
                                                    </div>
                                                    @error('tipo')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ url('admin/inscripciones') }}"
                                        class="btn btn-secondary btn-lg">Cancelar</a>
                                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Campo oculto para almacenar el ID del padre -->
                <input type="hidden" id="parent_id" name="parent_id">
                <!-- Botones de acción -->
            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('input[name="parent_status"]').forEach((elem) => {
            elem.addEventListener("change", function() {
                var parentStatus = this.value;
                if (parentStatus === "yes") {
                    document.getElementById("parent-details").style.display = "none";
                    document.getElementById("ci-check").style.display = "block"; // Habilitar ci-check
                    disableParentFields();
                } else {
                    document.getElementById("parent-details").style.display = "block";
                    document.getElementById("ci-check").style.display = "none"; // Deshabilitar ci-check
                    document.getElementById("consulta").style.display = "none"; // Deshabilitar consulta

                    enableParentFields();
                }
            });
        });

        document.getElementById("checkParent").addEventListener("click", function() {
            const ciPF = document.getElementById("ciPF_check").value;
            if (ciPF) {
                fetch(`/api/check-parent/${ciPF}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            document.getElementById("parent-details").style.display = "none";
                            document.getElementById("ci-error").style.display = "none";

                            // Vincular el ID del padre al formulario del estudiante
                            document.getElementById("parent_id").value = data.parent.id;

                            // Deshabilitar campos de registro del padre
                            disableParentFields();

                            // Mostrar mensaje de que el padre está vinculado correctamente
                            alert("El padre ha sido vinculado correctamente.");
                        } else {
                            document.getElementById("ci-error").style.display = "block";
                            document.getElementById("parent-details").style.display = "block";
                            // Habilitar campos de registro del padre
                            enableParentFields();
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        document.getElementById("ci-error").style.display = "block";
                    });
            } else {
                document.getElementById("ci-error").style.display = "block";
            }
        });

        function disableParentFields() {
            const fields = ["nombrePFS", "ap_paternoPF", "ap_maternoPF", "carnet_PF", "fnacimientoPF", "telPF",
                "sexo_PF", "correoPF", "rolPadre", "ocupacionPF", "GradoInstruccionPF", "tipo_P_TL"
            ];
            fields.forEach(field => {
                const element = document.getElementById(field);
                if (element) {
                    element.disabled = true;
                }
            });
        }

        function enableParentFields() {
            const fields = ["nombrePFS", "ap_paternoPF", "ap_maternoPF", "carnet_PF", "fnacimientoPF", "telPF",
                "sexo_PF", "correoPF", "rolPadre", "ocupacionPF", "GradoInstruccionPF", "tipo_P_TL"
            ];
            fields.forEach(field => {
                document.getElementById(field).disabled = false;
            });
        }
    </script>


@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('plugins/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>

@stop
