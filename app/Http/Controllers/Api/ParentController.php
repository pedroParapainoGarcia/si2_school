<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PadreDeFamilia;
use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function checkParent($ci)
    {
        // Obtener el padre de familia basado en CI
        $usuario = User::where('ci', $ci)->first();

        if ($usuario) {
            // Obtener los datos del usuario relacionado basado en CI
            $padre = PadreDeFamilia::where('id', $usuario->id)->first();

            // Combinar los datos del padre de familia y del usuario
            return response()->json([
                'exists' => true,
                'parent' => [
                    'id'=> $usuario->id,
                    'nombre' => $usuario->nombre,
                    'apellidoPaterno' => $usuario->apellidoPaterno,
                    'apellidoMaterno' => $usuario->apellidoMaterno,
                    'ci' => $usuario->ci,
                    'fechaNacimiento' => $usuario->fechaNacimiento,
                    'telefono' => $usuario->telefono,
                    'sexo' => $usuario->sexo,
                    'email' => $usuario->email,
                    'roles' => $usuario->roles, // Asumiendo que esto es un campo en la tabla Users
                    'ocupacionLaboral' => $padre->ocupacionLaboral,
                    'mayorGradoInstruccion' => $padre->mayorGradoInstruccion,
                    'tipo' => $padre->tipo,                    
                ]
            ]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}
