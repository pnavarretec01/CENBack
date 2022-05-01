<?php

namespace App\Http\Controllers;

use App\Repository\EspecieNormalizadaRepository;
use App\Services\EspecieNormalizadaService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class EspecieNormalizadaController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new EspecieNormalizadaService(new EspecieNormalizadaRepository());
    }

    public function listar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $response->data =  $this->service->obtenerEspecieNormalizada($id);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las Especies normalizadas';
        }
        Helper::jsonResponse($response);
    }

    public function listarActivo(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $response->data =  $this->service->obtenerEspecieNormalizadaActiva($id);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las Especies normalizadas';
        }
        Helper::jsonResponse($response);
    }

}
