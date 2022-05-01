<?php

namespace App\Domain\Repository;

interface PrmTipoCalificacionInterface
{
    public function listar(): array;
    public function habilitar(array $calificacion);
    public function agregar(int $estrellas, string $opinion, int $activo);
    public function eliminar(int $id);
    public function validar(string $opinion, int $estrellas);
}
