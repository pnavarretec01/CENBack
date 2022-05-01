<?php

namespace App\Http\Controllers;

use App\Repository\RegionRepository;
use App\Services\RegionService;
use App\Utils\Helper;
use Exception;

class RegionController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new RegionService(new RegionRepository());
    }

    public function listarRegiones()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerRegiones();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las regiones';
        }
        Helper::jsonResponse($response);
    }

    public function listar()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerRegionesTabla();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar las regiones';
        }
        Helper::jsonResponse($response);
    }
}
