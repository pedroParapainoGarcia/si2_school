<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function index()
    {
        $periodos = Periodo::all();

        return view('admin.periodos.index', compact('periodos'));
    }

    
    public function create()
    {
        return view('admin.periodos.create');
    }

     
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',            
        ]);

        $periodo = new Periodo();
        $periodo->nombre = $request->nombre;       
        $periodo->save();

        return redirect()->route('periodos.index')
            ->with('mensaje', 'Se registro el periodo de manera correcta')
            ->with('icono', 'success');
    }

     
    public function show($id)
    {
        $periodo = Periodo::findOrFail($id);
        return view('admin.periodos.show', ['periodo' => $periodo]);
    }

     
    public function edit($id)
    {
        $periodo = Periodo::findOrFail($id);
        return view('admin.periodos.edit',compact('periodo'));
    }

     
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' => 'required',             
        ]);

        $input = $request->all();
        $periodo = Periodo::find($id);
        $periodo->update($input);

        return redirect()->route('periodos.index')
            ->with('mensaje', 'Se actualizó datos del periodo de  manera correcta')
            ->with('icono', 'success');
    }


    
    public function destroy($id)
    {
        Periodo::destroy($id);
        return redirect()->route('periodos.index')
            ->with('mensaje', 'Se eliminó el periodo de manera correcta')
            ->with('icono', 'success');
    }
}
