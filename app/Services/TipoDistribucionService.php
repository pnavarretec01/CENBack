<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\TipoDistribucionInterface;

class TipoDistribucionService
{
    private $repository;

    public function __construct(TipoDistribucionInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerTipoDistribucion() : array
    {
        return $this->repository->obtenerTipoDistribucion();
    }

}
