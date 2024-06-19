<?php

namespace App\Http\Controllers;

use App\Models\PadreDeFamilia;
use App\Models\User;
use Illuminate\Http\Request;

class PadreDeFamiliaController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:tutores.index')->only('index');
    }

    public function index()
    {
        $usuarios = User::all();
        $tutores = PadreDeFamilia::all();

        return view('admin.tutores.index', compact('usuarios', 'tutores'));
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
    public function show(PadreDeFamilia $padreDeFamilia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PadreDeFamilia $padreDeFamilia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PadreDeFamilia $padreDeFamilia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PadreDeFamilia $padreDeFamilia)
    {
        //
    }
}
