<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\ClfCalificacionInterface;
use App\Domain\Repository\PuntoVentaInterface;
use App\Domain\Repository\TipoCombustibleInterface;
use App\Domain\Repository\ClfUsuarioDpaInterface;

class ClfCalificacionService
{
    private $repository;
    private $repositoryPv;
    private $repositoryTC;
    private $repositoryClfUsuarioDpa;

    public function __construct(
        ClfCalificacionInterface $pv,
        PuntoVentaInterface $repositoryPv,
        TipoCombustibleInterface $repositoryTC,
        ClfUsuarioDpaInterface $udpa
    ) {
        $this->repository = $pv;
        $this->PuntoVentarepository = $repositoryPv;
        $this->TipoCombustiblerepository = $repositoryTC;
        $this->repositoryClfUsuarioDpa = $udpa;
    }

    public function listar(): array
    {
        if (Auth()->user()->tipe_id == 5 || Auth()->user()->tipe_id == 4) {
            if (Auth()->user()->tipe_id == 4) {
                $idCombustible = 2;
            }
            if (Auth()->user()->tipe_id == 5) {
                $idCombustible = 1;
            }
            $comunasUsuario = $this->repositoryClfUsuarioDpa->regionPorUsuario(Auth()->user()->usua_id);
            $calificacionesFiltradas = [];
            foreach ($comunasUsuario as $idComuna) {
                $calificaciones = $this->repository->listarSegunIdCombustible($idCombustible, $idComuna);
                if ($calificaciones) {
                    $cali['calificaciones'] = $calificaciones;
                    foreach ($cali['calificaciones'] as $item) {
                        $calificacionesFiltradas[] = $item;
                    }
                }
            }
            $calificacionesFiltradas = json_decode(json_encode($calificacionesFiltradas), true);
            $calificacionesCompletas = [];
            foreach ($calificacionesFiltradas as $calificacion) {
                $calificacion['puntoVenta'] = $this->PuntoVentarepository->obtenerPuntosVentasPorPtvId($calificacion['ptv_id']);
                $calificacion['regionPuntoVenta'] = $this->PuntoVentarepository->obtenerRegionById($calificacion['ptv_id']);
                $calificacion['comunaPuntoVenta'] = $this->PuntoVentarepository->obtenerComunaById($calificacion['ptv_id']);
                $calificacion['tipoCombustible'] = $this->TipoCombustiblerepository->obtenerCombustiblePorId($calificacion['tico_id']);
                $calificacionesCompletas[] = $calificacion;
            }
            if (!$calificacionesCompletas)
                throw new Exception("No existe calificaciones en nuestros registros", 1);

            return [
                "status" => true,
                "data" => $calificacionesCompletas,
            ];
        }
        if (Auth()->user()->tipe_id == 2 || Auth()->user()->tipe_id == 3) {
            $comunasUsuario = $this->repositoryClfUsuarioDpa->regionPorUsuario(Auth()->user()->usua_id);
            $calificacionesFiltradas = [];
            foreach ($comunasUsuario as $idComuna) {
                $calificaciones = $this->repository->listarSegunIdComuna($idComuna);
                if ($calificaciones) {
                    $cali['calificaciones'] = $calificaciones;
                    foreach ($cali['calificaciones'] as $item) {
                        $calificacionesFiltradas[] = $item;
                    }
                }
            }
            $calificacionesFiltradas = json_decode(json_encode($calificacionesFiltradas), true);
            $calificacionesCompletas = [];
            foreach ($calificacionesFiltradas as $calificacion) {
                $calificacion['puntoVenta'] = $this->PuntoVentarepository->obtenerPuntosVentasPorPtvId($calificacion['ptv_id']);
                $calificacion['regionPuntoVenta'] = $this->PuntoVentarepository->obtenerRegionById($calificacion['ptv_id']);
                $calificacion['comunaPuntoVenta'] = $this->PuntoVentarepository->obtenerComunaById($calificacion['ptv_id']);
                $calificacion['tipoCombustible'] = $this->TipoCombustiblerepository->obtenerCombustiblePorId($calificacion['tico_id']);
                $calificacionesCompletas[] = $calificacion;
            }
            if (!$calificacionesCompletas)
                throw new Exception("No existe calificaciones en nuestros registros", 1);

            return [
                "status" => true,
                "data" => $calificacionesCompletas,
            ];
        }
        if (Auth()->user()->tipe_id != 4 && Auth()->user()->tipe_id != 5) {
            $calificaciones = $this->repository->listar();
            $calificaciones = json_decode(json_encode($calificaciones), true);
            $calif = [];
            foreach ($calificaciones as $calificacion) {
                $calificacion['puntoVenta'] = $this->PuntoVentarepository->obtenerPuntosVentasPorPtvId($calificacion['ptv_id']);
                $calificacion['regionPuntoVenta'] = $this->PuntoVentarepository->obtenerRegionById($calificacion['ptv_id']);
                $calificacion['comunaPuntoVenta'] = $this->PuntoVentarepository->obtenerComunaById($calificacion['ptv_id']);
                $calificacion['tipoCombustible'] = $this->TipoCombustiblerepository->obtenerCombustiblePorId($calificacion['puntoVenta']['tico_id']);
                $calif[] = $calificacion;
            }
            if (!$calif)
                throw new Exception("No existe calificaciones en nuestros registros", 1);

            return [
                "status" => true,
                "data" => $calif,
            ];
        }
    }

    public function habilitar(array $calificacion)
    {
        $calificacionNuevo = $this->repository->habilitar($calificacion);

        return [
            "status" => true,
            "data" => $calificacionNuevo,
        ];
    }

    public function eliminar($data)
    {
        if (Auth()->user()->tipe_id === 1) {
            $id = $data[0];
            $calif = $this->repository->eliminar($id);

            return [
                "status" => true,
                "data" => $calif
            ];
        } else {
            throw new Exception("Su usuario no tiene acceso a esta función, favor comuníquese con un Admistrador/a.", 1);
        }
    }
}
