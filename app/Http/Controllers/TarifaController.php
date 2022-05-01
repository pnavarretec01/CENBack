<?php

namespace App\Http\Controllers;

use App\Repository\TarifaElectricaRepository;
use App\Services\TarifaElectricaService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class TarifaController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new TarifaElectricaService(new TarifaElectricaRepository());
    }

    public function listarTarifas()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerPuntosVentas();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las tarifas';
        }
        Helper::jsonResponse($response);
    }

    public function nuevaTarifa(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->agregarTarifa($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al guardar la tarifa';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitarTarifa($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar la tarifa';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function editar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->editarTarifa($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar la tarifa';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function eliminar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->eliminar($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al eliminar la tarifa';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }
}
