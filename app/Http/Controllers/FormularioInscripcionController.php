<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioInscripcionController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:inscripciones.index')->only('index');
    }

    public function index()
    {
         
        return view('admin.inscripciones.index');
    }
}
