<?php

namespace App\Domain\Repository;

interface RegionInterface
{
    public function obtenerRegiones(): array;
    public function obtenerRegionesTabla(): array;
}
