<?php

namespace App\Http\Controllers;

use App\Repository\TipoDistribucionRepository;
use App\Services\TipoDistribucionService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class TipoDistribucionController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new TipoDistribucionService(new TipoDistribucionRepository());
    }

    public function listarTipoDistribucion()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerTipoDistribucion();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los tipos de distribución';
        }
        Helper::jsonResponse($response);
    }

}
