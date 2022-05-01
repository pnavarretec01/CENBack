<?php

namespace App\Domain\Repository;

interface ClfDistribucionInterface
{
    public function insertar(int $idPunto, int $idDistribucion ): array;
    public function editar(int $idPunto, int $idDistribucion );
    public function valida(int $idPunto);
    public function eliminar(int $id);
}
