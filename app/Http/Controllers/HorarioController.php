<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMateria;
use App\Models\Aula;
use App\Models\Dia;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Intervalo;
use App\Models\Materia;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;

class HorarioController extends Controller
{

    public function index()
    {
        $dias = Dia::all();
        $periodos = Periodo::all();
        $intervalos = Intervalo::all();
        $aulas = Aula::all();
        $paralelos = Paralelo::all();
        $usuarios = User::all();
        $asignacionmaterias = AsignacionMateria::all();
        $docentes=Docente::all();
        $materias=Materia::all();
        $horarios=Horario::all();

        return view('admin.horarios.index', compact('horarios', 'dias', 'periodos', 'intervalos', 'aulas', 'paralelos', 'usuarios','asignacionmaterias','docentes','materias'));
    }


    public function create()
    {

        $horarios = Horario::all();
        $asignaciones = AsignacionMateria::with(['materia', 'docente.usuario'])->get();
        $dias = Dia::all();
        $periodos = Periodo::all();
        $intervalos = Intervalo::all();
        $aulas = Aula::all();
        $paralelos = Paralelo::all();
        $usuarios = User::all();
        $docentes = Docente::all();
        return view('admin.horarios.create', compact('docentes', 'usuarios', 'horarios', 'asignaciones', 'dias', 'periodos', 'intervalos', 'aulas', 'paralelos'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'turno' => 'required',
            'dia_id' => 'required',
            'periodo_id' => 'required',
            'intervalo_id' => 'required',
            'aula_id' => 'required',
            'paralelo_id' => 'required',
            'docentemateria_id' => 'required',

        ]);

        $horario = new Horario();

        $horario->turno = $request->get('turno');
        $horario->dia_id = $request->get('dia_id');
        $horario->periodo_id = $request->get('periodo_id');
        $horario->intervalo_id = $request->get('intervalo_id');
        $horario->aula_id = $request->get('aula_id');
        $horario->paralelo_id = $request->get('paralelo_id');
        $horario->docentemateria_id = $request->get('docentemateria_id');
        $horario->save();

        return redirect()->route('horarios.index')
            ->with('mensaje', 'Se registro el horario de manera correcta')
            ->with('icono', 'success');
    }


    public function show($id)
    {                      
        $dias = Dia::all();
        $periodos = Periodo::all();
        $intervalos = Intervalo::all();
        $aulas = Aula::all();
        $paralelos = Paralelo::all();
        $horario = Horario::findOrFail($id);
        $asignacion = $horario->docentemateria_id;   
        $asignaciondematerias=AsignacionMateria::findOrFail($asignacion);
        $iduser = $asignaciondematerias->docente_id;
        $idmateria = $asignaciondematerias->materia_id;

        $docente = Docente::findOrFail( $iduser);
        $materia = Materia::findOrFail($idmateria);

        return view('admin.horarios.show', compact('horario','docente','materia', 'dias','periodos','intervalos','aulas','paralelos' ));
    }



    public function edit($id) 
    {
        $horario = Horario::findOrFail($id);

        $dias = Dia::all();
        $dia = [];
        foreach ($dias as $diaItem) { 
            $dia[$diaItem->id] = $diaItem->nombre;
        }

        $periodos = Periodo::all();
        $periodo = [];
        foreach ($periodos as $periodoItem) { 
            $periodo[$periodoItem->id] = $periodoItem->nombre;
        }

        $intervalos = Intervalo::all();
        $intervalo = [];
        foreach ($intervalos as $intervaloItem) { 
            $intervalo[$intervaloItem->id] = $intervaloItem->horaInicio.'-'.$intervaloItem->horaFin;
        }

        $aulas = Aula::all();
        $aula = [];
        foreach ($aulas as $aulaItem) { 
            $aula[$aulaItem->id] = $aulaItem->tipo.'-'.$aulaItem->numero;
        }

        $paralelos = Paralelo::all();
        $paralelo = [];
        foreach ($paralelos as $paraleloItem) { 
            $paralelo[$paraleloItem->id] = $paraleloItem->nombre;
        }

        $asignacionmaterias = AsignacionMateria::with(['materia', 'docente.usuario'])->get();
        


        $docentes=Docente::all();
        $usuario=User::all();
        return view('admin.horarios.edit', compact('horario', 'dia', 'periodo', 'intervalo', 'aula', 'paralelo', 'docentes', 'usuario', 'asignacionmaterias'));
    }


    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'turno' => 'required',
            'dia_id' => 'required',
            'periodo_id' => 'required',
            'intervalo_id' => 'required',
            'aula_id' => 'required',
            'paralelo_id' => 'required',
            'docentemateria_id' => 'required',

        ]);

        $input = $request->all();
        $horario = Horario::find($id);
        $horario->update($input);


        return redirect()->route('horarios.index')
            ->with('mensaje', 'Se actualizó el horario correctamente')
            ->with('icono', 'success');
    }

    
    public function destroy($id)
    {
        Horario::destroy($id);
        return redirect()->route('horarios.index')
            ->with('mensaje', 'Se eliminó el horario de  manera correcta')
            ->with('icono', 'success');
    }
}
