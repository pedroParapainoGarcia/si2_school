<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use validator;
use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function generateToken(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas.',
                'errors' => [
                    'email' => ['Datos Incorrectos.'],
                ]
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'statusCode' => 401,
                'message' =>  'Credentials are not valid (password)',
                'error' =>  'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        $role = $user->roles->first()->name;

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'fullName' => $user->nombre,
            'roles' => [
                $role
            ],
            'token' => $token,
        ]);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ['message' => 'You hace successfully logged out and the token was successfully deleted'];
    }

    public function checkStatus(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $role = $user->roles->first()->name;

            return response()->json([
                'id' => $user->id,
                'email' => $user->email,
                'fullName' => $user->nombre,
                'roles' => [
                    $role
                ],
                'token' => $request->bearerToken(),
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
