<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\TipoPerfilInterface;

class TipoPerfilService
{
    private $repository;

    public function __construct(TipoPerfilInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerTipoPerfil() : array
    {
        return $this->repository->obtenerTipoPerfil();
    }

}
