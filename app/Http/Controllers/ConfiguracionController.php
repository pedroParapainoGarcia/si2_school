<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{

    public function _construct()
    {

        $this->middleware('can:configuraciones.index')->only('index');
    }
    
    public function index()
    {

        return view('admin.configuraciones.index');
    }
}
