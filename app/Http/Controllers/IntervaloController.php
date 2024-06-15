<?php

namespace App\Http\Controllers;

use App\Models\Intervalo;
use Illuminate\Http\Request;

class IntervaloController extends Controller
{
    public function index()
    {
        $intervalos = Intervalo::all();

        return view('admin.intervalos.index', compact('intervalos'));
    }

    
    public function create()
    {
        return view('admin.intervalos.create');
    }

     
    public function store(Request $request)
    {
        $request->validate([
            'horaInicio' => 'required',
            'horaFin' => 'required',

        ]);

        $intervalo = new Intervalo();
        $intervalo->horaInicio = $request->horaInicio; 
        $intervalo->horaFin = $request->horaFin;      
        $intervalo->save();

        return redirect()->route('intervalos.index')
            ->with('mensaje', 'Se registro el intervalo de manera correcta')
            ->with('icono', 'success');
    }

     
    public function show($id)
    {
        $intervalo = Intervalo::findOrFail($id);
        return view('admin.intervalos.show', ['intervalo' => $intervalo]);
    }

     
    public function edit($id)
    {
        $intervalo = Intervalo::findOrFail($id);
        return view('admin.intervalos.edit',compact('intervalo'));
    }

     
    public function update(Request $request, $id)
    {
        $request->validate([
            'horaInicio' => 'required',
            'horaFin' => 'required',

        ]);

        $input = $request->all();
        $intervalo = Intervalo::find($id);
        $intervalo->update($input);

        return redirect()->route('intervalos.index')
            ->with('mensaje', 'Se actualizó datos del intervalo de  manera correcta')
            ->with('icono', 'success');
    }


    
    public function destroy($id)
    {
        Intervalo::destroy($id);
        return redirect()->route('intervalos.index')
            ->with('mensaje', 'Se eliminó el intervalo de manera correcta')
            ->with('icono', 'success');
    }
}
