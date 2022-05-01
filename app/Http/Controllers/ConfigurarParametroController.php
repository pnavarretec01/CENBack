<?php

namespace App\Http\Controllers;

use App\Repository\EspecieNormalizadaRepository;
use App\Repository\UnidadNormalizadaRepository;
use App\Repository\TipoParametroRepository;
use App\Repository\ClfProductoRepository;
use App\Services\ConfigurarParametroService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class ConfigurarParametroController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new ConfigurarParametroService(
            new EspecieNormalizadaRepository(),
            new UnidadNormalizadaRepository(),
            new TipoParametroRepository(),
            new ClfProductoRepository(),
        );
    }

    public function configurarParametroGuardar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->configurarParametro($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al guardar la configuración de parámetro';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function editarParametroGuardar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->editarParametro($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al moficar la configuración de parámetro';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function listarParametros(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['params']['tico_id'];
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerParametros($id);
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los parametros';
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
            $response->message = 'Se produjo un error al eliminar el parámetro';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitarParametro($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar el parámetro';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }
}
