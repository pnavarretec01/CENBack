<?php

namespace App\Repository;

use App\Domain\Repository\TipoProductoInterface;
use App\Models\TipoProductoDAO;
use Exception;
use Illuminate\Support\Facades\DB;

class TipoProductoRepository extends TipoProductoDAO implements TipoProductoInterface
{

    public function obtenerTipoProducto(int $id): array
    {
        $tipos = DB::table('prm_tipo_producto')
        ->where('tico_id', $id)->where('tipr_ind_act', 1)->get();

        return $tipos->toArray();
    }

    public function obtenerTipoProductoPorIdProducto(int $id)
    {
        $tipos = DB::table('prm_tipo_producto')
        ->where('tipr_id', $id)->first();

        return $tipos;
    }
}
