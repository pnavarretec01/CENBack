<?php

namespace App\Http\Controllers;

use App\Repository\UnidadNormalizadaRepository;
use App\Services\UnidadNormalizadaService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class UnidadNormalizadaController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new UnidadNormalizadaService(new UnidadNormalizadaRepository());
    }

    public function listar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $response->data =  $this->service->obtenerUnidadNormalizada($id);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las unidades normalizadas';
        }
        Helper::jsonResponse($response);
    }

    public function listarActivo(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $response->data =  $this->service->obtenerUnidadNormalizadaActiva($id);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las unidades normalizadas';
        }
        Helper::jsonResponse($response);
    }

}
