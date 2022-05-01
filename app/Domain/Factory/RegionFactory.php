<?php

namespace App\Domain\Factory;

use App\Domain\Entity\Region;

class RegionFactory
{
    public static function create(
       Int $id,
       Int $idH,
       String $nombre,
       Int $orden,
       Int $indicadores
    ): Region {
        return new Region(
            $id,
            $idH,
            $nombre,
            $orden,
            $indicadores
        );
    }

    public static function createFromArray(array $datos): Region
    {

        if (
            !array_key_exists('reg_id', $datos)
            || !array_key_exists('reg_id_hml', $datos)
            || !array_key_exists('reg_nombre', $datos)
            || !array_key_exists('reg_orden', $datos)
            || !array_key_exists('reg_ind_act', $datos)
        ) {
            throw new InvalidArgumentException("El array entregado no tiene todos los campos necesarios Factory (Region)");
        }
        return self::create(
            $datos['reg_id'],
            $datos['reg_id_hml'],
            $datos['reg_nombre'],
            $datos['reg_orden'],
            $datos['reg_ind_act']
        );
    }
}
