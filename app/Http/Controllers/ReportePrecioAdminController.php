<?php

namespace App\Http\Controllers;

use App\Repository\ReportePrecioAdminRepository;
use App\Services\ReportePrecioAdminService;
use App\Utils\Helper;
use Exception;
use Illuminate\Http\Request;

class ReportePrecioAdminController extends Controller
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->service = new ReportePrecioAdminService(new ReportePrecioAdminRepository());
    }

    public function listarReportes()
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id === 1 || Auth()->user()->tipe_id === 6) {
            try {
                $response->data =  $this->service->obtenerReportes();
                $response->status = TRUE;
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al listar los Reportes';
            }
            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        if (Auth()->user()->tipe_id === 1 || Auth()->user()->tipe_id === 6) {
            try {
                $data = $request->json()->all();
                $responseService =  $this->service->habilitarReporte($data);
                $response->data = $responseService['data'];
                $response->status = $responseService['status'];
                http_response_code(200);
            } catch (Exception $e) {
                $response->error = $e->getMessage();
                $response->codigo = $e->getCode();
                $response->message = 'Se produjo un error al modificar el Reporte';
                http_response_code(400);
            }

            Helper::jsonResponse($response);
        } else {
            $response->error = 'No tiene permisos para acceder a esta ruta';
            http_response_code(400);
            Helper::jsonResponse($response);
        }
    }
}
