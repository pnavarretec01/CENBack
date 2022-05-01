<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\UnidadNormalizadaInterface;

class UnidadNormalizadaService
{
    private $repository;

    public function __construct(UnidadNormalizadaInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerUnidadNormalizada(int $id) : array
    {
        return $this->repository->obtenerUnidadPorId ($id);
    }

    public function obtenerUnidadNormalizadaActiva(int $id) : array
    {
        return $this->repository->obtenerUnidadPorIdActivo($id);
    }

}
