<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\UsuarioDAO;

class ApiAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     *
     */
    public function login(Request $request)
    {
        $credentials = $request->only('usua_correo', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json([
            'token' => $token,
            'tipo_token' => 'bearer',
            'expira' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        //Request is valid, create new user
        $user = UsuarioDAO::create([
            'usua_id' => 2,
            'usua_nombre' => $request->name,
            'usua_correo' => $request->email,
            'usua_clave' => bcrypt($request->password),
            'usua_telefono' => 12345678,
            'tipe_id' => 1,
            'usua_intento_login' => 0,
            'usua_ind_act' => 0,
            'usua_bloqueado' => 0
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Ha cerrado sesión exitosamente']);
    }
}
