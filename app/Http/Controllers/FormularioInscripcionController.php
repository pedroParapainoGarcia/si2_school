<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioInscripcionController extends Controller
{
    public function index()
    {
         
        return view('admin.inscripciones.index');
    }
}
