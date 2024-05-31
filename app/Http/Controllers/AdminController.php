<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Colegio;
use App\Models\GradoEscolaridad;
use App\Models\Horario;
use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $roles=Role::all();        
        return view('admin.index', compact('usuarios','roles'));
    }
}
