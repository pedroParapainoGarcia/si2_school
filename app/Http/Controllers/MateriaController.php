<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Materia;
use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();
        $materias = Materia::all();
        $usuarios = User::all();
        return view('admin.materias.index', compact('materias', 'docentes', 'usuarios'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        $docentes = Docente::all();
        return view('admin.materias.create', compact('docentes', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'docente_id' => 'required',
        ]);

        $materia = new Materia();

        $materia->name = $request->get('name');
        $materia->docente_id = $request->get('docente_id');
        $materia->save();

        return redirect()->route('materias.index')
            ->with('mensaje', 'Se registro la materia de manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $materia = Materia::findOrFail($id);
        $iduser = $materia->docente_id;
        $docente = Docente::findOrFail($iduser);
        return view('admin.materias.show', compact('docente', 'materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $materia = Materia::findOrFail($id);        
        $docentes = Docente::all();
        return view('admin.materias.edit', compact('materia', 'docentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'docente_id' => 'required',
        ]);

        $input = $request->all();
        $materia = Materia::find($id);
        $materia->update($input);


        return redirect()->route('materias.index')
            ->with('mensaje', 'Se actualizó la materia de manera correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Materia::destroy($id);
        return redirect()->route('materias.index')
            ->with('mensaje', 'Se eliminó la materia de  manera correcta')
            ->with('icono', 'success');
    }
}
