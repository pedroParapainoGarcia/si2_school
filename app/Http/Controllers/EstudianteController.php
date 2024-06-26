<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:estudiantes.index')->only('index');
    }

    public function index()
    {
        $usuarios = User::all();
        $niveles = Nivel::all();
        $paralelos = Paralelo::all();
        $estudiantes = Estudiante::all();

        return view('admin.estudiantes.index', compact('usuarios','niveles','paralelos','estudiantes'));
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
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
