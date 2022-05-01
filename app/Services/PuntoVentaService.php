<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\PuntoVentaInterface;
use App\Domain\Repository\HorarioInterface;
use App\Domain\Repository\ClfMedioPagoInterface;
use App\Domain\Repository\ClfDistribucionInterface;
use App\Domain\Repository\ClfProductoInterface;
use App\Domain\Repository\ClfCalificacionInterface;
use App\Domain\Repository\ClfUsuarioDpaInterface;
use App\Domain\Repository\ComunaInterface;

class PuntoVentaService
{
    private $repository;
    private $repositoryHorario;
    private $repositoryClfMedioPago;
    private $repositoryClfDistribucion;
    private $repositoryClfProducto;
    private $repositoryClfCalificacion;
    private $repositoryClfUsuarioDpa;
    private $repositoryComuna;

    public function __construct(
        PuntoVentaInterface $pv,
        HorarioInterface $hi,
        ClfMedioPagoInterface $mp,
        ClfDistribucionInterface $d,
        ClfProductoInterface $p,
        ClfCalificacionInterface $c,
        ClfUsuarioDpaInterface $udpa,
        ComunaInterface $comuna
    ) {
        $this->repository = $pv;
        $this->repositoryHorario = $hi;
        $this->repositoryClfMedioPago = $mp;
        $this->repositoryClfDistribucion = $d;
        $this->repositoryClfProducto = $p;
        $this->repositoryClfCalificacion = $c;
        $this->repositoryClfUsuarioDpa = $udpa;
        $this->repositoryComuna = $comuna;
    }

    public function obtenerPuntosVentas(): array
    {
        return $this->repository->obtenerPuntosVentas();
    }

