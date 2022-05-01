<?php

namespace App\Http\Controllers;

use App\Repository\ClfProductoRepository;
use App\Repository\UnidadNormalizadaRepository;
use App\Repository\EspecieNormalizadaRepository;
use App\Repository\TipoProductoRepository;
use App\Repository\TipoCombustibleRepository;
use App\Repository\PuntoVentaRepository;
use App\Services\ClfProductoService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class ClfProductoController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new ClfProductoService(
            new ClfProductoRepository(),
            new UnidadNormalizadaRepository(),
            new EspecieNormalizadaRepository(),
            new TipoProductoRepository(),
            new TipoCombustibleRepository(),
            new PuntoVentaRepository()
        );
    }

    public function listar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $response->data =  $this->service->obtenerProductosPorId($data);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los productos';
        }
        Helper::jsonResponse($response);
    }

    public function agregar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->agregar($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al agregar el producto';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function editar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->editar($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar el producto';
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
            $response->message = 'Se produjo un error al eliminar el producto';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitarProducto($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar el producto';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function habilitarStock(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitarStock($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar el producto';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }
}
