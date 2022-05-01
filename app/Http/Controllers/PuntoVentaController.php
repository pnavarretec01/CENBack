<?php

namespace App\Http\Controllers;

use App\Repository\PuntoVentaRepository;
use App\Repository\HorarioRepository;
use App\Repository\ClfMedioPagoRepository;
use App\Repository\ClfDistribucionRepository;
use App\Repository\ClfProductoRepository;
use App\Repository\ClfCalificacionRepository;
use App\Repository\ClfUsuarioDpaRepository;
use App\Repository\ComunaRepository;
use App\Services\PuntoVentaService;
use App\Utils\Helper;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PuntoVentaController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PuntoVentaService(
            new PuntoVentaRepository(),
            new HorarioRepository(),
            new ClfMedioPagoRepository(),
            new ClfDistribucionRepository(),
            new ClfProductoRepository(),
            new ClfCalificacionRepository(),
            new ClfUsuarioDpaRepository(),
            new ComunaRepository(),
        );
    }

    public function listarPuntosVentas()
    {
        $response = Helper::createStdResponse();
        try {
            $response->data =  $this->service->obtenerPuntosVentas();
            $response->status = TRUE;
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al listar los puntos de ventas';
        }
        Helper::jsonResponse($response);
    }

    public function listarPuntoVentaPorId(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $responseService =  $this->service->obtenerPuntosVentasPorId($id);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al obtener el punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function listarPuntoVentaPorIdUsuario(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $id = $data['tico_id'];
            $usuario = Auth()->user()->usua_id;
            $responseService =  $this->service->obtenerPuntosVentasPorIdUsuario($id, $usuario);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al obtener el punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function guardarPuntoVenta(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->guardarPuntoVenta($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            //dd($e);
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al guardar el punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function guardarImagenPuntoVenta(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $ptv_id = $request->all()['idPtv'];
            $file = $request->file('attachment');
            $nombre = time() . "_" . $file->getClientOriginalName();
            $URL = config('app.url');
            $path = Storage::putFileAs('public/ImagenesPuntosDeVenta', $file, $nombre);
            $descomp = explode("/", $path);
            array_splice($descomp, 0, 2);
            $urlImagen = $URL . '/storage/ImagenesPuntosDeVenta/' . $descomp[0];
            $nombreImagenOriginal = $file->getClientOriginalName();
            $obj = [
                'imagen' => $urlImagen,
                'id' => $ptv_id,
                'nombreOriginal' => $nombreImagenOriginal,
                'nombre' => $nombre
            ];
            $responseService =  $this->service->guardarImagenPuntoVenta($obj);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al guardar la imágen del punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function editarImagenPuntoVenta(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $ptv_id = $request->all()['idPtv'];
            $imagenAntigua = $request->all()['imagenAntigua'];
            Storage::delete('public/ImagenesPuntosDeVenta/' . $imagenAntigua);
            $file = $request->file('attachment');
            $nombre = time() . "_" . $file->getClientOriginalName();
            $URL = config('app.url');
            $path = Storage::putFileAs('public/ImagenesPuntosDeVenta', $file, $nombre);
            $descomp = explode("/", $path);
            array_splice($descomp, 0, 2);
            $urlImagen = $URL . '/storage/ImagenesPuntosDeVenta/' . $descomp[0];
            $nombreImagenOriginal = $file->getClientOriginalName();
            $obj = [
                'imagen' => $urlImagen,
                'id' => $ptv_id,
                'nombreOriginal' => $nombreImagenOriginal,
                'nombre' => $nombre
            ];
            $responseService =  $this->service->editarImagenPuntoVenta($obj);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al guardar la imágen del punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function editarPuntoVenta(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->editarPuntoVenta($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al editar el punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }

    public function habilitar(Request $request)
    {
        $response = Helper::createStdResponse();
        try {
            $data = $request->json()->all();
            $responseService =  $this->service->habilitarPunto($data);
            $response->data = $responseService['data'];
            $response->status = $responseService['status'];
            http_response_code(200);
        } catch (Exception $e) {
            $response->error = $e->getMessage();
            $response->codigo = $e->getCode();
            $response->message = 'Se produjo un error al modificar el punto de venta';
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
            $response->message = 'Se produjo un error al modificar el punto de venta';
            http_response_code(400);
        }

        Helper::jsonResponse($response);
    }
}
