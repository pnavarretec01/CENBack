<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\PrmTipoCalificacionInterface;
use App\Domain\Repository\ClfCalificacionInterface;

class PrmTipoCalificacionService
{
    private $repository;

    public function __construct(PrmTipoCalificacionInterface $pv, ClfCalificacionInterface $cc)
    {
        $this->repository = $pv;
        $this->CalificacionRepository = $cc;
    }

    public function listar(): array
    {
        $combustibles = $this->repository->listar();
        if (!$combustibles)
            throw new Exception("No se pudo obtener los tipos de combustibles", 1);

        return [
            "status" => true,
            "data" => $combustibles,
        ];
    }

    public function habilitar(array $combustible)
    {
        $combustibleNuevo = $this->repository->habilitar($combustible);

        return [
            "status" => true,
            "data" => $combustibleNuevo,
        ];
    }

    public function agregar(array $parametro)
    {
        $tpcl_cant_estrellas = $parametro['estrellas'];
        $tpcl_descripcion = $parametro['opinion'];
        $tpcl_ind_act = $parametro['tpcl_ind_act'];
        $validar = $this->repository->validar($tpcl_descripcion, $tpcl_cant_estrellas);
        if ($validar) {
            throw new Exception("Ya existe un parámetro con esta descripción", 1);
        } else {
            $parametroNuevo = $this->repository->agregar($tpcl_cant_estrellas, $tpcl_descripcion, $tpcl_ind_act);

            return [
                "status" => true,
                "data" => $parametroNuevo,
            ];
        }
    }

    public function eliminar($data)
    {
        $id = $data[0];

        $validar = $this->CalificacionRepository->validarPorParametroCalificacion($id);
        if ($validar) {
            throw new Exception("No se puede eliminar, este parámetro posee calificaciones asociadas", 1);
        } else {
            $tipoCalif = $this->CalificacionRepository->eliminarPorTipo($id);
            $tipoCalif = $this->repository->eliminar($id);

            return [
                "status" => true,
                "data" => $tipoCalif
            ];
        }
    }
}
