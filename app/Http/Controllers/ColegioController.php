<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use Illuminate\Http\Request;
use App\Models\Persona;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class ColegioController extends Controller
{
     
    public function index()
    {
        $colegios = Colegio::all();

        return view('admin.colegios.index', compact('colegios'));
    }

     
    public function create()
    {
        return view('admin.colegios.create');
    }

     
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'codigo'=> 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'ubicacion' => 'required',
        ]);

        $colegio = new Colegio();
        $colegio->name = $request->name;
        $colegio->codigo = $request->codigo;
        $colegio->correo = $request->correo;
        $colegio->telefono = $request->telefono;
        $colegio->ubicacion = $request->ubicacion;
        $colegio->save();

        return redirect()->route('colegios.index')
            ->with('mensaje', 'Se registro al colegio de la manera correcta')
            ->with('icono', 'success');
    }

     
    public function show($id)
    {
        $colegio = Colegio::findOrFail($id);
        return view('admin.colegios.show', ['colegio' => $colegio]);
    }

     
    public function edit($id)
    {
        $colegio = Colegio::findOrFail($id);
        return view('admin.colegios.edit',compact('colegio'));
    }

     
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'codigo' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'ubicacion' => 'required',
        ]);


        $input = $request->all();
        $colegio = Colegio::find($id);
        $colegio->update($input);

        return redirect()->route('colegios.index')
            ->with('mensaje', 'Se actualizó datos del colegio de  manera correcta')
            ->with('icono', 'success');
    }


    
    public function destroy($id)
    {
        Colegio::destroy($id);
        return redirect()->route('colegios.index')
            ->with('mensaje', 'Se eliminó al colegio de la manera correcta')
            ->with('icono', 'success');
    }
}
