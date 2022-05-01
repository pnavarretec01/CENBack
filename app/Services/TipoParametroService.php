<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\TipoParametroInterface;

class TipoParametroService
{
    private $repository;

    public function __construct(TipoParametroInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerTipoParametro() : array
    {
        return $this->repository->obtenerTipoParametro();
    }

}
