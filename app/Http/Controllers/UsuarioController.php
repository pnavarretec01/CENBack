<?php

namespace App\Http\Controllers;

use App\Repository\UsuarioRepository;
use App\Repository\ClfUsuarioDpaRepository;
use App\Services\UsuarioService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UsuarioDAO;

class UsuarioController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new UsuarioService(new UsuarioRepository(), new ClfUsuarioDpaRepository());
    }

    public function Inicio(Request $request)
    {
        $credentials = $request->only('usua_correo', 'password');
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            if (!$token = JWTAuth::attempt($credentials)) {
                $responseService =  $this->service->Login($data);

                return response()->json(['error' => $responseService['error']], 400);
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

    public function Login(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->Login($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $responseService['error'];
            $response->codigo = $responseService['error'];
            $response->message = 'Se produjo un error al obtener el usuarioooo';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function verificarCorreo(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->all();
            $responseService =  $this->service->verificarCorreo($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $responseService['error'];
            $response->codigo = $responseService['error'];
            $response->message = 'Se produjo un error al obtener el usuario';
            http_response_code(400);
        }
        Helper::jsonResponse($response);
    }

    public function recuperarContrasena(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->recuperarContraseña($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al obtener el usuario';
            http_response_code(400);
        }
        Helper::jsonResponse($response);
    }

    public function setCodigo(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->all();
            $responseService =  $this->service->recuperarContraseña($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al obtener el código';
            http_response_code(400);
        }
        Helper::jsonResponse($response);
    }

    public function setContrasenaNueva(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->all();
            $responseService =  $this->service->guardarContrasenaNueva($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al guardar la contraseña';
            http_response_code(400);
        }
        Helper::jsonResponse($response);
    }

    public function validarCodigo(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->validarCodigo($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'El código no es válido';
            http_response_code(400);
        }
        Helper::jsonResponse($response);
    }

    public function validarToken(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->validarToken($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'El token no es válido';
        }
        http_response_code(200);
        Helper::jsonResponse($response);
    }

    public function listarUsuarios()
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id != 5 && Auth()->user()->tipe_id != 4) {
            try {
                $responseService =  $this->service->listarUsuarios();
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al listar los usuarios';
                http_response_code(400);
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id != 5 && Auth()->user()->tipe_id != 4) {
            try {
                $data = $request->json()->all();
                $responseService =  $this->service->habilitarUsuario($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al modificar el usuario';
                http_response_code(400);
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }

    public function agregar(Request $request)
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id != 5 && Auth()->user()->tipe_id != 4) {
            try {
                $data = $request->json()->all();
                $responseService =  $this->service->agregarUsuario($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al agregar el usuario';
                http_response_code(400);
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }

    public function editar(Request $request)
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id != 5 && Auth()->user()->tipe_id != 4) {
            try {
                $data = $request->json()->all();
                $responseService =  $this->service->editarUsuario($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al editar el usuario';
                http_response_code(400);
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }

    public function eliminar(Request $request)
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id != 5 && Auth()->user()->tipe_id != 4) {
            try {
                $data = $request->json()->all();
                $responseService =  $this->service->eliminar($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al eliminar el usuario';
                http_response_code(400);
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Ha cerrado sesión exitosamente']);
    }

    public function me()
    {
        return Auth::check();
    }

    public function refreshToken()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
