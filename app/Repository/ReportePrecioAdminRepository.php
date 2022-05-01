<?php

namespace App\Repository;

use App\Domain\Repository\ReportePrecioAdminInterface;
use App\Models\ReportePrecioAdminDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class ReportePrecioAdminRepository extends ReportePrecioAdminDAO implements ReportePrecioAdminInterface
{

    public function obtenerReportes(): array
    {
        $puntos = self::all();
        if (!$puntos) throw new Exception("No se puede obtener los reportes", 0);

        return $puntos->toArray();
    }

    public function habilitarReporte(array $reporte)
    {
        if ($reporte['repr_ind_act'] === false) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $id = $reporte['repr_id'];
        $reporteModificar = self::where("repr_id", $id)->first();
        $reporteModificar->repr_ind_act = $activo;

        return $reporteModificar->save();
    }
}
