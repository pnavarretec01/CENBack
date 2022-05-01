<?php

namespace App\Repository;

use App\Domain\Factory\ComunaFactory;
use App\Domain\Repository\ComunaInterface;
use App\Models\ComunaDAO;
use Illuminate\Support\Facades\DB;

class ComunaRepository extends ComunaDAO implements ComunaInterface
{
    public function obtenerComunas(): array
    {
        $comunas = self::orderBy('com_nombre', 'ASC')->get()->where('com_ind_acti', 1);
        $comunasDataEntity = [];
        foreach ($comunas as $comuna) {
            $comunasDataEntity[] =  ComunaFactory::createFromArray($comuna->toArray());
        }
        return $comunasDataEntity;
    }

    public function verificarActiva(Int $idComuna)
    {
        $comuna = self::where("com_id", $idComuna)->where('com_ind_acti', 1)->first();
        if ($comuna) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerComunaConRegion(): array
    {
        $ubicacion = DB::table('cut_comuna')
            ->join('cut_region', 'cut_region.reg_id', 'cut_comuna.reg_id')
            ->get();

        return $ubicacion->toArray();
    }

    public function habilitarComuna(array $comuna)
    {
        $id = $comuna['com_id'];
        if ($comuna['com_ind_acti'] === false) {
            $activo = 0;
            DB::update('update clf_punto_venta set ptv_ind_act = 0 where com_id = ' . $id);
        } else {
            $activo = 1;
            DB::update('update clf_punto_venta set ptv_ind_act = 1 where com_id = ' . $id);
        }
        $comunaModificar = self::where("com_id", $id)->first();
        $comunaModificar->com_ind_acti = $activo;

        return $comunaModificar->save();
    }

    public function verificarComunaRegion(array $comuna)
    {
        $comunaModificar = self::where("reg_id", $comuna['reg_id'])->where('com_ind_acti', 1)->first();
        if ($comunaModificar) {
            DB::update('update cut_region set reg_ind_act = 1 where reg_id = ' . $comuna['reg_id']);
        } else {
            DB::update('update cut_region set reg_ind_act = 0 where reg_id = ' . $comuna['reg_id']);
        }
    }
}
