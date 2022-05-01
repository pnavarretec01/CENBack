<?php

namespace App\Domain\Repository;

interface ClfMedioPagoInterface
{
    public function insertar(int $idPunto, int $idMedioPago ): array;
    public function editar(int $idPunto, int $idMedioPago );
    public function valida(int $idPunto);
    public function eliminar(int $id);
}
