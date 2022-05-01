<?php

namespace App\Domain\Repository;

interface TipoCombustibleInterface
{
    public function obtenerCombustibles() : array;
    public function habilitarCombustible(array $combustible);
    public function obtenerCombustiblePorId(int $id);
}
