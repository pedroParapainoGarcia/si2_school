<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use Illuminate\Http\Request;

class DiaController extends Controller
{
    
    public function index()
    {
        $dias = Dia::all();

        return view('admin.dias.index', compact('dias'));
    }

    
    public function create()
    {
        return view('admin.dias.create');
    }

     
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',            
        ]);

        $dia = new Dia();
        $dia->nombre = $request->nombre;       
        $dia->save();

        return redirect()->route('dias.index')
            ->with('mensaje', 'Se registro el dia de manera correcta')
            ->with('icono', 'success');
    }

     
    public function show($id)
    {
        $dia = Dia::findOrFail($id);
        return view('admin.dias.show', ['dia' => $dia]);
    }

     
    public function edit($id)
    {
        $dia = Dia::findOrFail($id);
        return view('admin.dias.edit',compact('dia'));
    }

     
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' => 'required',             
        ]);

        $input = $request->all();
        $dia = Dia::find($id);
        $dia->update($input);

        return redirect()->route('dias.index')
            ->with('mensaje', 'Se actualizó datos del dia de  manera correcta')
            ->with('icono', 'success');
    }


    
    public function destroy($id)
    {
        Dia::destroy($id);
        return redirect()->route('dias.index')
            ->with('mensaje', 'Se eliminó el dia de manera correcta')
            ->with('icono', 'success');
    }
}
