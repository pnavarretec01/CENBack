<?php

namespace App\Domain\Repository;

interface ClfCalificacionInterface
{
    public function listar(): array;
    public function habilitar(array $calificacion);
    public function eliminar(int $id);
    public function eliminarPorTipo(int $id);
    public function eliminarPorPv(int $id);
    public function listarSegunIdCombustible(Int $idCombustible, $comuna): array;
    public function listarSegunIdComuna($comuna): array;
    public function validarPorParametroCalificacion(int $id);
}
