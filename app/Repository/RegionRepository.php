<?php

namespace App\Repository;

use App\Domain\Factory\RegionFactory;
use App\Domain\Repository\RegionInterface;
use App\Models\RegionDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class RegionRepository extends RegionDAO implements RegionInterface
{
    public function obtenerRegiones(): array
    {
        $regiones = self::orderBy('reg_nombre', 'ASC')->get()->where('reg_ind_act', 1);
        $regionesDataEntity = [];
        foreach ($regiones as $region) {
            $regionesDataEntity[] =  RegionFactory::createFromArray($region->toArray());
        }
        return $regionesDataEntity;
    }

    public function obtenerRegionesTabla(): array
    {
        $regiones = DB::table('cut_region')->select(
            'cut_region.reg_id',
            'cut_region.reg_id_hml',
            'cut_region.reg_nombre AS nombre',
            'cut_region.reg_orden',
            'cut_region.reg_ind_act'
        )->get();
        if (!$regiones) throw new Exception("No se puede obtener las regiones de venta", 0);

        return $regiones->toArray();
    }
}
