<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Materia;
use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Http\Request;

class MateriaController extends Controller
{

    public function _construct()
    {

        $this->middleware('can:materias.index')->only('index','show');
        $this->middleware('can:materias.create')->only('create', 'store');
        $this->middleware('can:materias.edit')->only('edit', 'update');
        $this->middleware('can:materias.destroy')->only('destroy');
    }
    
    public function index()
    {
         
        $materias = Materia::all();
        
        return view('admin.materias.index', compact('materias'));
    }
 
    public function create()
    {
         
        return view('admin.materias.create');
    }

     
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',             
        ]);

        $materia = new Materia();

        $materia->name = $request->get('name');        
        $materia->save();

        return redirect()->route('materias.index')
            ->with('mensaje', 'Se registro la materia de manera correcta')
            ->with('icono', 'success');
    }

    
    public function show($id)
    {

        $materia = Materia::findOrFail($id);
         
        return view('admin.materias.show', compact('materia'));
    }
 
    public function edit($id)
    {
        $materia = Materia::findOrFail($id);        
        
        return view('admin.materias.edit', compact('materia'));
    }

     
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
             
        ]);

        $input = $request->all();
        $materia = Materia::find($id);
        $materia->update($input);


        return redirect()->route('materias.index')
            ->with('mensaje', 'Se actualizó la materia de manera correctamente')
            ->with('icono', 'success');
    }

     
    public function destroy($id)
    {
        Materia::destroy($id);
        return redirect()->route('materias.index')
            ->with('mensaje', 'Se eliminó la materia de  manera correcta')
            ->with('icono', 'success');
    }
}
