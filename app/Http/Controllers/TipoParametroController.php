<?php

namespace App\Http\Controllers;

use App\Repository\TipoParametroRepository;
use App\Services\TipoParametroService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoParametroController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new TipoParametroService(new TipoParametroRepository());
    }

    public function listarTipoParametro()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerTipoParametro();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los tipos de parámetros';
        }
        Helper::jsonResponse($response);
    }

}
