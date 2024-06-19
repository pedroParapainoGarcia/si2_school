<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:docentes.index')->only('index');
    }

    public function index()
    {
        $usuarios = User::all();         
        $docentes = Docente::all();

        return view('admin.docentes.index', compact('usuarios','docentes'));
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
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
