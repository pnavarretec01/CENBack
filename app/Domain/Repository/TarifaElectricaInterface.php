<?php

namespace App\Domain\Repository;

interface TarifaElectricaInterface
{
    public function obtenerTarifas() : array;
    public function obtenerRegionById(Int $id);
    public function obtenerComunaById(Int $id);
    public function agregarTarifa(array $tarifa);
    public function habilitarTarifa(array $tarifa);
    public function editarTarifa(array $tarifa);
    public function eliminar(int $id);
}
