<?php

namespace App\Repository;

use App\Domain\Repository\PrmTipoCalificacionInterface;
use App\Models\PrmTipoCalificacionDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class PrmTipoCalificacionRepository extends PrmTipoCalificacionDAO implements PrmTipoCalificacionInterface
{

    public function listar(): array
    {
        $puntos = self::all();
        if (!$puntos) throw new Exception("No se puede obtener los tipos de calificaciones", 0);

        return $puntos->toArray();
    }

    public function habilitar(array $reporte)
    {
        if ($reporte['habilitar'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $reporte['tpcl_id'];
        $reporteModificar = self::where("tpcl_id", $id)->first();
        $reporteModificar->tpcl_ind_act = $activo;

        return $reporteModificar->save();
    }

    public function agregar(int $estrellas, string $opinion, int $activo)
    {
        $parametro = new self();
        $parametro->tpcl_cant_estrellas = $estrellas;
        $parametro->tpcl_descripcion = $opinion;
        $parametro->tpcl_ind_act = $activo;
        $parametro->save();

        return $parametro->toArray();
    }

    public function eliminar(int $id)
    {
        $calificacion = self::where("tpcl_id", $id)->delete();
        return $calificacion;
    }

    public function validar(string $opinion, int $tpcl_cant_estrellas)
    {
        $calificacion = self::where("tpcl_descripcion", $opinion)->where("tpcl_cant_estrellas", $tpcl_cant_estrellas)->first();
        if ($calificacion) {
            return true;
        } else {
            return false;
        }
    }
}
