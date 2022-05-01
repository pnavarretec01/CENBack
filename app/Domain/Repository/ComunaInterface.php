<?php

namespace App\Domain\Repository;

interface ComunaInterface
{
    public function obtenerComunas() : array;
    public function obtenerComunaConRegion(): array;
    public function habilitarcomuna(array $tarifa);
    public function verificarComunaRegion(array $comuna);
    public function verificarActiva(Int $idComuna);
}
