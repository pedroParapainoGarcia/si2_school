<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Colegio;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\PadreDeFamilia;
use App\Models\Paralelo;
use App\Models\TutorEstudiante;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create(Request $request)
    {
        $tipoPersona = $request->tipo;

        switch ($tipoPersona) {
            case 'Adm.':
                $colegios = Colegio::all();
                $roles = Role::all();
                return view('admin.usuarios.create_admin', compact('colegios', 'roles'));
            case 'prof.':
                $roles = Role::all();
                return view('admin.usuarios.create_profesor', compact('roles'));
            case 'Est.':
                $roles = Role::all();
                $niveles = Nivel::all();
                $paralelos = Paralelo::all();
                $tutorestudiante = TutorEstudiante::all();
                return view('admin.usuarios.create_estudiante', compact('roles', 'niveles', 'paralelos', 'tutorestudiante'));
            default:
                return redirect()->back()->withErrors('Tipo de persona no válido');
        }
    }

    public function store(Request $request)
    {
        // Validaciones comunes para un usuario
        $this->validateCommon($request);

        // Validación de datos específicos para Estudiantes y Padres de Familia
        if ($request->roles == '4') { // Estudiante
            $this->validateStudent($request);
        }

        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->apellidoPaterno = $request->apellidoPaterno;
        $usuario->apellidoMaterno = $request->apellidoMaterno;
        $usuario->ci = $request->ci;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->sexo = $request->sexo;
        $usuario->direccion=$request->direccion;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci); // Usar CI como password
        $usuario->save();
        $roles = Role::find($request->roles);
        $usuario->assignRole($roles);

        switch ($request->roles) {
            case '1': // Administrador
                $usuario->type = 'Adm.';
                $usuario->save();

                $request->validate([
                    'cargo' => 'required',
                    'colegio_id' => 'required',
                ]);

                $administrador = new Administrador();
                $administrador->id = $usuario->id;
                $administrador->cargo = $request->cargo;
                $administrador->colegio_id = $request->colegio_id;
                $administrador->save();

                return redirect()->route('administradors.index')
                    ->with('mensaje', 'Se registró al usuario administrador correctamente')
                    ->with('icono', 'success');
                break;

            case '2': // Docente
                $usuario->type = 'prof.';
                $usuario->save();

                $request->validate([
                    'especialidad' => 'required',
                    'nivelFormacion' => 'required',
                ]);

                $docente = new Docente();
                $docente->id = $usuario->id;
                $docente->especialidad = $request->especialidad;
                $docente->nivelFormacion = $request->nivelFormacion;
                $docente->save();

                return redirect()->route('docentes.index')
                    ->with('mensaje', 'Se registró al usuario docente correctamente')
                    ->with('icono', 'success');
                break;

            case '4': // Estudiante

                $this->validateStudent($request);
                $this->createEstudiante($request, $usuario);

                return redirect()->route('estudiantes.index')
                    ->with('mensaje', 'Se registró al estudiante correctamente')
                    ->with('icono', 'success');
                break;

            default:
                throw new \Exception('Rol no válido');
        }
    }

    private function validateCommon(Request $request)
    {
        $messages = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'El registro ya está en uso.',
            'required_if' => 'El campo es obligatorio',
            'date' => 'El campo debe ser una fecha válida.',
            'email' => 'El campo debe ser un correo electrónico válido.',
            'numeric' => 'El campo debe ser un número.',
            'integer' => 'El campo debe ser un número entero.',
            'ci' => 'el campo debe ser un ci valido',
        ];

        $request->validate([
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'ci' => 'required|string|max:255|unique:users,ci',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|numeric',
            'sexo' => 'required|string|max:1',
            'direccion' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'roles' => 'required',
        ], $messages);
    }

    // Controlador ajustado
    private function createEstudiante(Request $request, User $usuario)
    {
        $usuario->type ='Est.';
        $usuario->save();

        $estudiante = new Estudiante();
        $estudiante->id = $usuario->id;
        $estudiante->nro_rude = $request->nro_rude;
        $estudiante->nivel_id = $request->nivel_id;
        $estudiante->paralelo_id = $request->paralelo_id;
        $estudiante->save();

        $tutor_estudiante = new TutorEstudiante();
        $tutor_estudiante->estudiante_id = $estudiante->id;

        //dd($request->parent_id);
        if (($request->parent_status === 'yes') && ($request->parent_id)) {
            $tutor_estudiante->tutor_id = $request->parent_id;
        } else {
            $padre = $this->createPadreDeFamilia($request);
            $tutor_estudiante->tutor_id = $padre->id;
        }

        $tutor_estudiante->save();
    }

    private function createPadreDeFamilia(Request $request)
    {
        $usuariopf = new User();
        $usuariopf->nombre = $request->namePadres;
        $usuariopf->apellidoPaterno = $request->apellidoPaternoPF;
        $usuariopf->apellidoMaterno = $request->apellidoMaternoPF;
        $usuariopf->ci = $request->ciPF;
        $usuariopf->fechaNacimiento = $request->fechaNacimientoPF;
        $usuariopf->telefono = $request->telefonoPF;
        $usuariopf->sexo = $request->sexoPF;
        $usuariopf->direccion=$request->direccionPF;
        $usuariopf->email = $request->emailPF;
        $usuariopf->password = Hash::make($request->ciPF); // O ajustar según la lógica de tu aplicación
        $usuariopf->type = 'PPff.';
        $usuariopf->save();

        $padre = new PadreDeFamilia();
        $padre->id = $usuariopf->id;
        $padre->ocupacionLaboral = $request->ocupacionLaboral;
        $padre->mayorGradoInstruccion = $request->mayorGradoInstruccion;
        $padre->tipo = $request->tipo;
        $padre->save();

        $usuariopf->assignRole('Padre de Familia');
        return $padre;
    }

    private function validateStudent(Request $request)
    {
        $rules = [
            'nro_rude' => 'required_if:roles,4|unique:estudiantes,nro_rude',
            'nivel_id' => 'required_if:roles,4',
            'paralelo_id' => 'required_if:roles,4',
            'parent_status' => 'required|in:yes,no',

        ];

        if ($request->parent_status === 'no') {
            $rules = array_merge($rules, [
                'ocupacionLaboral' => 'required',
                'mayorGradoInstruccion' => 'required',
                'tipo' => 'required',
                'namePadres' => 'required',
                'apellidoPaternoPF' => 'required',
                'apellidoMaternoPF' => 'required',
                'ciPF' => 'required|string|max:255|unique:users,ci',
                'fechaNacimientoPF' => 'required|date',
                'telefonoPF' => 'required|numeric',
                'sexoPF' => 'required|string|max:1',
                'direccionPF' => 'required',
                'emailPF' => 'required|string|email|max:255|unique:users,email',
                // 'rolePadre' => 'required',

            ]);
        }

        $messages = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'El registro ya está en uso.',
            'required_if' => 'El campo es obligatorio',
            'date' => 'El campo debe ser una fecha válida.',
            'email' => 'El campo debe ser un correo electrónico válido.',
            'numeric' => 'El campo debe ser un número.',
            'integer' => 'El campo debe ser un número entero.',
            'ci' => 'el campo debe ser un ci valido',
        ];

        $request->validate($rules, $messages);
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.show', ['usuario' => $usuario]);
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $usuario->roles->pluck('name', 'name')->all();
        return view('admin.usuarios.edit', compact('usuario', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|unique:users,email,' . $id, // Añadir id del usuario para excluirlo en la validación
            'password' => 'nullable|confirmed', // Hacer el password opcional para permitir actualizar otros campos sin cambiar la contraseña
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $usuario = User::find($id);
        $usuario->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $usuario->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')
            ->with('mensaje', 'Se actualizó al usuario de manera correcta')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('usuarios.index')
            ->with('mensaje', 'Se eliminó al usuario de la manera correcta')
            ->with('icono', 'success');
    }
}


