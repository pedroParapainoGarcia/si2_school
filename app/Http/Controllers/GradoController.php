<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('admin.grados.index', compact('niveles', 'grados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $niveles = Nivel::all();
        return view('admin.grados.create', compact('niveles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'curso' => 'required',
            'paralelo' => 'required',
            'nivel_id' => 'required'
        ]);

        $grado = new Grado();

        $grado->curso = $request->get('curso');
        $grado->paralelo = $request->get('paralelo');
        $grado->nivel_id = $request->get('nivel_id');
        $grado->save();

        return redirect()->route('grados.index')
            ->with('mensaje', 'Se registro el grado de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nivel = Nivel::all();
        $grado = Grado::findOrFail($id);
        return view('admin.grados.show', compact('nivel', 'grado'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grado = Grado::findOrFail($id);
        $niveles = Nivel::all();
        $nivel = [];
        foreach ($niveles as $nivelItem) {
            $nivel[$nivelItem->id] = $nivelItem->nivel . '-' . $nivelItem->turno;
        }
        return view('admin.grados.edit', compact('grado', 'nivel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'curso' => 'required',
            'paralelo' => 'required',
            'nivel_id' => 'required'
        ]);

        $input = $request->all();
        $grado = Grado::find($id);
        $grado->update($input);


        return redirect()->route('grados.index')
            ->with('mensaje', 'Se actualizó el grado correctamente')
            ->with('icono', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Grado::destroy($id);
        return redirect()->route('grados.index')
            ->with('mensaje', 'Se eliminó el aula de  manera correcta')
            ->with('icono', 'success');
    }
}
