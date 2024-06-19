<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\PadreDeFamilia;
use App\Models\TutorEstudiante;
use App\Models\User;
use Illuminate\Http\Request;

class TutorEstudianteController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:tutorestudiantes.index')->only('index');
    }

    public function index()
    {
        $usuarios = User::all();
        $estudiantes=Estudiante::all();
        $tutores=PadreDeFamilia::all();
        $tutorestudiantes = TutorEstudiante::all();

        return view('admin.tutorestudiantes.index', compact('usuarios','estudiantes','tutores','tutorestudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TutorEstudiante $tutorEstudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TutorEstudiante $tutorEstudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TutorEstudiante $tutorEstudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TutorEstudiante $tutorEstudiante)
    {
        //
    }
}
