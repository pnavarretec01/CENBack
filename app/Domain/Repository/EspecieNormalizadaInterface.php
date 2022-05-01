<?php

namespace App\Domain\Repository;

interface EspecieNormalizadaInterface
{
    public function insertarEspecieNormalizada(array $parametro);
    public function obtenerParametros(int $idCombustible);
    public function obtenerEspeciePorId(int $id): array;
    public function editarEspecieNormalizada(array $parametro);
    public function obtenerEspeciePorIdEspecie(int $id);
    public function eliminar(int $id, int $combustible);
    public function habilitarEspecieNormalizada(array $parametro);
    public function validarEspecie($parametro);
    public function validarEspecieEditar($parametro);
    public function obtenerEspeciePorIdActiva(int $id): array;
}