    public function obtenerPuntosVentasPorId(int $id)
    {
        if (Auth()->user()->tipe_id != 6) {
            $puntoVenta = $this->repository->obtenerPuntosVentasPorId($id);
            $puntos = [];
            foreach ($puntoVenta as $punto) {
                $punto['precioVacio'] = $this->repositoryClfProducto->verificaPrecioVacio($punto['ptv_id']);
                $punto['regiones'] = $this->repository->obtenerRegionById($punto['ptv_id']);
                $punto['comunas'] = $this->repository->obtenerComunaById($punto['ptv_id']);
                $punto['horarios'] = $this->repository->obtenerHorariosById($punto['ptv_id']);
                $punto['distribucion'] = $this->repository->obtenerDistribucionById($punto['ptv_id']);
                $punto['medioPago'] = $this->repository->obtenerMedioPagoById($punto['ptv_id']);
                $puntos[] = $punto;
            }
            if (!$puntos)
                throw new Exception("No existen puntos de venta en nuestros registros", 1);

            return [
                "status" => true,
                "data" => $puntos,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function obtenerPuntosVentasPorIdUsuario(int $id, int $usuario)
    {
        if (Auth()->user()->tipe_id != 6) {
            $regionesUsuario = $this->repositoryClfUsuarioDpa->regionPorUsuario($usuario);
            $puntoVentaPorId = [];
            foreach ($regionesUsuario as $idRegion) {
                $puntoVentaUsuario =
                    $this->repository->obtenerPuntosVentasPorIdUsuario($id, $idRegion->com_id);
                if ($puntoVentaUsuario) {
                    $pvId['puntoVenta'] = $puntoVentaUsuario;
                    $puntoVentaPorId[] = $pvId;
                }
            }
            $puntos = [];
            foreach ($puntoVentaPorId as $puntoV) {
                foreach ($puntoV['puntoVenta'] as $punto) {
                    $punto['precioVacio'] = $this->repositoryClfProducto->verificaPrecioVacio($punto['ptv_id']);
                    $punto['regiones'] = $this->repository->obtenerRegionById($punto['ptv_id']);
                    $punto['comunas'] = $this->repository->obtenerComunaById($punto['ptv_id']);
                    $punto['horarios'] = $this->repository->obtenerHorariosById($punto['ptv_id']);
                    $punto['distribucion'] = $this->repository->obtenerDistribucionById($punto['ptv_id']);
                    $punto['medioPago'] = $this->repository->obtenerMedioPagoById($punto['ptv_id']);
                    $puntos[] = $punto;
                }
            }
            if (!$puntos)
                throw new Exception("No existen puntos de venta correspondientes a tu región o comuna", 1);
            if ($puntos) {
                if (
                    $puntos[0]['tico_id'] == 1
                    && (Auth()->user()->tipe_id == 1
                        || Auth()->user()->tipe_id == 2
                        || Auth()->user()->tipe_id == 3
                        || Auth()->user()->tipe_id == 5)
                ) {
                    return [
                        "status" => true,
                        "data" => $puntos,
                    ];
                } else if (
                    $puntos[0]['tico_id'] == 2
                    && (Auth()->user()->tipe_id == 1
                        || Auth()->user()->tipe_id == 2
                        || Auth()->user()->tipe_id == 3
                        || Auth()->user()->tipe_id == 4)
                ) {
                    return [
                        "status" => true,
                        "data" => $puntos,
                    ];
                } else {
                    throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
                }
            }
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function guardarPuntoVenta(array $formulario)
    {
        if ($formulario['idCombustible'] === 2 && Auth()->user()->tipe_id === 5) {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
        if ($formulario['idCombustible'] === 1 && Auth()->user()->tipe_id === 4) {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
        if (Auth()->user()->tipe_id != 3 && Auth()->user()->tipe_id != 6) {
            $validar =
                $this->repository->validar(
                    $formulario['idCombustible'],
                    $formulario['formPuntoVenta']['direccion'],
                );
            if ($validar) {
                throw new Exception("Ya existe un punto de venta con esta dirección", 5000);
            } else {
                $puntos = [];
                $nuevoPunto = $this->repository->guardarPuntoVenta($formulario);
                $puntos['PuntoVenta'] = $nuevoPunto;
                if ($nuevoPunto) {
                    $puntos['horario'] = $this->repositoryHorario->insertarHorario($nuevoPunto['ptv_id'], $formulario['horarios']);
                    $puntos['medioPago'] = $this->repositoryClfMedioPago->insertar($nuevoPunto['ptv_id'], $formulario['formContacto']['medioPago']['timp_id']);
                    $puntos['distribucion'] = $this->repositoryClfDistribucion->insertar($nuevoPunto['ptv_id'], $formulario['formContacto']['tipoDistribucion']['tidi_id']);

                    if ($formulario['productos']) {
                        foreach ($formulario['productos'] as $producto) {
                            if (!$producto['prod_precio']) {
                                $precio = 0;
                            } else {
                                $precio = $producto['prod_precio'];
                            }
                            $this->repositoryClfProducto->agregar(
                                $nuevoPunto['ptv_id'],
                                $producto['tipr_id'],
                                $producto['prod_especie'],
                                $producto['tiun_id'],
                                $producto['tien_id'],
                                $producto['prod_unidad'],
                                $producto['prod_tiene_stock'],
                                $producto['prod_marca'],
                                $precio
                            );
                        }
                    }
                } else {
                    throw new Exception("No se pudo insertar el punto de venta", 1);
                }

                return [
                    "status" => true,
                    "data" => $puntos,
                ];
            }
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function editarPuntoVenta(array $formulario)
    {
        if (Auth()->user()->tipe_id != 3 && Auth()->user()->tipe_id != 6) {
            $validar =
                $this->repository->validarEditar(
                    $formulario['ptv_id'],
                    $formulario['idCombustible'],
                    $formulario['formPuntoVenta']['direccion'],
                );
            if ($validar) {
                throw new Exception("Ya existe un punto de venta con esta dirección", 5000);
            } else {
                $puntos = [];
                $nuevoPunto = $this->repository->editarPuntoVenta($formulario);
                $puntos['PuntoVenta'] = $nuevoPunto;
                if ($nuevoPunto) {
                    $validaHorario = $this->repositoryHorario->validarHorario($nuevoPunto['ptv_id']);
                    if (!$validaHorario) {
                        $puntos['horario'] = $this->repositoryHorario->insertarHorario(
                            $nuevoPunto['ptv_id'],
                            $formulario['horarios']
                        );
                    } else {
                        $puntos['horario'] = $this->repositoryHorario->editarHorario(
                            $nuevoPunto['ptv_id'],
                            $formulario['horarios']
                        );
                    }
                    if (isset($formulario['formContacto']['medioPago'])) {
                        $validaMp = $this->repositoryClfMedioPago->valida($nuevoPunto['ptv_id']);
                        if ($validaMp) {
                            $puntos['medioPago'] = $this->repositoryClfMedioPago->editar(
                                $nuevoPunto['ptv_id'],
                                $formulario['formContacto']['medioPago']['timp_id']
                            );
                        } else {
                            $puntos['medioPago'] = $this->repositoryClfMedioPago->insertar(
                                $nuevoPunto['ptv_id'],
                                $formulario['formContacto']['medioPago']['timp_id']
                            );
                        }
                    }
                    if (isset($formulario['formContacto']['tipoDistribucion'])) {
                        $validaDist = $this->repositoryClfDistribucion->valida($nuevoPunto['ptv_id']);
                        if ($validaDist) {
                            $puntos['distribucion'] = $this->repositoryClfDistribucion->editar(
                                $nuevoPunto['ptv_id'],
                                $formulario['formContacto']['tipoDistribucion']['tidi_id']
                            );
                        } else {
                            $puntos['distribucion'] = $this->repositoryClfDistribucion->insertar(
                                $nuevoPunto['ptv_id'],
                                $formulario['formContacto']['tipoDistribucion']['tidi_id']
                            );
                        }
                    }
                } else {
                    throw new Exception("No se pudo editar el punto de venta", 1);
                }

                return [
                    "status" => true,
                    "data" => $puntos,
                ];
            }
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function habilitarPunto(array $punto)
    {
        if (Auth()->user()->tipe_id != 3 && Auth()->user()->tipe_id != 6) {
            $puntoVenta = $this->repository->obtenerPuntosVentasPorIdHabilitar($punto['ptv_id']);
            $comunaActiva = $this->repositoryComuna->verificarActiva($puntoVenta['com_id']);
            if (!$comunaActiva) {
                throw new Exception("Comuna deshabilitada, no puede activar punto de venta", 1);
            } else {
                $puntoNuevo = $this->repository->habilitarPunto($punto);

                return [
                    "status" => true,
                    "data" => $puntoNuevo,
                ];
            }
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function guardarImagenPuntoVenta($obj)
    {
        if (Auth()->user()->tipe_id != 3 && Auth()->user()->tipe_id != 6) {
            $puntoNuevo = $this->repository->guardarImagenPuntoVenta($obj['imagen'], $obj['id'], $obj['nombre']);

            return [
                "status" => true,
                "data" => $puntoNuevo,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function editarImagenPuntoVenta($obj)
    {
        if (Auth()->user()->tipe_id != 3 && Auth()->user()->tipe_id != 6) {
            $puntoNuevo = $this->repository->editarImagenPuntoVenta($obj['imagen'], $obj['id'], $obj['nombre']);

            return [
                "status" => true,
                "data" => $puntoNuevo,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }

    public function eliminar(array $data)
    {
        if (Auth()->user()->tipe_id != 3 && Auth()->user()->tipe_id != 6) {
            $id = $data[0];
            $puntoNuevo = $this->repositoryHorario->eliminar($id);
            $puntoNuevo = $this->repositoryClfMedioPago->eliminar($id);
            $puntoNuevo = $this->repositoryClfDistribucion->eliminar($id);
            $puntoNuevo = $this->repositoryClfCalificacion->eliminarPorPv($id);
            $puntoNuevo = $this->repositoryClfProducto->eliminarPorPv($id);
            $puntoNuevo = $this->repository->eliminar($id);

            return [
                "status" => true,
                "data" => $puntoNuevo,
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }
}
