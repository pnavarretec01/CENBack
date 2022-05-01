<?php

namespace App\Http\Controllers;

use App\Repository\TipoPerfilRepository;
use App\Services\TipoPerfilService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class TipoPerfilController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new TipoPerfilService(new TipoPerfilRepository());
    }

    public function listar()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerTipoPerfil();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los Tipos de Perfil';
        }
        Helper::jsonResponse($response);
    }
}
