<?php

namespace App\Domain\Repository;

interface TipoProductoInterface
{
    public function obtenerTipoProducto(int $id): array;
    public function obtenerTipoProductoPorIdProducto(int $id);
    
}
