<?php

namespace App\Domain\Repository;

interface UnidadNormalizadaInterface
{
    public function insertarUnidadNormalizada(array $parametro);
    public function obtenerParametros(int $idCombustible);
    public function obtenerUnidadPorId(int $id): array;
    public function editarUnidadNormalizada(array $parametro);
    public function obtenerUnidadPorIdUnidad(int $id);
    public function eliminar(int $id, int $combustible);
    public function habilitarUnidadNormalizada(array $parametro);
    public function validarUnidad($parametro);
    public function validarUnidadEditar($parametro);
    public function obtenerUnidadPorIdActivo(int $id): array;
}
