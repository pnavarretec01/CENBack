<?php

namespace App\Http\Controllers;

use App\Repository\ClfCalificacionRepository;
use App\Repository\TipoCombustibleRepository;
use App\Repository\PuntoVentaRepository;
use App\Repository\ClfUsuarioDpaRepository;
use App\Services\ClfCalificacionService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class ClfCalificacionController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new ClfCalificacionService(
            new ClfCalificacionRepository(),
            new PuntoVentaRepository(),
            new TipoCombustibleRepository(),
            new ClfUsuarioDpaRepository(),
        );
    }

    public function listar()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->listar();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las calificaciones';
        }
        Helper::jsonResponse($response);
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitar($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar la calificación';
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
            $response->message = 'Se produjo un error al eliminar la calificación';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }
}
