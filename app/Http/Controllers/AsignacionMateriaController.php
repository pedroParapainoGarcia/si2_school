<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMateria;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Http\Request;

class AsignacionMateriaController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:asignacionmaterias.index')->only('index','show');
        $this->middleware('can:asignacionmaterias.create')->only('create', 'store');
        $this->middleware('can:asignacionmaterias.edit')->only('edit', 'update');
        $this->middleware('can:asignacionmaterias.destroy')->only('destroy');
    }

    public function index()
    {
        $asignaciones = AsignacionMateria::all();
        $materias = Materia::all();
        $docentes = Docente::all();
        return view('admin.asignacionmaterias.index', compact('asignaciones', 'materias', 'docentes'));
    }


    public function create()
    {
        $materias = Materia::all();
        $usuarios = User::all();
        $docentes = Docente::all();
        return view('admin.asignacionmaterias.create', compact('materias', 'docentes', 'usuarios'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'materia_id' => 'required',
            'docente_id' => 'required',
        ]);

        $asignacion = new AsignacionMateria();

        $asignacion->materia_id = $request->get('materia_id');
        $asignacion->docente_id = $request->get('docente_id');
        $asignacion->save();

        return redirect()->route('asignacionmaterias.index')
            ->with('mensaje', 'Se registro la asignacion de materia de manera correcta')
            ->with('icono', 'success');
    }


    public function show($id)
    {
        $materia = Materia::all();
        $asignacion = AsignacionMateria::findOrFail($id);
        $iduser = $asignacion->docente_id;
        $docente = Docente::findOrFail($iduser);

        return view('admin.asignacionmaterias.show', compact('docente', 'materia', 'asignacion'));
    }



    public function edit($id)
    {
        $asignacion = AsignacionMateria::findOrFail($id);
        $materias = Materia::all();
        $materia = [];
        foreach ($materias as $materiaItem) {
            $materia[$materiaItem->id] = $materiaItem->name;
        }
        $docentes = Docente::all();
        $usuario = User::all();
        return view('admin.asignacionmaterias.edit', compact('asignacion', 'materia', 'docentes', 'usuario'));
    }



    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'materia_id' => 'required',
            'docente_id' => 'required',
        ]);

        $input = $request->all();
        $asignacion = AsignacionMateria::find($id);
        $asignacion->update($input);


        return redirect()->route('asignacionmaterias.index')
            ->with('mensaje', 'Se actualizó asignacion materia correctamente')
            ->with('icono', 'success');
    }


    public function destroy($id)
    {
        AsignacionMateria::destroy($id);
        return redirect()->route('asignacionmaterias.index')
            ->with('mensaje', 'Se eliminó la asignacion de materias de  manera correcta')
            ->with('icono', 'success');
    }
}
