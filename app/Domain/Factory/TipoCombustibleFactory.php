<?php

namespace App\Domain\Factory;

use App\Domain\Entity\TipoCombustible;

class TipoCombustibleFactory
{
    public static function create(
        Int $id,
        String $descripcion,
        Int $indicadores
    ): TipoCombustible {
        return new TipoCombustible(
            $id,
            $descripcion,
            $indicadores
        );
    }

    public static function createFromArray(array $datos): TipoCombustible
    {

        if (
            !array_key_exists('tico_id', $datos)
            || !array_key_exists('tico_descripcion', $datos)
            || !array_key_exists('tico_ind_act', $datos)
        ) {
            throw new InvalidArgumentException("El array entregado no tiene todos los campos necesarios Factory (Tipo combustible)");
        }
        return self::create(
            $datos['tico_id'],
            $datos['tico_descripcion'],
            $datos['tico_ind_act'],
        );
    }
}
