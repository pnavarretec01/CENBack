<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\TipoProductoInterface;

class TipoProductoService
{
    private $repository;

    public function __construct(TipoProductoInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerTipoProducto(int $id) : array
    {
        return $this->repository->obtenerTipoProducto($id);
    }

}
