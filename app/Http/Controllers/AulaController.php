<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Colegio;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colegios = Colegio::all();
        $aulas = Aula::all();
        return view('admin.aulas.index', compact('colegios', 'aulas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colegios = Colegio::all();
        return view('admin.aulas.create', compact('colegios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'numero' => 'required',  
            'tipo' => 'required', 
            'capacidad' => 'required',          
            'colegio_id' => 'required'
        ]);

        $aula = new Aula();

        $aula->numero = $request->get('numero');  
        $aula->tipo = $request->get('tipo');   
        $aula->capacidad = $request->get('capacidad');      
        $aula->colegio_id = $request->get('colegio_id');
        $aula->save();

        return redirect()->route('aulas.index')
            ->with('mensaje', 'Se registro el aula de manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $colegio = Colegio::all();
        $aula = Aula::findOrFail($id);
        return view('admin.aulas.show', compact('colegio', 'aula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aula = Aula::findOrFail($id);
        $colegios = Colegio::all();
        $colegio = [];
        foreach ($colegios as $colegioItem) { 
            $colegio[$colegioItem->id] = $colegioItem->name;
        }
        
        return view('admin.aulas.edit', compact('aula', 'colegio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'numero' => 'required',  
            'tipo' => 'required', 
            'capacidad' => 'required',          
            'colegio_id' => 'required'
        ]);

        $input = $request->all();
        $aula = Aula::find($id);
        $aula->update($input);


        return redirect()->route('aulas.index')
            ->with('mensaje', 'Se actualizó el aula correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Aula::destroy($id);
        return redirect()->route('aulas.index')
            ->with('mensaje', 'Se eliminó el aula de  manera correcta')
            ->with('icono', 'success');
    }
}
