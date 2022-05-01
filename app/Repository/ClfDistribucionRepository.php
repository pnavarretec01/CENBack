<?php

namespace App\Repository;

use App\Domain\Repository\ClfDistribucionInterface;
use App\Models\ClfDistribucionDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class ClfDistribucionRepository extends ClfDistribucionDAO implements ClfDistribucionInterface
{

    public function insertar(int $idPunto, int $idDistribucion): array
    {
        $distribucion = new self();
        $distribucion->ptv_id = $idPunto;
        $distribucion->tidi_id = $idDistribucion;
        $distribucion->save();

        return $distribucion->toArray();
    }
    public function editar(int $idPunto, int $idDistribucion)
    {
        $distribucion = DB::update('update clf_distribucion set tidi_id = ' . $idDistribucion . ' where ptv_id = ' . $idPunto);

        return $distribucion;
    }

    public function valida(int $idPunto)
    {
        $distribucion = self::where("ptv_id", $idPunto)->first();
        if ($distribucion) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminar(int $id)
    {
        $distribucion = self::where("ptv_id", $id)->delete();
        return $distribucion;
    }
}
