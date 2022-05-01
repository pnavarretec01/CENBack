<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\TipoCombustibleInterface;

class TipoCombustibleService
{
    private $repository;

    public function __construct(TipoCombustibleInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerCombustibles(): array
    {
        $combustibles = $this->repository->obtenerCombustibles();
        if (!$combustibles)
            throw new Exception("No se pudo obtener los tipos de combustibles", 1);

        return [
            "status" => true,
            "data" => $combustibles,
        ];
    }

    public function habilitarCombustible(array $combustible)
    {
        $combustibleNuevo = $this->repository->habilitarCombustible($combustible);

        return [
            "status" => true,
            "data" => $combustibleNuevo,
        ];
    }
}
