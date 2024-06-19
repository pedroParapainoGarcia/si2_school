<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', function () { return view('admin'); });

Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index',)->middleware('auth');

Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('usuarios.create')->middleware('auth');
Route::post('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');
Route::get('/asignar-roles', [App\Http\Controllers\UsuarioController::class, 'asignarRoles']);


Route::get('/admin/roles', [App\Http\Controllers\RolController::class, 'index'])->name('roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RolController::class, 'create'])->name('roles.create')->middleware('auth');
Route::post('/admin/roles', [App\Http\Controllers\RolController::class, 'store'])->name('roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RolController::class, 'show'])->name('roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RolController::class, 'edit'])->name('roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RolController::class, 'update'])->name('roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RolController::class, 'destroy'])->name('roles.destroy')->middleware('auth'); 

Route::get('/admin/colegios', [App\Http\Controllers\ColegioController::class, 'index'])->name('colegios.index')->middleware('auth');
Route::get('/admin/colegios/create', [App\Http\Controllers\ColegioController::class, 'create'])->name('colegios.create')->middleware('auth');
Route::post('/admin/colegios', [App\Http\Controllers\ColegioController::class, 'store'])->name('colegios.store')->middleware('auth');
Route::get('/admin/colegios/{id}', [App\Http\Controllers\ColegioController::class, 'show'])->name('colegios.show')->middleware('auth');
Route::get('/admin/colegios/{id}/edit', [App\Http\Controllers\ColegioController::class, 'edit'])->name('colegios.edit')->middleware('auth');
Route::put('/admin/colegios/{id}', [App\Http\Controllers\ColegioController::class, 'update'])->name('colegios.update')->middleware('auth');
Route::delete('/admin/colegios/{id}', [App\Http\Controllers\ColegioController::class, 'destroy'])->name('colegios.destroy')->middleware('auth');

Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('configuraciones.index')->middleware('auth');



Route::get('/admin/administradors', [App\Http\Controllers\AdministradorController::class, 'index'])->name('administradors.index')->middleware('auth');
Route::get('/admin/administradors/create', [App\Http\Controllers\AdministradorController::class, 'create'])->name('administradors.create')->middleware('auth');
Route::post('/admin/administradors', [App\Http\Controllers\AdministradorController::class, 'store'])->name('administradors.store')->middleware('auth');
Route::get('/admin/administradors/{id}', [App\Http\Controllers\AdministradorController::class, 'show'])->name('administradors.show')->middleware('auth');
Route::get('/admin/administradors/{id}/edit', [App\Http\Controllers\AdministradorController::class, 'edit'])->name('administradors.edit')->middleware('auth');
Route::put('/admin/administradors/{id}', [App\Http\Controllers\AdministradorController::class, 'update'])->name('administradors.update')->middleware('auth');
Route::delete('/admin/administradors/{id}', [App\Http\Controllers\AdministradorController::class, 'destroy'])->name('administradors.destroy')->middleware('auth');


