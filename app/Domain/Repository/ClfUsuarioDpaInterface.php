<?php

namespace App\Domain\Repository;

interface ClfUsuarioDpaInterface
{
    public function insertar(int $idUsuario, int $idRegion, int $idComuna): array;
    public function eliminar(int $idUsuario);
    public function regionPorUsuario(int $idUsuario);
}
