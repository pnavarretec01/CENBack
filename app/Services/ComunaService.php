<?php

namespace App\Services;

use App\Domain\Repository\ComunaInterface;

class ComunaService
{
    private $repository;

    public function __construct(ComunaInterface $comuna)
    {
        $this->repository = $comuna;
    }

    public function obtenerComunas() : array
    {
        return $this->repository->obtenerComunas();
    }

    public function obtenerComunaConRegion() : array
    {
        return $this->repository->obtenerComunaConRegion();
    }

    public function habilitarComuna(array $comuna)
    {
        $comunaNuevo = $this->repository->habilitarComuna($comuna);
        $comunaVerificar = $this->repository->verificarComunaRegion($comuna);

        return [
            "status" => true,
            "data" => $comunaNuevo,
        ];
    }

    public function verificarComunaRegion(array $comuna)
    {
        $comunaNuevo = $this->repository->verificarComunaRegion($comuna);

        return [
            "status" => true,
            "data" => $comunaNuevo,
        ];
    }
}
