<?php

namespace App\Repository;

use App\Domain\Repository\TipoCombustibleInterface;
use App\Models\TipoCombustibleDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class TipoCombustibleRepository extends TipoCombustibleDAO implements TipoCombustibleInterface
{

    public function obtenerCombustibles(): array
    {
        $puntos = self::all();
        if (!$puntos) throw new Exception("No se puede obtener los tipos de combustibles", 0);

        return $puntos->toArray();
    }

    public function obtenerCombustiblePorId(int $id)
    {
        $puntos = DB::table('prm_tipo_combustible')
        ->where('tico_id', $id)->first();
        if (!$puntos) throw new Exception("No se puede obtener los tipos de combustibles", 0);

        return $puntos;
    }

    public function habilitarCombustible(array $combustible)
    {
        if ($combustible['tico_ind_act'] === false) {
            $activo = 0;
        }else{
            $activo = 1;
        }
        $id = $combustible['tico_id'];
        $combustibleModificar = self::where("tico_id", $id)->first();
        $combustibleModificar->tico_ind_act = $activo;

        return $combustibleModificar->save();
    }
}
