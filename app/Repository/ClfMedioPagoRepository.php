<?php

namespace App\Repository;

use App\Domain\Repository\ClfMedioPagoInterface;
use App\Models\ClfMedioPagoDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class ClfMedioPagoRepository extends ClfMedioPagoDAO implements ClfMedioPagoInterface
{

    public function insertar(int $idPunto, int $idMedioPago): array
    {
        $medioPago = new self();
        $medioPago->ptv_id = $idPunto;
        $medioPago->timp_id = $idMedioPago;
        $medioPago->save();

        return $medioPago->toArray();
    }

    public function editar(int $idPunto, int $idMedioPago)
    {
        $medioPago = DB::update('update clf_medio_pago set timp_id = ' . $idMedioPago . ' where ptv_id = ' . $idPunto);

        return $medioPago;
    }

    public function valida(int $idPunto)
    {
        $medioPago = self::where("ptv_id", $idPunto)->first();
        if ($medioPago) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminar(int $id)
    {
        $mp = self::where("ptv_id", $id)->delete();
        return $mp;
    }
}
