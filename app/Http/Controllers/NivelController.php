<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        return view('admin.niveles.index', compact('gestiones', 'niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gestiones = Gestion::all();
        return view('admin.niveles.create', compact('gestiones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'nivel' => 'required',
            'turno' => 'required',
            'gestion_id' =>'required'
        ]);

        $nivel = new Nivel();

        $nivel->nivel = $request->get('nivel');
        $nivel->turno = $request->get('turno');
        $nivel->gestion_id = $request->get('gestion_id');
        $nivel->save();

        return redirect()->route('niveles.index')
            ->with('mensaje', 'Se registro el nivel de manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $gestion= Gestion::all();
        $nivel = Nivel::findOrFail($id);
        return view ('admin.niveles.show',compact('gestion','nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);
        $gestion =Gestion::pluck('nombreGestion','id')->all();
        return view ('admin.niveles.edit',compact('nivel','gestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'nivel' => 'required',
            'turno' => 'required',
            'gestion_id' =>'required'
        ]);
    
        $input= $request->all();
        $nivel=Nivel::find($id);
        $nivel->update($input);
       
    
        return redirect()->route('niveles.index')
            ->with('mensaje', 'Se actualizó el nivel correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Nivel::destroy($id);
        return redirect()->route('niveles.index')
            ->with('mensaje','Se eliminó el nivel de  manera correcta')
            ->with('icono','success');
    }
}
