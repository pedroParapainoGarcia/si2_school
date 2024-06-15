<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Horario;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ParaleloController extends Controller
{

    public function index()
    {
        $paralelos = Paralelo::all();
        $grados = Grado::all();
        $docentes = Docente::all();
        return view('admin.paralelos.index', compact('paralelos', 'grados', 'docentes'));
    }


    public function create()
    {
        $grados = Grado::all();
        $usuarios = User::all();
        $docentes = Docente::all();
        return view('admin.paralelos.create', compact('grados', 'docentes', 'usuarios'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'cupo' => 'required',
            'grado_id' => 'required',
            'docente_id' => 'required',
        ]);

        $paralelo = new Paralelo();

        $paralelo->nombre = $request->get('nombre');
        $paralelo->cupo = $request->get('cupo');
        $paralelo->grado_id = $request->get('grado_id');
        $paralelo->docente_id = $request->get('docente_id');
        $paralelo->save();

        return redirect()->route('paralelos.index')
            ->with('mensaje', 'Se registro el paralelo de manera correcta')
            ->with('icono', 'success');
    }


    public function show($id)
    {


        $grado = Grado::all();
        $paralelo = Paralelo::findOrFail($id);
        $iduser = $paralelo->docente_id;
        $docente = Docente::findOrFail($iduser);
        $horario = Horario::all();
        return view('admin.paralelos.show', compact('docente', 'grado', 'paralelo', 'horario'));
    }



    public function edit($id)
    {
        $paralelo = Paralelo::findOrFail($id);
        $grados = Grado::all();
        $grado = [];
        foreach ($grados as $gradoItem) {
            $grado[$gradoItem->id] = $gradoItem->grado;
        }
        $docentes = Docente::all();
        $usuario = User::all();
        return view('admin.paralelos.edit', compact('paralelo', 'grado', 'docentes', 'usuario'));
    }



    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'cupo' => 'required',
            'grado_id' => 'required',
            'docente_id' => 'required',
        ]);

        $input = $request->all();
        $paralelo = Paralelo::find($id);
        $paralelo->update($input);


        return redirect()->route('paralelos.index')
            ->with('mensaje', 'Se actualizó el paralelo correctamente')
            ->with('icono', 'success');
    }


    public function destroy($id)
    {
        Paralelo::destroy($id);
        return redirect()->route('paralelos.index')
            ->with('mensaje', 'Se eliminó el paralelo de  manera correcta')
            ->with('icono', 'success');
    }

    public function generatePDF($paralelo_id){
   
    $paralelo = Paralelo::with(['estudiante.usuario', 'grado.nivel.gestion', 'grado.nivel.colegio', 'docente.usuario'])->findOrFail($paralelo_id);
    $pdf = Pdf::loadView('admin.paralelos.report', compact('paralelo'));
    // Descargar el PDF con el nombre especificado
    return $pdf->stream('reporte_paralelo_' . $paralelo->nombre . '.pdf');
}

}
