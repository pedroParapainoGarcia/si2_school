<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Gestion;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
   
    public function index()
    {
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $colegios = Colegio::all();
        return view('admin.niveles.index', compact('gestiones', 'niveles','colegios'));
    }

    
    public function create()
    {
        $gestiones = Gestion::all();
        $colegios = Colegio::all();
        return view('admin.niveles.create', compact('gestiones','colegios'));
    }

    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombre' => 'required',            
            'gestion_id' =>'required',
            'colegio_id'=>'required',
        ]);

        $nivel = new Nivel();

        $nivel->nombre = $request->get('nombre');       
        $nivel->gestion_id = $request->get('gestion_id');
        $nivel->colegio_id = $request->get('colegio_id');
        $nivel->save();

        return redirect()->route('niveles.index')
            ->with('mensaje', 'Se registro el nivel de manera correcta')
            ->with('icono', 'success');
    }

   
    public function show($id)
    {  
        $gestiones= Gestion::all();
        $nivel = Nivel::findOrFail($id);
        $colegio=Colegio::all();
        return view ('admin.niveles.show',compact('gestiones','nivel','colegio'));
        //return view('admin.materias.show', compact('materia'));
    }

    
    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);
        $gestion =Gestion::pluck('nombreGestion','id')->all();
        return view ('admin.niveles.edit',compact('nivel','gestion'));
    }

    
    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'nombre' => 'required',            
            'gestion_id' =>'required',
            'colegio_id'=>'required',
        ]);
    
        $input= $request->all();
        $nivel=Nivel::find($id);
        $nivel->update($input);
       
    
        return redirect()->route('niveles.index')
            ->with('mensaje', 'Se actualizó el nivel correctamente')
            ->with('icono', 'success');
    }

    
    public function destroy($id)
    {
        Nivel::destroy($id);
        return redirect()->route('niveles.index')
            ->with('mensaje','Se eliminó el nivel de  manera correcta')
            ->with('icono','success');
    }
}
