<?php

namespace App\Http\Controllers;

use App\Repository\PrmTipoCalificacionRepository;
use App\Repository\ClfCalificacionRepository;
use App\Services\PrmTipoCalificacionService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class PrmTipoCalificacionController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new PrmTipoCalificacionService(
            new PrmTipoCalificacionRepository(),
            new ClfCalificacionRepository()
        );
    }

    public function listar()
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id != 5 && Auth()->user()->tipe_id != 4) {
            try {
                $response->data =  $this->service->listar();
                $response->status = TRUE;
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al listar los parámetros';
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
                $responseService =  $this->service->habilitar($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al modificar el parámetro';
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
                $responseService =  $this->service->agregar($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al crear el parámetro';
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
                $response->message = 'Se produjo un error al eliminar el parámetro';
                http_response_code(400);
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }
}
