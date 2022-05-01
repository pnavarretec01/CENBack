<?php

namespace App\Http\Controllers;

use App\Repository\TipoProductoRepository;
use App\Services\TipoProductoService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new TipoProductoService(new TipoProductoRepository());
    }

    public function listarTipoProducto(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $response->data =  $this->service->obtenerTipoProducto($id);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los tipos de productos';
        }
        Helper::jsonResponse($response);
    }

}
