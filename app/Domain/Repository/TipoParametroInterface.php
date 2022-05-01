<?php

namespace App\Domain\Repository;

interface TipoParametroInterface
{
    public function obtenerTipoParametro(): array;
    public function obtenerTipoParametroPorId(string $tabla): array;
}
