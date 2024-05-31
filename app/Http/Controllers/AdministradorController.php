<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Colegio;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          
        $usuarios = User::all();
        $colegios=Colegio::all();
        $administradores = Administrador::all();

        return view('admin.administradors.index', compact('usuarios','colegios','administradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        // $persona = new Persona();
        // $usuario = new User();
        // $colegio = Colegio::pluck('name', 'name')->all();
        // return view('admin.administradors.crear', compact('roles', 'persona', 'usuario', 'colegio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //     $request->validate([
    //         'name' => 'required|max:100',
    //         'apellido_paterno' => 'required',
    //         'apellido_materno' => 'required',
    //         'sexo' => 'required',
    //         'telefono' => 'required',
    //         'tipo' => 'required',
    //     ]);

    //     $persona = new Persona();
    //     $persona->name=$request->name;
    //     $persona->apellido_paterno=$request->apellido_paterno;
    //     $persona->apellido_materno=$request->apellido_materno;
    //     $persona->sexo=$request->sexo;
    //     $persona->telefono=$request->telefono;
    //     $persona->tipo=$request->tipo;
    //     $persona->save();

    //    $request->validate([        
            
    //         'cargo' => 'required',
    //         'id_colegio' =>'required',
    //     ]);
        
    //     $administrador=new Administrador();
    //     $administrador->id=$persona->id; 
    //     $administrador->cargo = $request->cargo;  
    //     $administrador->id_colegio = $request->id_colegio;
    //     $administrador->save();


    //     $request->validate([          
    //         'email' => 'required|unique:users',
    //         'password' => 'required|confirmed',
    //         'roles'=>'required',
    //     ]);

    //     $usuario = new User();        
    //     $usuario->email = $request->email;
    //     $usuario->password = Hash::make($request['password']);
    //     $usuario->id_persona= $persona->id;
    //     $usuario->assignRole('Administrador');
    //     $usuario->save();

    //     return redirect()->route('administradors.index')
    //         ->with('mensaje', 'Se registro al administrador de manera correcta')
    //         ->with('icono', 'success');
        
         
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
