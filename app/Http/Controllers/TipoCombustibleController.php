<?php

namespace App\Http\Controllers;

use App\Repository\TipoCombustibleRepository;
use App\Services\TipoCombustibleService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class TipoCombustibleController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new TipoCombustibleService(new TipoCombustibleRepository());
    }

    public function listarCombustibles()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerCombustibles();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los combustibles';
        }
        Helper::jsonResponse($response);
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitarCombustible($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar el combustible';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }
}
