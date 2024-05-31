<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ParentController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/usuarios/mostrar/todos', [ApiController::class, 'mostrar_usuarios']);
Route::get('/usuarios/mostrar/id={user_id}', [ApiController::class, 'mostrar_un_usuario']);
Route::post('/usuarios/mostrar2', [ApiController::class, 'mostrar_un_usuario2']);
Route::post('/usuarios/crear', [ApiController::class, 'crear']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) { //devuelve el usuario dueño del token
    return $request->user();

    
});

// Route::post('/sanctum/token', [AuthController::class, 'generateToken']);
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'Tokens eliminados';
});



Route::get('/check-parent/{ci}', [ParentController::class, 'checkParent']);

Route::post('login', [AuthController::class, 'login']); //genero el token y datos del usuario



Route::middleware('auth:sanctum')->group(function () {

    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('/check-status', [AuthController::class, 'checkStatus'])->middleware('auth:sanctum');
