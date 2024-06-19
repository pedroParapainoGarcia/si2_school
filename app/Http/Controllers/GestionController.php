<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:gestiones.index')->only('index','show');
        $this->middleware('can:gestiones.create')->only('create', 'store');
        $this->middleware('can:gestiones.edit')->only('edit', 'update');
        $this->middleware('can:gestiones.destroy')->only('destroy');
    }
    
    public function index()
    {
        $gestiones = Gestion::all();

        return view('admin.gestiones.index', compact('gestiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.gestiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreGestion' => 'required',
            'estado' => 'required',
        ]);

        // Obtener el valor de estado y convertirlo a entero
        $estado = $request->estado == '1' ? 1 : 0;


        // Captura la fecha y hora actual del servidor
        $fechaHoraCreacion = Carbon::now()->format('Y-m-d H:i:s');
        $gestion = new Gestion();
        $gestion->nombreGestion = $request->nombreGestion;
        $gestion->fechaHoraCreacion = $fechaHoraCreacion;
        $gestion->estado = $estado;
        $gestion->save();

        return redirect()->route('gestiones.index')
            ->with('mensaje', 'Se registro la gestion de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gestion = Gestion::findOrFail($id);
        return view('admin.gestiones.show', ['gestion' => $gestion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gestion = Gestion::findOrFail($id);
        return view('admin.gestiones.edit', compact('gestion'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreGestion' => 'required',
            'estado' => 'required',
        ]);

        $input = $request->all();
        $gestion = Gestion::find($id);
        $gestion->update($input);

        return redirect()->route('gestiones.index')
            ->with('mensaje', 'Se actualizó datos de la gestion de  manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gestion::destroy($id);
        return redirect()->route('gestiones.index')
            ->with('mensaje', 'Se eliminó la gestion de la manera correcta')
            ->with('icono', 'success');
    }
}
