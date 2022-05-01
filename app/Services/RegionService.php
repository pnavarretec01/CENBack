<?php

namespace App\Services;

use App\Domain\Repository\RegionInterface;

class RegionService
{
    private $repository;

    public function __construct(RegionInterface $region)
    {
        $this->repository = $region;
    }

    public function obtenerRegiones(): array
    {
        return $this->repository->obtenerRegiones();
    }

    public function obtenerRegionesTabla(): array
    {
        return $this->repository->obtenerRegionesTabla();
    }
}
