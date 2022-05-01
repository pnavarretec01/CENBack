<?php

namespace App\Domain\Factory;

use App\Domain\Entity\Comuna;

class ComunaFactory
{
    public static function create(
        Int $id,
        Int $idH,
        String $nombre,
        Int $idRegion,
        Int $indicadores
    ): Comuna {
        return new Comuna(
            $id,
            $idH,
            $nombre,
            $idRegion,
            $indicadores
        );
    }

    public static function createFromArray(array $datos): Comuna
    {

        if (
            !array_key_exists('com_id', $datos)
            || !array_key_exists('com_id_hml', $datos)
            || !array_key_exists('com_nombre', $datos)
            || !array_key_exists('reg_id', $datos)
            || !array_key_exists('com_ind_acti', $datos)
        ) {
            throw new InvalidArgumentException("El array entregado no tiene todos los campos necesarios Factory (Comuna)");
        }
        return self::create(
            $datos['com_id'],
            $datos['com_id_hml'],
            $datos['com_nombre'],
            $datos['reg_id'],
            $datos['com_ind_acti']
        );
    }
}
