<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\EspecieNormalizadaInterface;

class EspecieNormalizadaService
{
    private $repository;

    public function __construct(EspecieNormalizadaInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerEspecieNormalizada(int $id) : array
    {
        return $this->repository->obtenerEspeciePorId ($id);
    }

    public function obtenerEspecieNormalizadaActiva(int $id) : array
    {
        return $this->repository->obtenerEspeciePorIdActiva($id);
    }

}
