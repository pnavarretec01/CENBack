<?php

namespace App\Services;

use Exception;

use App\Domain\Repository\MedioPagoInterface;

class MedioPagoService
{
    private $repository;

    public function __construct(MedioPagoInterface $pv)
    {
        $this->repository = $pv;
    }

    public function obtenerMedioPago() : array
    {
        return $this->repository->obtenerMedioPago();
    }

}
