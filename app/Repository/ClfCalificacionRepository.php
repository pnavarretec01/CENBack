<?php

namespace App\Repository;

use App\Domain\Repository\ClfCalificacionInterface;
use App\Models\ClfCalificacionDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class ClfCalificacionRepository extends ClfCalificacionDAO implements ClfCalificacionInterface
{
    public function listar(): array
    {
        $calificaciones = DB::table('clf_calificacion')
            ->orderBy('updated_at', 'DESC')
            ->join('prm_tipo_calificacion', 'prm_tipo_calificacion.tpcl_id', 'clf_calificacion.tpcl_id')
            ->get();
        if (!$calificaciones) throw new Exception("No se puede obtener las calificaciones", 0);

        return $calificaciones->toArray();
    }

    public function listarSegunIdCombustible(Int $idCombustible, $comuna): array
    {
        $calificaciones = DB::table('clf_calificacion')
            ->join('prm_tipo_calificacion', 'prm_tipo_calificacion.tpcl_id', 'clf_calificacion.tpcl_id')
            ->join('clf_punto_venta', 'clf_punto_venta.ptv_id', 'clf_calificacion.ptv_id')
            ->where('clf_punto_venta.tico_id', $idCombustible)
            ->where('clf_punto_venta.com_id', $comuna->com_id)
            ->distinct()
            ->get();
        if (!$calificaciones) throw new Exception("No se puede obtener las calificaciones", 0);

        return $calificaciones->toArray();
    }

    public function listarSegunIdComuna($comuna): array
    {
        $calificaciones = DB::table('clf_calificacion')
            ->join('prm_tipo_calificacion', 'prm_tipo_calificacion.tpcl_id', 'clf_calificacion.tpcl_id')
            ->join('clf_punto_venta', 'clf_punto_venta.ptv_id', 'clf_calificacion.ptv_id')
            ->where('clf_punto_venta.com_id', $comuna->com_id)
            ->distinct()
            ->get();
        if (!$calificaciones) throw new Exception("No se puede obtener las calificaciones", 0);

        return $calificaciones->toArray();
    }

    public function habilitar(array $calificacion)
    {
        if ($calificacion['habilitar'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $calificacion['cali_id'];
        $combustibleModificar = self::where("cali_id", $id)->first();
        $combustibleModificar->cali_ind_act = $activo;

        return $combustibleModificar->save();
    }

    public function eliminar(int $id)
    {
        $calificacion = self::where("cali_id", $id)->delete();
        return $calificacion;
    }

    public function eliminarPorTipo(int $id)
    {
        $calificacion = self::where("tpcl_id", $id)->delete();
        return $calificacion;
    }

    public function eliminarPorPv(int $id)
    {
        $calificacion = self::where("ptv_id", $id)->delete();
        return $calificacion;
    }

    public function validarPorParametroCalificacion(int $id)
    {
        $validar = self::where("tpcl_id", $id)->first();
        if ($validar) {
            return true;
        } else {
            return false;
        }
    }
}
