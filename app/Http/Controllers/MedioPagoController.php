<?php

namespace App\Http\Controllers;

use App\Repository\MedioPagoRepository;
use App\Services\MedioPagoService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class MedioPagoController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new MedioPagoService(new MedioPagoRepository());
    }

    public function listarMedioPago()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerMedioPago();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los medios de pago';
        }
        Helper::jsonResponse($response);
    }

}