Route::get('/admin/docentes', [App\Http\Controllers\DocenteController::class, 'index'])->name('docentes.index')->middleware('auth');
Route::get('/admin/docentes/create', [App\Http\Controllers\DocenteController::class, 'create'])->name('docentes.create')->middleware('auth');
Route::post('/admin/docentes', [App\Http\Controllers\DocenteController::class, 'store'])->name('docentes.store')->middleware('auth');
Route::get('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'show'])->name('docentes.show')->middleware('auth');
Route::get('/admin/docentes/{id}/edit', [App\Http\Controllers\DocenteController::class, 'edit'])->name('docentes.edit')->middleware('auth');
Route::put('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'update'])->name('docentes.update')->middleware('auth');
Route::delete('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'destroy'])->name('docentes.destroy')->middleware('auth');


Route::get('/admin/materias', [App\Http\Controllers\MateriaController::class, 'index'])->name('materias.index')->middleware('auth');
Route::get('/admin/materias/create', [App\Http\Controllers\MateriaController::class, 'create'])->name('materias.create')->middleware('auth');
Route::post('/admin/materias', [App\Http\Controllers\MateriaController::class, 'store'])->name('materias.store')->middleware('auth');
Route::get('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'show'])->name('materias.show')->middleware('auth');
Route::get('/admin/materias/{id}/edit', [App\Http\Controllers\MateriaController::class, 'edit'])->name('materias.edit')->middleware('auth');
Route::put('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'update'])->name('materias.update')->middleware('auth');
Route::delete('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'destroy'])->name('materias.destroy')->middleware('auth'); 

Route::get('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'index'])->name('gestiones.index')->middleware('auth');
Route::get('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'create'])->name('gestiones.create')->middleware('auth');
Route::post('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'store'])->name('gestiones.store')->middleware('auth');
Route::get('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'show'])->name('gestiones.show')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [App\Http\Controllers\GestionController::class, 'edit'])->name('gestiones.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'update'])->name('gestiones.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'destroy'])->name('gestiones.destroy')->middleware('auth');


Route::get('/admin/niveles', [App\Http\Controllers\NivelController::class, 'index'])->name('niveles.index')->middleware('auth');
Route::get('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'create'])->name('niveles.create')->middleware('auth');
Route::post('/admin/niveles', [App\Http\Controllers\NivelController::class, 'store'])->name('niveles.store')->middleware('auth');
Route::get('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'show'])->name('niveles.show')->middleware('auth');
Route::get('/admin/niveles/{id}/edit', [App\Http\Controllers\NivelController::class, 'edit'])->name('niveles.edit')->middleware('auth');
Route::put('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'update'])->name('niveles.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'destroy'])->name('niveles.destroy')->middleware('auth');

Route::get('/admin/grados', [App\Http\Controllers\GradoController::class, 'index'])->name('grados.index')->middleware('auth');
Route::get('/admin/grados/create', [App\Http\Controllers\GradoController::class, 'create'])->name('grados.create')->middleware('auth');
Route::post('/admin/grados', [App\Http\Controllers\GradoController::class, 'store'])->name('grados.store')->middleware('auth');
Route::get('/admin/grados/{id}', [App\Http\Controllers\GradoController::class, 'show'])->name('grados.show')->middleware('auth');
Route::get('/admin/grados/{id}/edit', [App\Http\Controllers\GradoController::class, 'edit'])->name('grados.edit')->middleware('auth');
Route::put('/admin/grados/{id}', [App\Http\Controllers\GradoController::class, 'update'])->name('grados.update')->middleware('auth');
Route::delete('/admin/grados/{id}', [App\Http\Controllers\GradoController::class, 'destroy'])->name('grados.destroy')->middleware('auth');

Route::get('/admin/inscripciones', [App\Http\Controllers\FormularioInscripcionController::class, 'index'])->name('inscripciones.index')->middleware('auth');

Route::get('/admin/estudiantes', [App\Http\Controllers\EstudianteController::class, 'index'])->name('estudiantes.index')->middleware('auth');
Route::get('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'create'])->name('estudiantes.create')->middleware('auth');
Route::post('/admin/estudiantes', [App\Http\Controllers\EstudianteController::class, 'store'])->name('estudiantes.store')->middleware('auth');
Route::get('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'show'])->name('estudiantes.show')->middleware('auth');
Route::get('/admin/estudiantes/{id}/edit', [App\Http\Controllers\EstudianteController::class, 'edit'])->name('estudiantes.edit')->middleware('auth');
Route::put('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'update'])->name('estudiantes.update')->middleware('auth');
Route::delete('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'destroy'])->name('estudiantes.destroy')->middleware('auth');

Route::get('/admin/asignacionmaterias', [App\Http\Controllers\AsignacionMateriaController::class, 'index'])->name('asignacionmaterias.index')->middleware('auth');
Route::get('/admin/asignacionmaterias/create', [App\Http\Controllers\AsignacionMateriaController::class, 'create'])->name('asignacionmaterias.create')->middleware('auth');
Route::post('/admin/asignacionmaterias', [App\Http\Controllers\AsignacionMateriaController::class, 'store'])->name('asignacionmaterias.store')->middleware('auth');
Route::get('/admin/asignacionmaterias/{id}', [App\Http\Controllers\AsignacionMateriaController::class, 'show'])->name('asignacionmaterias.show')->middleware('auth');
Route::get('/admin/asignacionmaterias/{id}/edit', [App\Http\Controllers\AsignacionMateriaController::class, 'edit'])->name('asignacionmaterias.edit')->middleware('auth');
Route::put('/admin/asignacionmaterias/{id}', [App\Http\Controllers\AsignacionMateriaController::class, 'update'])->name('asignacionmaterias.update')->middleware('auth');
Route::delete('/admin/asignacionmaterias/{id}', [App\Http\Controllers\AsignacionMateriaController::class, 'destroy'])->name('asignacionmaterias.destroy')->middleware('auth');


Route::get('/admin/paralelos', [App\Http\Controllers\ParaleloController::class, 'index'])->name('paralelos.index')->middleware('auth');
Route::get('/admin/paralelos/create', [App\Http\Controllers\ParaleloController::class, 'create'])->name('paralelos.create')->middleware('auth');
Route::post('/admin/paralelos', [App\Http\Controllers\ParaleloController::class, 'store'])->name('paralelos.store')->middleware('auth');
Route::get('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'show'])->name('paralelos.show')->middleware('auth');
Route::get('/admin/paralelos/{id}/edit', [App\Http\Controllers\ParaleloController::class, 'edit'])->name('paralelos.edit')->middleware('auth');
Route::put('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'update'])->name('paralelos.update')->middleware('auth');
Route::delete('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'destroy'])->name('paralelos.destroy')->middleware('auth'); 

Route::get('paralelos/{id}/generatePDF', [App\Http\Controllers\ParaleloController::class, 'generatePDF'])->name('paralelos.generatePDF')->middleware('auth');


Route::get('/admin/aulas', [App\Http\Controllers\AulaController::class, 'index'])->name('aulas.index')->middleware('auth');
Route::get('/admin/aulas/create', [App\Http\Controllers\AulaController::class, 'create'])->name('aulas.create')->middleware('auth');
Route::post('/admin/aulas', [App\Http\Controllers\AulaController::class, 'store'])->name('aulas.store')->middleware('auth');
Route::get('/admin/aulas/{id}', [App\Http\Controllers\AulaController::class, 'show'])->name('aulas.show')->middleware('auth');
Route::get('/admin/aulas/{id}/edit', [App\Http\Controllers\AulaController::class, 'edit'])->name('aulas.edit')->middleware('auth');
Route::put('/admin/aulas/{id}', [App\Http\Controllers\AulaController::class, 'update'])->name('aulas.update')->middleware('auth');
Route::delete('/admin/aulas/{id}', [App\Http\Controllers\AulaController::class, 'destroy'])->name('aulas.destroy')->middleware('auth');

Route::get('/admin/dias', [App\Http\Controllers\DiaController::class, 'index'])->name('dias.index')->middleware('auth');
Route::get('/admin/dias/create', [App\Http\Controllers\DiaController::class, 'create'])->name('dias.create')->middleware('auth');
Route::post('/admin/dias', [App\Http\Controllers\DiaController::class, 'store'])->name('dias.store')->middleware('auth');
Route::get('/admin/dias/{id}', [App\Http\Controllers\DiaController::class, 'show'])->name('dias.show')->middleware('auth');
Route::get('/admin/dias/{id}/edit', [App\Http\Controllers\DiaController::class, 'edit'])->name('dias.edit')->middleware('auth');
Route::put('/admin/dias/{id}', [App\Http\Controllers\DiaController::class, 'update'])->name('dias.update')->middleware('auth');
Route::delete('/admin/dias/{id}', [App\Http\Controllers\DiaController::class, 'destroy'])->name('dias.destroy')->middleware('auth'); 

Route::get('/admin/intervalos', [App\Http\Controllers\IntervaloController::class, 'index'])->name('intervalos.index')->middleware('auth');
Route::get('/admin/intervalos/create', [App\Http\Controllers\IntervaloController::class, 'create'])->name('intervalos.create')->middleware('auth');
Route::post('/admin/intervalos', [App\Http\Controllers\IntervaloController::class, 'store'])->name('intervalos.store')->middleware('auth');
Route::get('/admin/intervalos/{id}', [App\Http\Controllers\IntervaloController::class, 'show'])->name('intervalos.show')->middleware('auth');
Route::get('/admin/intervalos/{id}/edit', [App\Http\Controllers\IntervaloController::class, 'edit'])->name('intervalos.edit')->middleware('auth');
Route::put('/admin/intervalos/{id}', [App\Http\Controllers\IntervaloController::class, 'update'])->name('intervalos.update')->middleware('auth');
Route::delete('/admin/intervalos/{id}', [App\Http\Controllers\IntervaloController::class, 'destroy'])->name('intervalos.destroy')->middleware('auth');

Route::get('/admin/periodos', [App\Http\Controllers\PeriodoController::class, 'index'])->name('periodos.index')->middleware('auth');
Route::get('/admin/periodos/create', [App\Http\Controllers\PeriodoController::class, 'create'])->name('periodos.create')->middleware('auth');
Route::post('/admin/periodos', [App\Http\Controllers\PeriodoController::class, 'store'])->name('periodos.store')->middleware('auth');
Route::get('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'show'])->name('periodos.show')->middleware('auth');
Route::get('/admin/periodos/{id}/edit', [App\Http\Controllers\PeriodoController::class, 'edit'])->name('periodos.edit')->middleware('auth');
Route::put('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'update'])->name('periodos.update')->middleware('auth');
Route::delete('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'destroy'])->name('periodos.destroy')->middleware('auth');

Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('horarios.index')->middleware('auth');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('horarios.create')->middleware('auth');
Route::post('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'store'])->name('horarios.store')->middleware('auth');
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('horarios.show')->middleware('auth');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('horarios.edit')->middleware('auth');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('horarios.update')->middleware('auth');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('horarios.destroy')->middleware('auth');


Route::get('/admin/tutores', [App\Http\Controllers\PadreDeFamiliaController::class, 'index'])->name('tutores.index')->middleware('auth');
Route::get('/admin/tutores/create', [App\Http\Controllers\PadreDeFamiliaController::class, 'create'])->name('tutores.create')->middleware('auth');
Route::post('/admin/tutores', [App\Http\Controllers\PadreDeFamiliaController::class, 'store'])->name('tutores.store')->middleware('auth');
Route::get('/admin/tutores/{id}', [App\Http\Controllers\PadreDeFamiliaController::class, 'show'])->name('tutores.show')->middleware('auth');
Route::get('/admin/tutores/{id}/edit', [App\Http\Controllers\PadreDeFamiliaController::class, 'edit'])->name('tutores.edit')->middleware('auth');
Route::put('/admin/tutores/{id}', [App\Http\Controllers\PadreDeFamiliaController::class, 'update'])->name('tutores.update')->middleware('auth');
Route::delete('/admin/tutores/{id}', [App\Http\Controllers\PadreDeFamiliaController::class, 'destroy'])->name('tutores.destroy')->middleware('auth');

Route::get('/admin/tutorestudiantes', [App\Http\Controllers\TutorEstudianteController::class, 'index'])->name('tutorestudiantes.index')->middleware('auth');
Route::get('/admin/tutorestudiantes/create', [App\Http\Controllers\TutorEstudianteController::class, 'create'])->name('tutorestudiantes.create')->middleware('auth');
Route::post('/admin/tutorestudiantes', [App\Http\Controllers\TutorEstudianteController::class, 'store'])->name('tutorestudiantes.store')->middleware('auth');
Route::get('/admin/tutorestudiantes/{id}', [App\Http\Controllers\TutorEstudianteController::class, 'show'])->name('tutorestudiantes.show')->middleware('auth');
Route::get('/admin/tutorestudiantes/{id}/edit', [App\Http\Controllers\TutorEstudianteController::class, 'edit'])->name('tutorestudiantes.edit')->middleware('auth');
Route::put('/admin/tutorestudiantes/{id}', [App\Http\Controllers\TutorEstudianteController::class, 'update'])->name('tutorestudiantes.update')->middleware('auth');
Route::delete('/admin/tutorestudiantes/{id}', [App\Http\Controllers\TutorEstudianteController::class, 'destroy'])->name('tutorestudiantes.destroy')->middleware('auth');