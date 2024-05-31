<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function mostrar_usuarios()
    {
        $usuarios = User::all();
        return json_encode($usuarios);
        
    }

    public function mostrar_un_usuario($user_id)
    {
        $usuario = User::where('id', '=', $user_id)->first();
        return json_encode($usuario);
    }

    public function mostrar_un_usuario2(Request $request)
    {
        $usuario = User::find($request->user_id);
        return json_encode($usuario);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',

        ]);
        $usuario = new User();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->save();

        $mensaje="Usuario creado correctamente";
        return json_encode($mensaje);
    }
}
