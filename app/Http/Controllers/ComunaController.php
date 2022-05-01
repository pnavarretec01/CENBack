<?php

namespace App\Http\Controllers;

use App\Repository\ComunaRepository;
use App\Services\ComunaService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class ComunaController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new ComunaService(new ComunaRepository());
    }

    public function listarComunas()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerComunas();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las comunas';
        }
        Helper::jsonResponse($response);
    }

    public function obtenerComunaConRegion()
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id === 1) {
            try {
                $response->data =  $this->service->obtenerComunaConRegion();
                $response->status = TRUE;
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al listar las comunas';
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
        if (Auth()->user()->tipe_id === 1) {
            try {
                $data = $request->json()->all();
                $responseService =  $this->service->habilitarComuna($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al modificar la comuna';
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
